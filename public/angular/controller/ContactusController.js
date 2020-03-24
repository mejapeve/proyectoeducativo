MyApp.controller("contactusController", ["$scope", "$http", function($scope, $http) {
    $scope.name;
    $scope.email;
    $scope.affair;
    $scope.message;
    $scope.insertData = function (contactusForm) {
        $('#move').addClass('fa fa-spinner fa-spin');
        $('#send').attr('disabled',true);
        $http.post('/send_email_contactus',
            {
                    'name':$scope.name,
                    'email':$scope.email,
                    'affair':$scope.affair,
                    'message':$scope.message,
                 }
                ).
        then(function onSuccess(response) {
            //contactusForm.$setPristine()
            $scope.name = "";
            $scope.email = "";
            $scope.phone = "";
            $scope.affair = "";
            $scope.message = "";
            $scope.contactusForm.$setPristine(true);
            console.log( $scope.contactusForm);
            $('#move').removeClass('fa fa-spinner fa-spin');
            $('#move').attr('disabled',false);
            /*
            if(contactusForm.$setPristine){
                $scope.contactusForm.$setPristine();
            } else {
                contactusForm.$pristine = true;
                contactusForm.$dirty = false;
                angular.forEach(contactusForm, function (input, key) {
                    if (input.$pristine)
                        input.$pristine = true;
                    if (input.$dirty) {
                        input.$dirty = false;
                    }
                });
            }*/
            swal('Conexiones',response.data[0]['messagge'],response.data[1]['status']);
        }, function onError(response) {
            $('#move').removeClass('fa fa-spinner fa-spin');
            $('#send').attr('disabled',false);
            console.log(response)
            swal('Conexiones',response.data[0]['messagge'],response.data[1]['status']);

        });
    }

}]);


