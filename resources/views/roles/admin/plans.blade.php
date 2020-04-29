@extends('layouts.app_side')
@section('plugins')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">

@endsection

@section('content')
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
                                <input class="form-control" id="name" type="text" placeholder="Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlSelect1">Tipo</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlSelect1">Cantidad</label>
                                <input class="form-control" id="name" type="number" placeholder="Cantidad">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlSelect1">Días</label>
                                <input class="form-control" id="name" type="number" placeholder="dias">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">Descripción</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">Precio ($) </span></div><input class="form-control" type="text" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                            </div>
                            <div class="col-md-6 custom-control custom-switch">
                                <input class="custom-control-input" id="customSwitch1" type="checkbox">
                                <label class="custom-control-label" for="customSwitch1">Plan gratuito</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Secuencia</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Momento</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary btn-sm" type="button" id="onEdit"><i id="move" class=""></i>Crear</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear plan</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary btn-sm" type="button" id="onEdit"><i id="move" class=""></i>Crear</button></div>
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
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
        $(document).ready( function () {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primeros",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                'ajax': "{{ route('get_plans_dt')}}",
                'columns': [
                    {data: 'name', className: ''},
                    {data: 'description', className: ''},
                    {data: 'type_rating_plan', className: 'text-center'},
                    {data: 'quantity_contents', className: 'text-center'},
                    {data: 'quantity_days', className: 'text-center'},
                    {data: 'price', className: 'text-center'},
                    {data: 'edit', className: 'text-center'},
                ]
            });
            new $.fn.dataTable.FixedHeader( table );

            $('#formPlan').on('click',function(){
                $('#exampleModal').modal('toggle');
            });
        } );

    </script>
@endsection
