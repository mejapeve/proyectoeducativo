MyApp.controller("TutorProfileCtrl", ["$scope", "$http", function($scope, $http) {


    $scope.init = function() {
        $scope.tutor.password1 = '';
        $scope.tutor.password2 = '';
    };
    $scope.viewPassword = (idInput) => {
        var cambio = document.getElementById(idInput);
        if(cambio.type == "password"){
            cambio.type = "text";
            $(`.${idInput}`).removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $(`.${idInput}`).removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
    $scope.onChangePassword = () => {
        $http({
            url:"/conexiones/validate_password/"+$scope.tutor.password1,
            method: "GET",
        }).
        then(function (response) {
            console.log('validación contraseña correcta',response.data);
            if(response.data.validation){
                console.log('ingresa segunda validación');
                $http({
                    url:"/conexiones/update_password/",
                    method: "POST",
                    data:{
                        'password1':$scope.tutor.password1,
                        'password2':$scope.tutor.password2,
                    }
                }).then((response)=>{
                    console.log(response.data)
                    if(response.data.validation){
                        swal({
                            text:response.data.message ,
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false
                        }).catch(swal.noop);
                    }else{
                        swal({
                            text:response.data.message ,
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                        }).catch(swal.noop);
                    }
                }).catch(function (e) {
                    console.log(console.log(e))
                });
            }else{
                swal({
                    text:response.data.message ,
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
                }).catch(swal.noop);
            }

        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error validando contraseña';
        });
    }

}]);


