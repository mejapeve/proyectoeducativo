MyApp.controller('FileUploadController', ['$scope', "$http", function ($scope, $http) {

    $scope.companyId = null;

    $scope.onChangeCompany = function () {

        for (var i = 0; i < $scope.companies.length; i++) {
            if ($scope.companies[i].id == $scope.companyId) {
                $scope.companyName = $scope.companies[i].name;
            }
        }

        $http.get("/get_company_sequences/" + $scope.companyId)
            .then(function (res) {
                $scope.sequences = res.data;
            })

        $http.get("/get_company_groups/" + $scope.companyId)
            .then(function (res) {
                $scope.groups = res.data;
            })

        $http.get("/get_teachers_company/" + $scope.companyId)
            .then(function (res) {
                $scope.teachers = res.data;
            })
    }

    $scope.onChangeSecuence = function () {
        for (var i = 0; i < $scope.sequences.length; i++) {
            if ($scope.sequences[i].id == $scope.sequenceId) {
                $scope.sequenceName = $scope.sequences[i].name;
            }
        }
    }
    $http.get("/get_companies")
        .then(function (res) {
            $scope.companies = res.data.data;
        })

    
}]);