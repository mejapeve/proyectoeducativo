MyApp.controller('shoppingCartController', function ($scope, $http, $timeout) {

    $scope.shopping_carts = null;
    $scope.totalPrices = 0;
    $scope.cards = [];
    $scope.preferenceInitPoint = null;
    
    $scope.init = function () {
        $('.d-none-result').removeClass('d-none');
        $http({
            url: "/get_shopping_cart/",
            method: "GET",
        }).
            then(function (response) {
            $scope.shopping_carts = response.data.data;
            if($scope.shopping_carts && $scope.shopping_carts.length > 0 ) {
               for(var i=0;i<$scope.shopping_carts.length;i++) {
                  sc = $scope.shopping_carts[i];
                  if(sc.type_product_id === 3 && sc.shopping_cart_product) {
                     sc.sequences = [];
                     for(var j=0;j<sc.shopping_cart_product.length;j++) {
                        scp = sc.shopping_cart_product[j];
                        if(scp.sequenceStruct_experience) {
                           mbControl = false;
                           for(var k=0;k<sc.sequences.length;k++) {
                              if(sc.sequences[k].id === scp.sequenceStruct_experience.id) {
                                 mbControl = true;
                                 break;
                              }
                           }
                           if(!mbControl) {
                              sc.sequences.push(scp.sequenceStruct_experience);
                           }
                        }
                     }
                  }
               }
            }
            $scope.totalPrices = $scope.cards.reduce((sum, value) => (typeof value.price == "number" ? sum + value.price : sum), 0);

        }).catch(function (e) {
            $scope.errorMessage = 'Error consultando el carrito de compras, compruebe su conexión a internet';
        });
    };
    
    $scope.onRegistryWithPendingShoppingCart = function() {
        swal({
          text: "Serás redireccionado al registro",
          showConfirmButton: false,showCancelButton: false,
          dangerMode: false,
        }).catch(swal.noop);
        
        window.location = 'registryWithPendingShoppingCart';
    }

    //invoca el servicio que construye la preferencia en mercado pago y retorna el link de pago    
    $scope.getPreferenceInitPoint = function() {
        $('.btn-spinner').removeClass('d-none');
        $http({
            url: "/get_preference_initPoint/",
            method: "GET",
        }).
        then(function (response) {
            window.location = response.data.initPoint;
            $('.btn-spinner').addClass('d-none');
        }).catch(function (e) {
            $scope.errorMessage = 'Error registrando preferencia de compra';
            swal('Conexiones',$scope.errorMessage,'error');
            $('.btn-spinner').addClass('d-none');
        });
    }
    
    $scope.simulator = function() {
        $('.btn-spinner').removeClass('d-none');
        $http({
            url: "/get_preference_initPoint/",
            method: "GET",
        }).
        then(function (response) {
            document.getElementById('preference_id').value = response.data.preference_id;
            document.getElementById('simulate-form').submit();
            $('.btn-spinner').addClass('d-none');
        }).catch(function (e) {
            $scope.errorMessage = 'Error registrando preferencia de compra';
            swal('Conexiones',$scope.errorMessage,'error');
            $('.btn-spinner').addClass('d-none');
        });
    }
    
    $scope.onDelete = function(idShoppingCart) {
        
        var data = { 'ids' : idShoppingCart, 'payment_status_id': 5 };
        
        $http({
            url: "/delete_shopping_cart/",
            method: "POST",
            data: data
        }).
        then(function (response) {
            swal('Conexiones','El registro fué borrado exitósamente','success');
            $scope.init();
            
        }).catch(function (e) {
            $scope.errorMessage = 'Error eliminando registro del carrito de compras';
            swal('Conexiones',$scope.errorMessage,'error');
        });
    }
});

