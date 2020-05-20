MyApp.controller("listCompanySequencesCtrl", ["$scope", "$http", "$timeout", function ($scope, $http, $timeout) {
    
    $scope.errorMessage = null;
    $scope.newSequence = function() {
        swal({
            title: 'Escriba el nombre de la Guía de aprendizaje',
            input: 'text',
            inputPlaceholder: '',
            showCancelButton: true
          }).then(function (result) {
            $scope.messageError = '';
            $http.post("/create_sequence/",{"name":result}).then(function (response) {
                if(response.data && response.data.message){
                    swal('Conexiones',response.data.message,'success');
                    $timeout(function() {
                        window.location = "/conexiones/admin/sequences_get/" + response.data.sequence_id;
                    },1000);
                    
                }
                else  { 
                    $scope.messageError = response.message;
                    swal('Conexiones',$scope.messageError,'error');
                }
            }).catch(function(e){
                $scope.messageError = 'Error registrando la Guía de aprendizaje';
                swal('Conexiones',$scope.messageError,'error');
            });
        
            
            
          })
    }

}])
