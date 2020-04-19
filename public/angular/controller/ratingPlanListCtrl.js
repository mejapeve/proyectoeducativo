MyApp.controller("ratingPlanListCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.ratingPlans = [];
    $scope.errorMessageFilter = '';
    
    $scope.init = function(company_id) {
        $('.d-none-result').removeClass('d-none');
        
    };
    $http({
        url:"/get_rating_plans",
        method: "GET",
    }).
    then(function (response) {
        $scope.ratingPlans = response.data ? response.data.data || response.data : response;
        $scope.ratingPlans = $scope.ratingPlans.map(function(value) {
            value.description_items = value.description_items ?value.description_items.split('|'):[];
            value.name_url_value = value.name.replace(/\s/g,'_').toLowerCase();
          return value;
        });
        
        
        
    }).catch(function (e) {
        $scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
    });
    
    $scope.onRatingPlanFree = function(ratingPlanId) {
        

        swal({
          title: "Estas seguro?",
          text: "Confirmas que deseas adquirir una prueba gratuita?",
          type: "warning",
          showConfirmButton: true,showCancelButton: true
        })
        .then((willConfirm) => {
          if (willConfirm) {
            swal({text:'Tu solicitud está siendo procesada!',showConfirmButton: false,showCancelButton: false});
            window.location='/validate_registry_free_plan/'+ratingPlanId;
          }
        });
    };
    
}]);
