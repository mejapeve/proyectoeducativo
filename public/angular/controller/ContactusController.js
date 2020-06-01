MyApp.controller("contactusController", ["$scope", "$http", function($scope, $http) {
    $scope.name;
    $scope.email;
    $scope.affair;
    $scope.message;
    $scope.init = function() {
       $('.d-result').removeClass('d-none');
    }
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
            $scope.name = "";
            $scope.email = "";
            $scope.phone = "";
            $scope.affair = "";
            $scope.message = "";
            //$scope.contactusForm.$setPristine(true);
            $scope.contactusForm.$invalid = false
            $('#move').removeClass('fa fa-spinner fa-spin');
            $('#send').attr('disabled',false);
            swal('Conexiones',response.data[0]['message'],response.data[1]['status']);
        }, function onError(response) {
            $('#move').removeClass('fa fa-spinner fa-spin');
            $('#send').attr('disabled',false);
            swal('Conexiones',response.data[0]['message'],response.data[1]['status']);

        });
    }

}]);


