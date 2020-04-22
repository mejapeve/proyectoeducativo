MyApp.controller('shoppingCartController', function ($scope, $http, $timeout) {

    /*$scope.cards = [
    {"id":1,"name":"Yotopo y los astronautas"},
    {"id":2,"name":"Yotopo y el mundo acuatico"},
    {"id":3,"name":"Apple iMac Pro (27-inch with Retina 5K Display, 3.0GHz 10-core Intel Xeon W, 1TB SSD)"}
    ]
*/
    $scope.shopping_carts = null;
    $scope.totalPrices = 0;
    $scope.cards = [];
    //$scope.company_affiliated_id = "9";
    $scope.init = function (company_affiliated_id) {
        $('.d-none-result').removeClass('d-none');
        $http({
            url: "/get_shopping_cart/",
            method: "GET",
        }).
            then(function (response) {
                //console.log($scope);
                $scope.shopping_carts = response.data.data;
                //console.log($scope.shopping_carts);
                
                $scope.totalPrices = $scope.cards.reduce((sum, value) => (typeof value.price == "number" ? sum + value.price : sum), 0);
                //console.log($scope.cards);

            }).catch(function (e) {
                $scope.errorMessage = 'Error consultando el carrito de compras, compruebe su conexión a internet';
            });
    };
    
    $scope.onRegistryWithPendingShoppingCart = function() {
        swal({
          text: "Para continuar con tu compra primero debes registrarte",
          showConfirmButton: false,showCancelButton: false,
          dangerMode: false,
        }).catch(swal.noop);
        
        window.location = 'registryWithPendingShoppingCart';
    }
    

});

