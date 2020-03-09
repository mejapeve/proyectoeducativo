MyApp.controller("TutorIndexController", ["$scope", "$http", function($scope, $http) {

    $scope.familiary = null;

    $scope.init = function()
    {
        $http({
            url:"/get_students_tutor/",
            method: "GET",
        }).
        then(function (response) {
            $scope.familiary = response.data;
        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error consultando los estudiantes';
        });
    };

}]);


