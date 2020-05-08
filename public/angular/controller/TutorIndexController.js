MyApp.controller("TutorIndexController", ["$scope", "$http", function($scope, $http) {

    
    $scope.initInscriptions = function() {
		
		$scope.students = [];
		$scope.newStudent = {};
		$scope.loagingRegistry = false;
		$scope.newRegisterForm = false;
        $scope.editRegisterForm = false;
		$scope.errorMessageRegister = "";
		
        $http({
            url:"/get_students_tutor/",
            method: "GET",
        }).
        then(function (response) {
            $scope.students = response.data;
			console.log($scope.students);
            $('.d-none-result.d-none').removeClass('d-none');
			
        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error consultando los estudiantes';
        });
    };
	
	$scope.registerUserForm = function (){
		window.scrollTo( 0, 0 );
		$scope.newStudent = {};
		$scope.newRegisterForm=true;
		$scope.errorMessageRegister="";
	}
    
    $scope.onRegistry = function() {
		$scope.loagingRegistry = true;
		
        $http({
            url:"/register_student/",
            method: "POST",
            data: $scope.newStudent
        }).
        then(function (response) {
            
			$scope.loagingRegistry = false;
			if(response.status === 200) {
				swal({
				  text: "Estudiante registrado exitosamente",
				  type: "success",
				  showCancelButton: false,
				  showConfirmButton: false
				}).catch(swal.noop);
				
				$scope.initInscriptions();
			}
        }).catch(function (e) {
            $scope.errorMessageRegister = 'Error registrando el estudiante';
            $scope.loagingRegistry = false;
        });
    }
    $scope.editUserForm = function (idUser){
        $scope.user_name_old = null;
        $http({
            url:"/get_user/"+idUser,
            method: "GET",
        }).
        then(function (response) {
            console.log(idUser,'id del usuario',response);
            window.scrollTo( 0, 0 );
            $scope.newStudent = {};
            $scope.editRegisterForm=true;
            $scope.errorMessageRegister="";
            $scope.newStudent.name= response.data.data.name;
            $scope.newStudent.last_name= response.data.data.last_name;
            $scope.newStudent.birthday= response.data.data.birthday ? new Date (response.data.data.birthday) : null;
            $scope.newStudent.user_name= response.data.data.user_name;
            $scope.newStudent.id = response.data.data.id;
            $scope.validateUserName = true;
            $scope.user_name_old = $scope.newStudent.user_name;

            $('.d-none-result.d-none').removeClass('d-none');

        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error consultando los estudiantes';
        });
    }
    $scope.onEdit = function() {
	    if($scope.validateUserName){
            $scope.loagingRegistry = true;
            $http({
                url:"/edit_user_student/",
                method: "POST",
                data: $scope.newStudent
            }).
            then(function (response) {
                $scope.loagingRegistry = false;
                if(response.status === 200) {
                    swal({
                        text: "Estudiante editado exitosamente",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false
                    }).catch(swal.noop);
                    $scope.initInscriptions();
                }
            }).catch(function (e) {
                $scope.errorMessageRegister = 'Error editando el estudiante';
                $scope.loagingRegistry = false;
            });
        }else{
            swal({
                text: "El nombre de usuario no esta disponible",
                type: "warning",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);
        }

    }
    $scope.mostrarPassword = function(){
        var cambio = document.getElementById("txtPassword");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
    $scope.onValidateUserName = function () {
        $http({
            url:"/validate_user_name/"+$scope.newStudent.user_name,
            method: "GET",
        }).
        then(function (response) {
            console.log('validación','id del usuario',response.data.data);
            ($scope.newStudent.user_name ===  $scope.user_name_old)?response.data.data = true:'';
            $scope.validateUserName = response.data.data;

        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error validando nombre de usuario';
        });
    }

}]);


