MyApp.controller("sequencesGetCtrl", function ($scope, $http, $timeout) {
    $scope.sequence = null;
    $scope.errorMessageFilter = '';
    $scope.elementsKits = [];
    
    var params = window.location.href.split('/');
    $scope.sequenceName = window.location.href.split('/')[params.length - 1];
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
			
			function searchElementKit(elementKit) {
				for(var i=0;i<$scope.elementsKits.length;i++) {
					if($scope.elementsKits[i].type === elementKit.type && $scope.elementsKits[i].id === elementKit.id)
					return true;
				}
				return false;
			}
            
            
			var kit = moment = element = null;
			$scope.elementsKits = [];
			if($scope.sequence.moments){
                for(var i=0; i<$scope.sequence.moments.length; i++){
                    
					moment = $scope.sequence.moments[i];
					if(moment.moment_kit) {
						for(var j=0; j<moment.moment_kit.length; j++){
							kit = moment.moment_kit[i].kit;
							if(kit) { 
								kit.type="kit";
								kit.name_url_value = kit.name.replace(/\s/g,'_').toLowerCase();
								if(!searchElementKit(kit)) {
									$scope.elementsKits.push(kit);
								}
								if(kit.elementsKits && kit.elementsKits[0] ) {
									element = kit.elementsKits[0].element;
									element.type="element";
									element.name_url_value = element.name.replace(/\s/g,'_').toLowerCase();
									if(!searchElementKit(element)) {
										$scope.elementsKits.push(element);
									}
								}
							}
							else {
								element = moment.moment_kit[i].element;
								if(element) {
									element.type="element";
									element.name_url_value = element.name.replace(/\s/g,'_').toLowerCase();
									if(!searchElementKit(element)) {
										$scope.elementsKits.push(element);
									}
								}
							}
						}
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
    
    $scope.onSequenceBuy = function(sequence) {
        var ratingPlans = {
              2: 'Plan por 2 meses',
              3: 'Plan por 4 meses',
              4: 'Plan por 8 meses',
              4: 'Plan por 12 meses'
        };
        swal({
            title: 'Debes seleccionar un plan de acceso para adquirir esta guía',
            input: 'select',
            inputOptions: ratingPlans,
            inputValue: 2,
            showConfirmButton: true,showCancelButton: true
        })
        .then((result) => {
          if (result) {
            //TODO: redireccionar a detalle del plan seleccionando la guia
            var name = ratingPlans[result] ? ratingPlans[result].replace(/\s/g,'_').toLowerCase() : '';
            window.location = '/plan_de_acceso/'+result+'/'+name;
          }
        }).catch(swal.noop);
    }

});
