MyApp.controller("contactusController", ["$scope", "$http", function($scope, $http) {
    $scope.name ;
    $scope.email = '';
    $scope.insert ={};
    $scope.errorName = null;
    $scope.errorMail = null;
    $scope.username;
    $scope.password;
    $scope.insertData = function () {
        console.log($scope.insert);
        $scope.errorName[0] = 'Campo requerido';
    }

}]);


