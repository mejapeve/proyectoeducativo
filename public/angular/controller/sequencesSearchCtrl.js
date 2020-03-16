MyApp.controller("sequencesSearchCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.sequences = [];
	$scope.errorMessageFilter = '';
	$scope.searchText = '';
	$scope.areas = [];
	$scope.areaName = null;
	$scope.themesList = [];
	$scope.themeName = null;
	$scope.wordList = null;
	$scope.keywords = [];
	$scope.defaultCompanySequences = 1;
	$scope.responseData = null;

	$scope.init = function(company_id)
	{
		$scope.defaultCompanySequences = company_id;
		$('.d-none-result').removeClass('d-none');
		
	};
	function searchArea(areaName) {
		for (var i = 0; i < $scope.areas.length; i++) {
			if ($scope.areas[i] === areaName) { return true; }
		}
		return false;
	}
	function searchTheme(themeName) {
		for (var i = 0; i < $scope.themesList.length; i++) {
			if ($scope.themesList[i] === themeName) { return true; }
		}
		return false;
	}
	function searchKeyword(keyword) {
		for (var i = 0; i < $scope.keywords.length; i++) {
			if ($scope.keywords[i] === keyword) { return true; }
		}
		return false;
	}
	$http({
		url:"/get_company_sequences/"+$scope.defaultCompanySequences ,
		method: "GET",
	}).
	then(function (response) {
		$scope.sequences = response.data;
		$scope.responseData = response.data
		var value = null;
		for(var i = 0; i<$scope.sequences.length; i++) {
			value = $scope.sequences[i];
			if (value.areas) {
				angular.forEach(value.areas.split(','), function (areaName, key) {
					if (!searchArea(areaName)) {
						$scope.areas.push(areaName);
					}
				});
			}
			if (value.themes) {
				angular.forEach(value.themes.split(','), function (themeName, key) {
					if (!searchTheme(themeName)) {
						$scope.themesList.push(themeName);
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
		
		setTimeout(function(){
			ellipsizeTextBox();
		}, 1000);
		

	}).catch(function (e) {
		$scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
	});

	$scope.onThemeChange = function () {
		$scope.areaName = null;
		$scope.searchText = '';
		var sequence = null;
		$scope.sequences = [];
		if($scope.responseData) {
			for(var i = 0; i<$scope.responseData.length;i++){
				sequence = $scope.responseData[i];
				if(sequence.themes && sequence.themes.toLocaleUpperCase().includes($scope.themeName.toLocaleUpperCase())) {
					$scope.sequences.push(sequence);
					 
				}
			};
		}
		setTimeout(function(){
			ellipsizeTextBox();
		}, 100);
	};
	$scope.onSeachChange = function () {
		$scope.areaName = null;
		$scope.themeName = null;
		$scope.sequences = $scope.responseData;
		setTimeout(function(){
			ellipsizeTextBox();
		}, 100);
	};
	$scope.onAreaChange = function () {
		$scope.searchText = '';
		$scope.themeName = null;
		var sequence = null;
		$scope.sequences = [];
		if($scope.responseData) {
			for(var i = 0; i<$scope.responseData.length;i++){
				sequence = $scope.responseData[i];
				if(sequence.areas && sequence.areas.toLocaleUpperCase().includes($scope.areaName.toLocaleUpperCase())) {
					$scope.sequences.push(sequence);
					 
				}
			};
		}	
		setTimeout(function(){
			ellipsizeTextBox();
		}, 100);	
	};

	function initAutocompleteList() {

		var names = $scope.themesList.concat($scope.areas);
		var keywordsList = $scope.keywords.concat(names);
		if($scope.responseData) {
			for(var i = 0; i<$scope.responseData.length;i++){
				keywordsList.push($scope.responseData[i].name);
			}
		}
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
			if(event.relatedTarget && event.relatedTarget.id === 'keywordlist'){
				$scope.searchText = event.relatedTarget.text;
			}
			else {
				$scope.searchText = keyword;
			}
			//$scope.searchText = keyword;
			$scope.wordList = null;
		}
	}

	function ellipsizeTextBox() {
		if($scope.sequences && $scope.sequences.length ){
			for(var i=0;i<$scope.sequences.length;i++) {
				var el = document.getElementById('sequence-description-'+$scope.sequences[i].id);
				if(!el) continue;
				var wordArray = el.innerHTML.split(' ');
				while(el.scrollHeight > el.offsetHeight) {
					wordArray.pop();
					el.innerHTML = wordArray.join(' ') + '...';
				 }
			}
			
		}
		
	}
	
}]);
