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
                )
            .success(function(data) {
                    console.log(data)
                //habilitar notificación con respuesta de la petición
                }
            );
    }

}]);


