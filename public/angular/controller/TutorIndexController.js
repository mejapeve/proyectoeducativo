MyApp.controller("TutorIndexController", ["$scope", "$http", function($scope, $http) {

    
    $scope.initInscriptions = function() {
		
		$scope.students = [];
		$scope.newStudent = {};
		$scope.loagingRegistry = false;
		$scope.newRegisterForm = false;
		$scope.errorMessageRegister = "";
		
        $http({
            url:"/get_students_tutor/",
            method: "GET",
        }).
        then(function (response) {
            $scope.students = response.data;
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
            $scope.errorMessageRegister = 'Error regitrando el estudiante';
            $scope.loagingRegistry = false;
        });
    }

}]);


