MyApp.controller("frequentQuestionCtrl", function ($scope, $http, $timeout) {
    $scope.toogleChatPanel = false
    $scope.frequentQuestions = []
    $scope.init = function () {
    
        $('.result-finish-done').removeClass('d-none');
         
        $http({
            url:"/get_frequent_questions/",
            method: "GET",
        }).
        then(function (response) { 
            $scope.frequentQuestions = response.data.data

        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error consultando los planes de acceso, compruebe su conexión a internet';
        });
    }

});

