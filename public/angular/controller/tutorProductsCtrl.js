MyApp.controller("tutorProductsCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.errorMessage = '';
    $scope.products = null;
    $scope.ratingPlans = null;
    
    $scope.init = function() {
        
        $('.d-none-result').removeClass('d-none');
        
        $http({
            url:"/get_products_tutor/",
            method: "GET",
        }).
        then(function (response) {
            $scope.products = response.data;
			console.log($scope.products);
            $('.d-none-result.d-none').removeClass('d-none');
            
        }).catch(function (e) {
            $scope.errorMessage = 'Error consultando los productos asociados';
        });
        
        $http({
            url:"/get_rating_plans",
            method: "GET",
        }).
        then(function (response) {
            $scope.ratingPlans = response.data ? response.data.data || response.data : response;
			
			$scope.ratingPlans = $scope.ratingPlans.map(function(value) {
				value.description_items = value.description_items ?value.description_items.split('|'):[];
				value.name_url_value = value.name.replace(/\s/g,'_').toLowerCase();
			  return value;
			});
        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
        });

    };
}]);


