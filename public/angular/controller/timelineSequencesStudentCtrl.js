MyApp.controller("timelineSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {
    
    $scope.sequences = null;
    $scope.errorMessage = null;
    $scope.init = function(company_id,account_service_id,sequence_id)    {
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
                $(`.circle${value.moment_order}${value.moment_section_id}`).attr('fill', '#FFD400');
                if(!flag){
                    moment = value.moment_order;
                    flag = true;
                }else{
                    if(moment == value.moment_order){
                       if(++count == 4){
                           $(`.star${value.moment_order}`).attr('fill', '#FFD400');
                           $(`.star${value.moment_order}`).attr('stroke', '#FFD400');
                           $(`.number${value.moment_order}`).attr('stroke', '#FFFFFF');
                           count = 1;
                           flag = false;
                       }
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
