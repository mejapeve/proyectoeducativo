MyApp.controller("tutorHistoryCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.errorMessage = '';
    $scope.history = null;
    
    $scope.init = function() {
        
        $('.d-none-result').removeClass('d-none');
        
        
     // $http({
     //     url:"/get_history_tutor/",
     //     method: "GET",
     // }).
     // then(function (response) {
     //     $scope.history = response.data;
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: false,
                responsive: true,
                order: [[ 1, "desc" ]],
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
                    'url': '/get_history_tutor/',
                    'dataSrc': function (json) {
                      var return_data = new Array();
                      var row = product = null;
                      for(var i=0 ; i<json.data.length; i++){
                            row = json.data[i];
                            product = row.shopping_cart_product ? row.shopping_cart_product[0] : null;
                            return_data.push({
                              'id': row.id,
                              'date': row.payment_init_date,
                              'shipping_price': row.shipping_price,
                              'description': row.rating_plan ? row.rating_plan.name : 
                                         product && product.kiStruct ? product.kiStruct.name : 
                                         product && product.elementStruct ? product.elementStruct[0].name : '',
                              'status': row.payment_status.name,
                              'price': row.rating_plan ? '$'+row.rating_plan.price+' USD' : 
                                       product && product.kiStruct ? '$'+product.kiStruct.price+' USD' : 
                                       product && product.elementStruct ? '$'+product.elementStruct[0].price+' USD' : '' ,
                              'payment_transaction_id': row.payment_transaction_id ? '...'+row.payment_transaction_id.substr(row.payment_transaction_id.length-6,row.payment_transaction_id.length) : ''
                            })
                        
                      }
                      return return_data;
                    }
                  },
                  'columns': [
                    {data: 'id', className: 'text-center', visible: false },
                    {data: 'date', className: 'text-left'},
                    {data: 'description', className: 'text-left'},
                    {data: 'price', className: 'text-right'},
                    {data: 'status', className: 'text-center'},
                    {data: 'payment_transaction_id', className: 'text-right'},
                    
                ]
            });
            new $.fn.dataTable.FixedHeader( table );
            table.on('click', '.viewContens', function (e) {
                $tr = $(this).closest('tr');
                let dataTable = table.row($tr).data();
                window.location="{{route('get_user_contracted_products_view')}}"+"/"+dataTable.id
            });
            
            
            
            
        //}).catch(function (e) {
        //    $scope.errorMessage = 'Error consultando los productos asociados';
        //});
        //
    };
}]);


