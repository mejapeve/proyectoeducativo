MyApp.controller("kitsElementsCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.kits = [];
	$scope.errorMessageFilter = '';
	$scope.searchText = '';
	
	$scope.init = function()
	{
		$('.d-none-result').removeClass('d-none');
	};
	$http({
		url:"/get_kit_elements",
		method: "GET",
	}).
	then(function (response) {
		$scope.kits = response.data;
	}).catch(function (e) {
		$scope.errorMessageFilter = 'Error consultando las secuencias';
	});
}]);
