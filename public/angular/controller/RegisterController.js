MyApp.controller("registerController", ["$scope", "$http", "$templateCache", function($scope, $http, $templateCache) {
	
	$scope.countries = null;
	$scope.cities = null;
	$scope.countryId = null;
	$scope.cityId = 0;
	$scope.city = '';
	$scope.name = '';
	$scope.email = '';
	$scope.departmentId = null;
	$scope.showselectCity = false;
	$scope.messageError = null;
	$scope.termsConditions = $('#terms').html();

	$http.get("https://geoip-db.com/json/").then(function (response1) {
		$scope.country_code = response1.data.country_code;
		$http.get("/get_countries")
		.then(function(res){
			$scope.countries = res.data.data;
			$("#selectCountry").select2({
				placeholder: "Seleccione...",
			});
			
			setTimeout(function(){
			 if($scope.country_code === 'CO') {
				$("#selectCountry").val("42").trigger("change");
				$scope.countryId = "42";
				$scope.showselectCity = true;
				$scope.$apply();
			}
			}, 100);

			$('#selectCountry').on('select2:select', function (e) {
				var country = e.params.data;
				if(country.id === "42") {
					$scope.showselectCity =  true;
					$scope.city_id = null;
					$scope.city = '';
					$("#selectCity").val(null).trigger("change");
				}
				else {
					if($scope.countryId === "42") { //previous country selected
						$scope.city = '';	
					}
					$scope.showselectCity =  false;
					$scope.city_id = null;
					$scope.departmentId = null;
				}
				$scope.countryId = country.id;
				$scope.$apply();
			});
		}).catch(function(er){
			$scope.messageError = 'Error consultando lista de paises';
		});
	}).catch(function(e){
		$scope.messageError = 'Error consultando el pais';
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

		$('#selectCity').select2({
			placeholder: "Seleccione...",
			data: departments
		})

		$('#selectCity').on('select2:select', function (e) {
			var city = e.params.data;
			$scope.departmentId = Number(city.department_id);
			$scope.city = city.text;
			$scope.city_id = city.id;
			$scope.$apply();
		});

	}).catch(function(error){
		$scope.messageError = 'Error consultando lista de ciudades';
	});

	$scope.onTermsConditions = function() {

		swal({
					title:'', 
					text: $scope.termsConditions,
					button: "Aceptar",
					html: true,
					allowOutsideClick: true	
				});
	}

}]);


