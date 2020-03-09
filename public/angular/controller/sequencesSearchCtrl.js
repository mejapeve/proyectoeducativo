MyApp.controller("sequencesSearchCtrl", ["$scope", "$http", function ($scope, $http) {

	$scope.sequences = [];
	$scope.tematics = [];
	$scope.errorMessageFilter = '';
	$scope.searchText = '';
	$scope.sequencesId = null;
	$scope.sequenceNames = [];
	$scope.tematicName = '';
	$scope.wordList = null;
	$scope.keywords = [];

	function searchTematic(areaName) {
		for (var i = 0; i < $scope.tematics.length; i++) {
			if ($scope.tematics[i] === areaName) { return true; }
		}
		return false;
	}
	function searchKeyword(keyword) {
		for (var i = 0; i < $scope.keywords.length; i++) {
			if ($scope.keywords[i] === keyword) { return true; }
		}
		return false;
	}
	$http.get("http://www.mocky.io/v2/5e632950360000b611e8dcab").then(function (response) {
		
		$scope.sequences = response.data;
		var value = null;
		for(var i = 0; i<$scope.sequences.length; i++) {
			value = $scope.sequences[i];
			$scope.sequenceNames.push(value.name);
			if (value.areas) {
				angular.forEach(value.areas.split(','), function (areaName, key) {
					if (!searchTematic(areaName)) {
						$scope.tematics.push(areaName);
					}
				});
			}
			if (value.keywords) {
				angular.forEach(value.keywords.split(','), function (keyword, key) {
					if (!searchKeyword(keyword)) {
						$scope.keywords.push(keyword);
					}
				});
			}
		};

		initAutocompleteList();

	}).catch(function (e) {
		$scope.errorMessageFilter = 'Error consultando las secuencias';
	});

	$scope.onSequenceChange = function () {
		$scope.searchText = '';
		$scope.tematicName = null;
	};
	$scope.onTematicChange = function () {
		$scope.sequencesId = null;
		$scope.searchText = '';
	};
	$scope.onSeachChange = function () {
		$scope.sequencesId = null;
		$scope.tematicName = null;
	};

	function initAutocompleteList() {

		var names = $scope.tematics.concat($scope.sequenceNames);
		var keywordsList = $scope.keywords.concat(names);

		$scope.complete=function(event, string){
			
			if (event.key === "Enter" || event.key === "Escape"  ) {
				$scope.wordList = null;
				return;	
			}
			var output=[];
			angular.forEach(keywordsList,function(kw){
				if(kw.toLowerCase().indexOf(string.toLowerCase())>=0){
					output.push(kw);
				}
			});
			$scope.wordList = output;
		}
		$scope.fillTextbox=function(event, keyword){
			if(event.relatedTarget){
				console.log(event.relatedTarget);
			};
			$scope.searchText = keyword;
			$scope.wordList = null;
		}
	}
}]);
