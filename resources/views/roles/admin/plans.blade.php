@extends('layouts.app_side')
@section('plugins')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div ng-controller="PlanContoller" ng-init="init('{{route("create_rating_plan")}}','{{route("get_plans_dt")}}')">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear plan</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="name">Nombre</label>
                                    <input class="form-control" id="name" ng-model="plan.name" type="text" placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlSelect1">Tipo</label>
                                    <select class="form-control selectpicker" id="types" ng-model="plan.typeSelected">
                                        <option value=""></option>
                                        <option ng-repeat="x in plan.types" value="@{{x.id}}">@{{x.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlSelect1">Cantidad</label>
                                    <input class="form-control" id="name" type="number" ng-model="plan.quantity" placeholder="Cantidad">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlSelect1">Días</label>
                                    <input class="form-control" id="name" ng-model="plan.days" type="number" placeholder="dias">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Descripción</label>
                                    <textarea class="form-control" ng-model="plan.description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">Precio ($) </span></div><input class="form-control"  ng-model="plan.cost" type="text" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                </div>
                                <div class="col-md-3 custom-control custom-switch">
                                    <input  class="custom-control-input" type="checkbox" id="customSwitch1" ng-model="plan.isFree" ng-click="toggleSelection($event)">
                                    <label class="custom-control-label" for="customSwitch1">Plan gratuito</label>
                                </div>
                                <div class="col-md-3 custom-control custom-switch">
                                    <input  class="custom-control-input" type="checkbox" id="customSwitch2" ng-model="plan.isExpire" ng-click="toggleSelectionExpirtion($event)">
                                    <label class="custom-control-label" for="customSwitch2">Agregar fecha de expiración</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="">{{ __('Fecha de lanzamiento') }}</label>
                                    <input placeholder="día/mes/año" type="date" id="init_date" ng-model="plan.init_date" value=""
                                           class="form-control"/>
                                </div>
                                <div class="form-group col-md-6" ng-show="isExpire">
                                    <label class="">{{ __('Fecha de expiración') }}</label>
                                    <input placeholder="día/mes/año" type="date" ng-model="plan.expiration_date" value=""
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="row" ng-repeat="x in plan.items" >
                                <div class="form-group col-md-8">
                                    <label for="name">Descripción</label>
                                    <input class="form-control"   type="text" placeholder="Descripción" ng-model=x.description>
                                </div>
                                <div class="form-group col-md-4">
                                    <button class="mt-4" ng-click="deleteItem($index)"> - </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="name">Descripción</label>
                                    <input class="form-control"   type="text" placeholder="Descripción" ng-model="plan.item">
                                </div>
                                <div class="form-group col-md-4">
                                    <button class="mt-4" ng-click="addItem()"> + </button>
                                </div>
                            </div>
                            <div class="row" ng-show="freePlan">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Secuencia</label>
                                    <select id="selectCity"
                                            ng-class="{'select2_group':true, 'form-control':true}"
                                            class="select2_group form-control selectpicker" ng-model="plan.sequenceSelected" ng-change="sequenceChange(plan.sequenceSelected)">
                                        <option></option>
                                        <option ng-repeat="x in plan.sequences" value="@{{x.id}}">@{{x.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Momento</label>
                                    <select class="form-control selectpicker" id="exampleFormControlSelect1"
                                            ng-model="plan.momentSelected" multiple>
                                        <option></option>
                                        <option ng-repeat="x in plan.moments" value="@{{x.id}}">@{{x.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary btn-sm" type="button" id="onEdit" ng-click="registerPlan()"><i id="move" class=""></i>Crear</button></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar plan</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="name">Nombre</label>
                                    <input class="form-control md-input" id="name2"  ng-value='planEdit.name' ng-model=planEdit.name type="text" placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlSelect1">Días</label>
                                    <input class="form-control" id="name3" ng-model="planEdit.days" type="number" placeholder="dias">
                                </div>
                                <div class="col-md-6 input-group mb-3 mt-auto">
                                    <div class="input-group-prepend" style="margin-bottom: auto"><span class="input-group-text">Precio ($) </span></div><input class="form-control"  ng-model="planEdit.price" type="text" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append" style="margin-bottom: auto"><span class="input-group-text">.00</span></div>
                                </div>
                            </div>
                            <div class="col-md-6 custom-control custom-switch">
                                <input  class="custom-control-input" type="checkbox" id="customSwitch2" ng-model="plan.isExpire" ng-click="toggleSelectionExpirtion($event)">
                                <label class="custom-control-label" for="customSwitch2">Agregar fecha de expiración</label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="">{{ __('Fecha de lanzamiento') }}</label>
                                    <input placeholder="día/mes/año" type="date" name="init_date" ng-model="planEdit.init_date"
                                           class="form-control"/>
                                </div>
                                <div class="form-group col-md-6" ng-show="isExpire">
                                    <label class="">{{ __('Fecha de expiración') }}</label>
                                    <input placeholder="día/mes/año" type="date" name="expiration_date" ng-model="planEdit.expiration_date"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Descripción</label>
                                    <textarea class="form-control" ng-model="planEdit.description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary btn-sm" type="button" id="onEdit" ng-click=""><i id="move" class=""></i>Editar</button></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <div class="row">
                @include('roles.admin.sidebar')
                <div class="col-md-8" >
                    <div class="mb-3 card">
                        <div class="card-header">
                            <h5 class="">Planes</h5>
                        </div>
                        <div class="bg-light card-body">
                            <button id="formPlan" class="btn btn-outline-primary mr-2 mb-3" type="button">
                                <span class="fas fa-plus mr-1" data-fa-transform="shrink-3"></span>Nuevo
                            </button>
                            <table id="myTable" class="display-1 table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100" style="width: 100%">
                                <thead class="bg-200">
                                <tr>
                                    <th class="sort">Nombre</th>
                                    <th class="sort">Descripción</th>
                                    <th class="sort">Tipo de plan</th>
                                    <th class="sort">Nº Contenidos</th>
                                    <th class="sort">Nº días</th>
                                    <th class="sort">Precio</th>
                                    <th class="sort">Fecha de inicio</th>
                                    <th class="sort">Fecha de expiración</th>
                                    <th class="sort">Editar</th>
                                </tr>
                                </thead>
                                <tfoot class="bg-200">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Tipo de plan</th>
                                    <th>Nº Contenidos</th>
                                    <th>Nº días</th>
                                    <th>Precio</th>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha de expiración</th>
                                    <th>Editar</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{asset("js/select2.full.min.js")}}"></script>
    <script src="{{asset('/../angular/controller/planController.js')}}"></script>
     <script>
        $(document).ready( function () {
            $(".selectpicker").select2({
                placeholder: "Seleccione...",
            });
            $('#formPlan').on('click',function(){
                $('#exampleModal').modal('show');
            });
        } );

    </script>
@endsection
