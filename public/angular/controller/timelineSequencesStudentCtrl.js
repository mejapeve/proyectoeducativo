MyApp.controller("timelineSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {
    
    $scope.sequences = null;
    $scope.errorMessage = null;
console.log(12);
    $scope.init = function(company_id)    {
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
            url:"/get_advance_line/",
            method: "GET",
        }).
        then(function (response) {
            let data = response.data
            let startOn = false;
            let flag = false;
            let moment , count = 1;
            $(data.data).each(function (key, value) {
                $(`#circle${value.number_moment}${value.struct_content_id}`).attr('fill', 'yellow');
                if(!flag){
                    moment = value.number_moment;
                    flag = true;
                    console.log('ingresa')
                }else{

                    if(moment == value.number_moment){
                       if(++count == 4){
                           console.log('cantidad',count)
                           $(`#star${value.number_moment}`).attr('fill', 'yellow');
                           count = 1;
                       }
                        console.log('ingresa2',moment,value.number_moment,count)
                    }else{
                        count = 1;
                    }
                }
            });
        }).catch(function (e) {
            //$scope.errorMessage = 'Error consultando las secuencias, compruebe su conexión a internet';
        });

    };    
    
}]);
