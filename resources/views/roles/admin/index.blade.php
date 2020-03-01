@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="HomePageController" ng-init="init()">
        <div class="content">
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3 card">
                        <div class="card-header"><h5 class="mb-0">VISTA ADMINISTRADOR {{auth('afiliadoempresa')->user()->name}} @{{ userInformation.variable }}</h5></div>
                        <div class="bg-light card-body">
                            <div dir="ltr"
                                 style="position: relative; text-align: left; box-sizing: border-box; padding: 0px; overflow: hidden; white-space: pre; font-family: monospace; color: rgb(248, 248, 242); background-color: rgb(40, 42, 54);">
                            </div>
                            <div class="mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item btn">Cras justo odio</li>
                                    <li class="list-group-item btn">Dapibus ac facilisis in</li>
                                    <li class="list-group-item btn">Morbi leo risus</li>
                                    <li class="list-group-item btn">Porta ac consectetur ac</li>
                                    <li class="list-group-item btn">Vestibulum at eros</li>
                                    <li class="list-group-item btn">Odio at morbi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3 card">
                        <div class="card-header"><h5 class="mb-0">VISTA ESTUDIANTE</h5></div>
                        <div class="bg-light card-body">
                            <div dir="ltr"
                                 style="position: relative; text-align: left; box-sizing: border-box; padding: 0px; overflow: hidden; white-space: pre; font-family: monospace; color: rgb(248, 248, 242); background-color: rgb(40, 42, 54);">
                            </div>
                            <p>Mi perfil</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/HomePageController.js')}}"></script>
@endsection