@extends('roles.tutor.index')

@section('plugins')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">-->
   <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
@endsection


@section('content-tutor-index')
   <div class="container" ng-controller="tutorHistoryCtrl" ng-init="init()" >
        
		<h6>Historial de pagos</h6>
        
        <div class="card row mt-3 mb-4" style="">
            <div class="card-body p-0">
            <div class="p-4">
            <table id="myTable" class="display-1 table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100" style="width: 100%">
                <thead class="bg-200">
                <tr>
                    <th class="sort">id</th>
                    <th class="sort">Fecha</th>
                    <th class="sort">Descripción</th>
                    <th class="sort">Precio</th>
                    <th class="sort">Estado</th>
                    <th class="sort">Transacción</th>
                </tr>
                </thead>
            </table>
            </div>
            </div>
        </div>    
   </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/tutorHistoryCtrl.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@endsection
