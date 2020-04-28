@extends('layouts.app_side')
@section('plugins')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">-->
   <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">

@endsection

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                @include('roles.admin.sidebar')
                <div class="col-md-8" >
                    <div class="mb-3 card">
                        <div class="card-header">
                            <h5 class="">Lista de usuarios con contenidos vigentes</h5>
                        </div>
                        <div class="bg-light card-body">
                            <table id="myTable" class="display-1 table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100" style="width: 100%">
                                <thead class="bg-200">
                                <tr>
                                    <th class="sort">Avatar</th>
                                    <th class="sort">Nombres</th>
                                    <th class="sort">Apellidos</th>
                                    <th class="sort">Correo</th>
                                    <th class="sort">Telefono</th>
                                    <th class="sort">Contenidos</th>
                                </tr>
                                </thead>
                                <tfoot class="bg-200">
                                <tr>
                                    <th>Avatar</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Contenidos</th>
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
    <script>
        $(document).ready( function () {

            var table = $('#myTable').DataTable({
                responsive: true,
                'ajax': "{{ route('get_users_contracted_products_dt')}}",
                'columns': [
                    {data: 'avatar', className: 'text-center'},
                    {data: 'name', className: 'text-center'},
                    {data: 'last_name', className: 'text-center'},
                    {data: 'email', className: 'text-center'},
                    {data: 'phone', className: 'text-center'},
                    {data: 'content', className: 'text-center'},
                ]
            });

            new $.fn.dataTable.FixedHeader( table );
            table.on('click', '.viewContens', function (e) {
                $tr = $(this).closest('tr');
                let dataTable = table.row($tr).data();
                window.location="{{route('get_user_contracted_products_view')}}"+"/"+dataTable.id
                console.log(dataTable)

            });
        } );

    </script>
@endsection
