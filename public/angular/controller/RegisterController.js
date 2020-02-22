MyApp.controller("registerController", ["$scope", "$http", function($scope, $http) {
	
	$scope.countries = null;
	$scope.cities = null;
	$scope.countryId = null;
	$scope.cityId = null;
	$scope.departmentId = null;
	$scope.showSelectCity = false;

	$http.get("https://geoip-db.com/json/").then(function (response1) {
		$scope.country_code = response1.data.country_code;
		$http.get("/get_countries")
		.then(function(res){
			$scope.countries = res.data.data;
			$("#selectCountry").select2({ 
				data: $scope.countries
			});
			
			if($scope.country_code === 'CO') {
				$("#selectCountry").val(42).trigger("change")
				$scope.showSelectCity = true;
			}
			$('#selectCountry').on('select2:select', function (e) {
				var country = e.params.data;
				$scope.showSelectCity = ( country.id === 42 ) ;
alert($scope.showSelectCity);
				$scope.countryId = country.id;
			});
		});
	});

    
	
	$http.get("/get_cities")
	.then(function(res){
		var cities = res.data.data;
		var departments = [];
	    function searchDepartment(dptName){
			for(var i=0;i<departments.length;i++) {
				if(departments[i].text === dptName)
					return departments[i]
			}
			var newDept = { text: dptName,children:[] };
			departments.push(newDept);
			return newDept;
		}

		angular.forEach(cities, function(value, key) {
		   dpt = searchDepartment(value.department_name);
		   dpt.children.push(value);
		});

//		$scope.departments = departments;

		$('#selectCity').select2({
			placeholder: "Seleccione...",
			data: departments,
			query: function(options) {
				if(!options.element) return
				var selectedIds = options.element.select2('val');
				var selectableGroups = $.map(this.data, function(group) {
					var areChildrenAllSelected = true;
					$.each(group.children, function(i, child) {
						if (selectedIds.indexOf(child.id) < 0) {
							areChildrenAllSelected = false;
							return false; // Short-circuit $.each()
						}
					});
					return !areChildrenAllSelected ? group : null;
				});
				options.callback({ results: selectableGroups });
			}
		}).on('select2-selecting', function(e) {
			var $select = $(this);
			if (e.val == '') { // Assume only groups have an empty id
				e.preventDefault();
				$select.select2('data', $select.select2('data').concat(e.choice.children));
				$select.select2('close');
			}
		});


	}, function(res){
		// acciones a realizar cuando se recibe una respuesta de error
	});
}]);


