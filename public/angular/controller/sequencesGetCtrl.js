MyApp.controller("sequencesGetCtrl", function ($scope, $http, $timeout) {
	$scope.sequence = null;
	$scope.errorMessageFilter = '';
	
	var params = window.location.href.split('/');
	$scope.sequenceName = window.location.href.split('/')[params.length - 1];
	
	$scope.init = function() {
		$('.d-none-result').removeClass('d-none');
		$http({
			url:'/get_sequence/' + $scope.sequenceName,
			method: "GET",
		}).
		then(function (response) {
			$scope.sequence = response.data[0];
			$scope.sequence.images = $scope.sequence.url_slider_images.split('|');

			$timeout(function() {
				new Swiper('.swiper-container', {
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
				});
			  },1000);

			

		}).catch(function (e) {
			$scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
		});
	};
});
