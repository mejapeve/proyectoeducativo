MyApp.controller("ratingPlanListCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.ratingPlans = [];
    $scope.errorMessageFilter = '';
    
    $scope.init = function(company_id) {
        $('.d-none-result').removeClass('d-none');
        
    };
    $http({
        url:"/get_rating_plans",
        method: "GET",
    }).
    then(function (response) {
        $scope.ratingPlans = response.data ? response.data.data || response.data : response;
        $scope.ratingPlans = $scope.ratingPlans.map(function(value) {
            value.description_items = value.description_items ?value.description_items.split('|'):[];
          return value;
        });
        
        
        
    }).catch(function (e) {
        $scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
    });
    
}]);
