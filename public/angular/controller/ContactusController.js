MyApp.controller("contactusController", ["$scope", "$http", function($scope, $http) {
    $scope.name;
    $scope.email;
    $scope.phone;
    $scope.affair;
    $scope.message;
    $scope.insertData = function () {
        console.log($scope.insert);
        $http.post('/send_email_contactus',
            {
                    'name':$scope.name,
                    'email':$scope.email,
                    'phone':$scope.phone,
                    'affair':$scope.affair,
                    'message':$scope.message,
                 }
                ).
        then(function onSuccess(response) {
            // Handle success
            console.log(response)
            swal("Hello world!");
            var data = response.data;
            var status = response.status;
            var statusText = response.statusText;
            var headers = response.headers;
            var config = response.config;

        }, function onError(response) {
            // Handle error
            var data = response.data;
            var status = response.status;
            var statusText = response.statusText;
            var headers = response.headers;
            var config = response.config;

        });

    }

}]);


