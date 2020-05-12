MyApp.controller("LoginCtrl", ["$scope", "$http", function($scope, $http) {
    
    $scope.goToFacebook = function() {
        var action = $('#formFacebook').attr('action');
        $('#goToProvider').attr("action",action) //set the form attributes
        document.getElementById('goToProvider').submit();
    }
    
    $scope.goToGmail = function() {
        var action = $('#formGmail').attr('action');
        $('#goToProvider').attr("action",action) //set the form attributes
        document.getElementById('goToProvider').submit();
    }

}]);


