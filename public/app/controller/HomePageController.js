MyApp.controller('HomePageController',function($scope, $http){

    $scope.userInformation = null;

    $scope.init = function () {
        $scope.getInformation();
    }

    $scope.getInformation = function (){

        $http({
            methos : 'GET',
            url : 'testangular'
        }).then(

            function success(reponse){
$scope.userInformation = reponse.data
            },
            function failed() {

            }

        )

    }

});