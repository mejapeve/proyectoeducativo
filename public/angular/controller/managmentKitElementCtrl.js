MyApp.controller("managmentKitElementCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.init = function() {
        $('.d-none-result').removeClass('d-none');
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: false,
            responsive: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "",
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
            'ajax': {
                'url': '/conexiones/admin/get_kit_element_dt/',
                'dataSrc': function (json) {
                    console.log(json)
                    var return_data = new Array();
                    var row = product = null;
                    for(var i=0 ; i<json.elements.length; i++){
                        row = json.elements[i];
                        return_data.push({
                            'name':row.name,
                            'description':row.description,
                            'type':'Elemento',
                            'price':row.price,
                            'quantity':row.quantity,
                            'edit':'',
                            'view':''
                        })

                    }
                    for(var i=0 ; i<json.kits.length; i++){
                        row = json.kits[i];
                        return_data.push({
                            'name':row.name,
                            'description':row.description,
                            'type':'Kit',
                            'price':row.price,
                            'quantity':row.quantity,
                            'edit':'',
                            'view':''
                        })

                    }
                    return return_data;
                }
            },
            'columns': [
                {data: 'name', className: 'text-left'},
                {data: 'description', className: 'text-left'},
                {data: 'type', className: 'text-center'},
                {data: 'price', className: 'text-cneter'},
                {data: 'quantity', className: 'text-center'},
                {data: 'edit', className: 'text-right'},
                {data: 'view', className: 'text-right'},

            ]
        });
       // new $.fn.dataTable.FixedHeader( table );
        /*
        table.on('click', '.viewContens', function (e) {
            $tr = $(this).closest('tr');
            let dataTable = table.row($tr).data();
            window.location="{{route('get_user_contracted_products_view')}}"+"/"+dataTable.id
        });
        */


    };
}]);


