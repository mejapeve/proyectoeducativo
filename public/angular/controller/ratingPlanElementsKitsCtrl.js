MyApp.controller("ratingPlanElementsKitsCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.ratingPlan = null;
    $scope.errorMessageFilter = '';
    
    $scope.init = function(company_id) {
        console.log($scope.sequences);
        window.scrollTo( 0, 0 );
    }
    
}]);
