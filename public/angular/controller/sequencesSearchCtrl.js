MyApp.controller("sequencesSearchCtrl", ["$scope", "$http", function ($scope, $http) {

	$scope.sequences = [];
	$scope.tematics = [];
	$scope.errorMessageFilter = '';
	$scope.searchText = '';
	$scope.sequencesId = null;
	$scope.tematicId = null;

	function searchTematic(areaName) {
		for (var i = 0; i < $scope.tematics.length; i++) {
			if ($scope.tematics[i] === areaName) { return true; }
		}
		return false;
	}
	$http.get("http://www.mocky.io/v2/5e632950360000b611e8dcab").then(function (response) {
		$scope.sequences = response.data;
		angular.forEach($scope.sequences, function (value, key) {
			if (value.areas) {
				angular.forEach(value.areas.split(','), function (areaName, key) {
					if (!searchTematic(areaName)) {
						$scope.tematics.push(areaName);
					}
				});
			}
		});
	}).catch(function (e) {
		$scope.errorMessageFilter = 'Error consultando las secuencias';
	});

	$scope.onSequenceChange = function () {
		$scope.searchText = '';
		$scope.tematicId = null;
	};
	$scope.onTematicChange = function () {
		$scope.sequencesId = null;
		$scope.searchText = '';
	};
	$scope.onSeachChange = function () {
		$scope.sequencesId = null;
		$scope.tematicId = null;
	};

}]);


MyApp.filter('sequencesMatchFltr', function () {
	return function (items) {
		var filtered = [];
		for (var i = 0; i < items.length; i++) {
			if (items[i].id === sequenceId) {
				filtered.push(item);
			}
		}
		return filtered;
	};
});