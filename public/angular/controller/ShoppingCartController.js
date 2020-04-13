MyApp.controller('shoppingCartController', function ($scope, $http, $timeout) {

	/*$scope.cards = [
	{"id":1,"name":"Yotopo y los astronautas"},
	{"id":2,"name":"Yotopo y el mundo acuatico"},
	{"id":3,"name":"Apple iMac Pro (27-inch with Retina 5K Display, 3.0GHz 10-core Intel Xeon W, 1TB SSD)"}
	]
*/
	$scope.shopping_cart = null;
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
				$scope.shopping_cart = response.data.data;
				var product_id = $scope.shopping_cart[1].shopping_cart_product[0].product_id;
				//console.log($scope.shopping_cart[1].shopping_cart_product[0].product_id);
				var cantRatingPlan = 0;
				var cantKit = 0;
				var cantInstrument = 0;
				var elementName = null;
				var elementName2 = null;
				var elementName3 = null;

				for (var i = 0; i < $scope.shopping_cart.length; i++) {
					var elementName = null;
					if ($scope.shopping_cart[i].rating_plan || $scope.shopping_cart[i].rating_plan != null) {
						//Es rating plan
						var elementName = {
							"id": i,
							"name": $scope.shopping_cart[i].rating_plan.name,
							"image": $scope.shopping_cart[i].rating_plan.image_url,
							"description": $scope.shopping_cart[i].rating_plan.description,
							"price": $scope.shopping_cart[i].rating_plan.price,
							"cant": cantRatingPlan,
						};

					} else if ($scope.shopping_cart[i].shopping_cart_product[0].product_id === "3") {
						//Es Kit
						cantKit++;
						var elementName = {
							"id": i,
							"name": $scope.shopping_cart[i].shopping_cart_product[0].id, // corregir y hablar con Cristian
							"image": "faaeef66.jpg",
							"description": "descripcion prueba",
							"price": 2000,
							"cant": cantKit,
						};
					} else if ($scope.shopping_cart[i].shopping_cart_product[0].product_id === "1") {
						//Es instrumento
						cantInstrument++;
						var elementName = {
							"id": i,
							"name": $scope.shopping_cart[i].shopping_cart_product[0].elementStruct[0].name,
							"image": $scope.shopping_cart[i].shopping_cart_product[0].elementStruct[0].url_image,
							"description": $scope.shopping_cart[i].shopping_cart_product[0].elementStruct[0].description,
							"price": $scope.shopping_cart[i].shopping_cart_product[0].elementStruct[0].price,
							"cant": cantInstrument,
						};
					}
					$scope.cards.push(elementName);
				}

				$scope.totalPrices = $scope.cards.reduce((sum, value) => (typeof value.price == "number" ? sum + value.price : sum), 0);
				console.log($scope.totalPrices);

			}).catch(function (e) {
				$scope.errorMessage = 'Error consultando el carrito de compras, compruebe su conexión a internet';
			});
	};

});

