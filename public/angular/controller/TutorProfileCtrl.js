MyApp.controller("tutorProfileCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.newRegisterForm=false;
    $scope.tutor={};
    $scope.copyTutor={};
    $scope.labelName;
    $scope.inputToEdit;
    $scope.init = function(tutor) {
        $scope.tutor=tutor
        $scope.tutor.password1 = ''
        $scope.tutor.password2 = ''
        $scope.newRegisterForm=false
        $('.d-none-result.d-none').removeClass('d-none')
    };
    $scope.viewPassword = (idInput) => {
        var cambio = document.getElementById(idInput)
        if(cambio.type == "password"){
            cambio.type = "text";
            $(`.${idInput}`).removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $(`.${idInput}`).removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
    $scope.onChangePassword = () => {
        if($scope.tutor.password2.length !== 0){
            $http({
                url:"/conexiones/validate_password/"+$scope.tutor.password1,
                method: "GET",
            }).
            then(function (response) {
                if(response.data.validation){
                    $http({
                        url:"/conexiones/update_password/",
                        method: "POST",
                        data:{
                            'password1':$scope.tutor.password1,
                            'password2':$scope.tutor.password2,
                        }
                    }).then((response)=>{
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
                        swal({
                            text:'algo salio mal, intente de nuevo' ,
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                        }).catch(swal.noop);
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
        }else{
            swal({
                text: "No se puede editar, debe completar el campo 'Nueva contraseña'",
                type: "warning",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);
        }

    }
    $scope.registerUserForm = (inputVar)=>{
        $('.d-none-result.d-none').removeClass('d-none');
        window.scrollTo( 0, 0 );
        $scope.newStudent = {};
        $scope.newRegisterForm=true;
        $scope.errorMessageRegister="";
        $scope.inputToEdit=parseInt(inputVar)
        switch (parseInt(inputVar)) {
            case 1:
                $scope.labelName="Nombre"
                $scope.varChange = $( "#div_name" ).text()
                break;
            case 2:
                $scope.labelName="Apellido"
                $scope.varChange = $( "#div_last" ).text()
                break;
            case 3:
                $scope.labelName="Telefono"
                $scope.varChange = $( "#div_phone" ).text()
                break;
        }
    }
    $scope.onEdit = (inputVar) => {
        let columnEdit = '';
        let editInput = false;
        if(inputVar == 1 || inputVar == 2 || inputVar == 3){
            switch (inputVar) {
                case 1:
                    columnEdit = 'name'
                    $scope.copyTutor.name = $scope.tutor.name
                    $scope.tutor.name = $scope.varChange
                    editInput = $scope.valiateInputs()
                    break;
                case 2:
                    columnEdit = 'last_name'
                    $scope.copyTutor.last_name = $scope.tutor.last_name
                    $scope.tutor.last_name = $scope.varChange
                    editInput = $scope.valiateInputs()
                    break;
                case 3:
                    columnEdit = 'phone'
                    $scope.copyTutor.phone = $scope.tutor.phone
                    $scope.tutor.phone = $scope.varChange
                    editInput = $scope.valiateInputs()
                    break;
            }
            if(editInput){
                $http({
                    url:"/conexiones/edit_column_tutor/",
                    method: "POST",
                    data: {
                        column:columnEdit,
                        data:$scope.varChange
                    }
                }).
                then(function (response) {
                    $scope.newRegisterForm=false
                    if(response.status === 200) {
                        swal({
                            text: "Campo editado exitosamente",
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false
                        }).catch(swal.noop);
                        $('#tutorProfileFullName').html(`${$scope.tutor.name} ${$scope.tutor.last_name} `);
                    }else{
                        $scope.newRegisterForm=false
                        swal({
                            text: "Algo salio mal, intente de nuevo",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                        }).catch(swal.noop);
                        $scope.presentTutorValues(inputVar)
                    }
                }).catch(function (e) {
                    $scope.newRegisterForm=false
                    swal({
                        text: "Algo salio mal, intente de nuevo",
                        type: "warning",
                        showCancelButton: false,
                        showConfirmButton: false
                    }).catch(swal.noop);
                    $scope.loadingRegistry = false;
                    $scope.presentTutorValues(inputVar)
                });
            }else{
                switch (inputVar) {
                    case 1:
                        $scope.tutor.name = $scope.copyTutor.name
                        break;
                    case 2:
                        $scope.tutor.last_name = $scope.copyTutor.last_name
                        break;
                    case 3:
                        $scope.tutor.phone = $scope.copyTutor.phone
                        break;
                }
                swal({
                    text: "No se puede editar el campo, debe tener minimo 3 caracteres maximo 20",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
                }).catch(swal.noop);
            }

        }
    }

    $scope.presentTutorValues = (inputVar) => {

        switch (inputVar) {
            case 1:
                $scope.tutor.name = $scope.copyTutor.name
                break;
            case 2:
                $scope.tutor.last_name = $scope.copyTutor.last_name
                break;
            case 3:
                $scope.tutor.phone = $scope.copyTutor.phone
                break;
        }
    }
    $scope.getFile = () => {
        document.getElementById("upfile").click();
    }

    $scope.valiateInputs = () =>{
        if( $scope.varChange.length >= 3 && $scope.varChange.length <= 20 )
            return true;
        return false;
    }

}]);


