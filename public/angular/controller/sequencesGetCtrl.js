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
			$('#loading').removeClass('show');
			$scope.sequence.url_slider_images = 
			'images/sequences/sequence1/slide/slide-secuencia-1 (1).png|images/sequences/sequence1/slide/slide-secuencia-1 (2).png|'+
			'images/sequences/sequence1/slide/slide-secuencia-1 (3).png|images/sequences/sequence1/slide/slide-secuencia-1 (4).png|' +
			'images/sequences/sequence1/slide/slide-secuencia-1 (5).png'
			$scope.sequence.images = $scope.sequence.url_slider_images.split('|');
			$('.d-none-result2').removeClass('d-none');
			
			$scope.kits = [];
			if($scope.sequence.sequence_kit){
				for(var i=0; i<$scope.sequence.sequence_kit.length; i++){
					var kit = $scope.sequence.sequence_kit[i].kit;
				}
			}
			
			$timeout(function() {
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
