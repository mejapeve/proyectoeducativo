MyApp.controller("LoginCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.notifyStudent;
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

    $scope.notifyStudent = () => {
        swal({
            text: "Para recuperar tus datos de ingreso, por favor ingresa el correo del familiar que realizó la inscripción ",
            type: "warning",
            showCancelButton: false,
            showConfirmButton: false
        }).catch(swal.noop);
    }
}]);


