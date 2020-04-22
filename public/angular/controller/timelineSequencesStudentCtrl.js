MyApp.controller("timelineSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {
    
    $scope.sequences = null;
    $scope.errorMessage = null;
console.log(12);
    $scope.init = function(company_id,account_service_id,sequence_id)    {
        console.log('datos al cargar linea de avance',company_id,account_service_id);
        $scope.defaultCompanySequences = company_id;
        $('.d-none-result').removeClass('d-none');
        $http({
            url:"/get_available_sequences/"+$scope.defaultCompanySequences ,
            method: "GET",
        }).
        then(function (response) {
            $scope.sequences = response.data;
        }).catch(function (e) {
            $scope.errorMessage = 'Error consultando las secuencias, compruebe su conexión a internet';
        });
        $http({
            url:"/get_advance_line/"+account_service_id+'/'+sequence_id,
            method: "GET",
        }).
        then(function (response) {
            let data = response.data
            let startOn = false;
            let flag = false;
            let moment , count = 1;
            $(data.data).each(function (key, value) {
                $(`#circle${value.moment_id}${value.moment_section_id}`).attr('fill', 'yellow');
                if(!flag){
                    moment = value.moment_id;
                    flag = true;
                    console.log('ingresa')
                }else{
                    if(moment == value.moment_id){
                       if(++count == 4){
                           console.log('cantidad',count)
                           $(`#star${value.moment_id}`).attr('fill', 'yellow');
                           count = 1;
                       }
                        console.log('ingresa2',moment,value.moment_id,count)
                    }else{
                        count = 1;
                        flag = false;
                    }
                }
            });
        }).catch(function (e) {
            //$scope.errorMessage = 'Error consultando las secuencias, compruebe su conexión a internet';
        });

    };    
    
}]);
