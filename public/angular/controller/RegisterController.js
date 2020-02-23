MyApp.controller("registerController", ["$scope", "$http", function($scope, $http) {
	
	$scope.countries = null;
	$scope.cities = null;
	$scope.countryId = null;
	$scope.cityId = null;
	$scope.departmentId = null;
	$scope.showselectCities = false;

	$http.get("https://geoip-db.com/json/").then(function (response1) {
		$scope.country_code = response1.data.country_code;
		$http.get("/get_countries")
		.then(function(res){
			$scope.countries = res.data.data;
			$("#selectCountry").select2({ 
				data: $scope.countries,
				placeholder: "Seleccione...",
			});
			
			if($scope.country_code === 'CO') {
				$("#selectCountry").val(42).trigger("change")
				$scope.countryId = 42;
				$scope.showselectCities = true;
			}
			$('#selectCountry').on('select2:select', function (e) {
				var country = e.params.data;
				$scope.showselectCities = country.id === "42";
				$scope.countryId = country.id;
				$scope.$apply();
			});

			$scope.$watch('countryId', function(scope){
				   
			}, true);
		});
	});

	
	$http.get("/get_cities")
	.then(function(res){
		var cities = res.data.data;
		var departments = [];
	    function searchDepartment(dptId,dptName){
			for(var i=0;i<departments.length;i++) {
				if(departments[i].id === dptId)
					return departments[i];
			}
			var newDept = { id: dptId, text: dptName,children:[] };
			departments.push(newDept);
			return newDept;
		}

		angular.forEach(cities, function(value, key) {
		   dpt = searchDepartment(value.department_id,value.department_name);
		   dpt.children.push(value);
		});

		$scope.departments = departments;

		$('#selectCities').select2({
			placeholder: "Seleccione...",
			data: departments
		})

		$('#selectCities').on('select2:select', function (e) {
			var city = e.params.data;
			$scope.departmentId = city.department_id;
			$scope.$apply();
		});

	}, function(res){
		// acciones a realizar cuando se recibe una respuesta de error
	});
}]);


