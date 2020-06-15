@extends('layouts.app_side')
@section('plugins')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
    <div class="content">
        <div class="row">
            @include('roles.admin.sidebar')
            <div class="col-md-8" >
                <div class="mb-3 card">
                    <div class="card-header">
                        <h5 class="">Gestión de kits y elementos</h5>
                    </div>
                    <div class="bg-light card-body">
                        <button id="formPlan" class="btn btn-outline-primary mr-2 mb-3" type="button">
                            <span class="fas fa-plus mr-1" data-fa-transform="shrink-3"></span>Nuevo Kit
                        </button>
                        <button id="formPlan" class="btn btn-outline-primary mr-2 mb-3" type="button">
                            <span class="fas fa-plus mr-1" data-fa-transform="shrink-3"></span>Nuevo Elemento
                        </button>
                        <table id="myTable" class="display-1 table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100" style="width: 100%">
                            <thead class="bg-200">
                            <tr>
                                <th class="sort">Nombre</th>
                                <th class="sort">Descripción</th>
                                <th class="sort">Tipo</th>
                                <th class="sort">Precio</th>
                                <th class="sort">Cantidad</th>
                                <th class="sort">Editar</th>
                                <th class="sort">Ver mas</th>
                            </tr>
                            </thead>
                            <tfoot class="bg-200">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Editar</th>
                                <th>Ver mas</th>
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
@endsection
