MyApp.controller("timelineSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {
    
    $scope.sequences = null;
    $scope.errorMessage = null;

    $scope.init = function(company_id)    {
        $scope.defaultCompanySequences = company_id;
        $('.d-none-result').removeClass('d-none');
        $http({
            url:"/get_available_sequences/"+$scope.defaultCompanySequences ,
            method: "GET",
        }).
        then(function (response) {
            $scope.sequences = response.data;
        }).catch(function (e) {
            $scope.errorMessage = 'Error consultando las secuencias, compruebe su conexión a internet';
        });
    };    
    
}]);
