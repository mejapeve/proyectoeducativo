MyApp.controller('FileUploadController', ['$scope', "$http", function ($scope, $http) {

    $scope.companyId = null;

    $scope.onChangeCompany = function () {
        $http.get("/get_company_sequences/" + $scope.companyId)
            .then(function (res) {
                $scope.sequences = res.data[0].compani_sequences;
            })

        $http.get("/get_company_groups/" + $scope.companyId)
            .then(function (res) {
                $scope.groups = res.data;
            })
    }

    $http.get("/get_companies")
        .then(function (res) {
            $scope.companies = res.data.data;
        })
}]);