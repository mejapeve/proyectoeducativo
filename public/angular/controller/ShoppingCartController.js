MyApp.controller('shoppingCartController', function ($scope, $http, $timeout) {

    $scope.shopping_carts = null;
    $scope.totalPrices = 0;
    $scope.cards = [];
    
    $scope.init = function (company_affiliated_id) {
        $('.d-none-result').removeClass('d-none');
        $http({
            url: "/get_shopping_cart/",
            method: "GET",
        }).
            then(function (response) {
                $scope.shopping_carts = response.data.data;
				if($scope.shopping_carts) {
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
				console.log($scope.shopping_carts);
                
                $scope.totalPrices = $scope.cards.reduce((sum, value) => (typeof value.price == "number" ? sum + value.price : sum), 0);

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

