MyApp.controller("sequencesGetCtrl", function ($scope, $http, $timeout) {
    $scope.sequence = null;
    $scope.errorMessageFilter = '';
    $scope.kits = [];
    
    var params = window.location.href.split('/');
    $scope.sequenceName = window.location.href.split('/')[params.length - 1].replace('%20','');
    $scope.sequenceId = window.location.href.split('/')[params.length - 2];
    
    $scope.init = function() {
        $http({
            url:'/get_sequence/' + $scope.sequenceId,
            method: "GET",
        }).
        then(function (response) {
            
            $scope.sequence = response.data[0];
            $scope.sequence.images = [];
            if($scope.sequence.url_slider_images) {
                $scope.sequence.images = $scope.sequence.url_slider_images.split('|');
            }
            
            $scope.kit_elements = [];
            if($scope.sequence.sequence_kit){
                for(var i=0; i<$scope.sequence.sequence_kit.length; i++){
                    var kit = $scope.sequence.sequence_kit[i].kit;
                    kit.type="kit";
                    $scope.kit_elements.push(kit);
                    if(kit.kit_elements && kit.kit_elements[0] ) {
                        var element = kit.kit_elements[0].element;
                        element.type="element";
                        $scope.kit_elements.push(element);    
                    }
                    
                }
            }
            
            $timeout(function() {
                
                $('#loading').removeClass('show');
                $('.d-none-result2').removeClass('d-none');
                new Swiper('.swiper-container', {
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
              },1000);

        }).catch(function (e) {
            $('.d-none-result2').removeClass('d-none');
            $('#loading').removeClass('show');
            $scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
        });
    };
});
