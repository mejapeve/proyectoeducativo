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
    $scope.ratingPlans = [];

    $scope.init = function(company_id)
    {
        $scope.defaultCompanySequences = company_id;
        $('.d-none-result').removeClass('d-none');
        $('[icon-pedagogy]').each(function(index){
            var left = $(this).position().left - ($(this).width()/2);
            var top = $(this).position().top + 130;
            $(this).next().next().css('left',left);
            $(this).next().next().css('top',top);
        });
		
		//retrive plan
        $http({
            url: '/get_rating_plans/',
            method: "GET",
        }).
		then(function (response) {
			$scope.ratingPlans = response.data.data || response.data;
		}).catch(function (e) {
			$('.d-none-result').removeClass('d-none');
			$('#loading').removeClass('show');
			$scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
		});        

    };
    
    $(window).resize(function () {
        $('[icon-pedagogy]').each(function(index){
            var left = $(this).position().left - ($(this).width()/2);
            var top = $(this).position().top + 130 ;
            $(this).next().next().css('left',left);
            $(this).next().next().css('top',top);
        });
    });
    
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
        
        $scope.sequences = response.data.companySequences;
        $scope.responseData = $scope.sequences;
        
        var value = null;
        for(var i = 0; i<$scope.sequences.length; i++) {
            value = $scope.sequences[i];
            value.name_url_value = value.name.replace(/\s/g,'_').toLowerCase()
            if (value.areas) {
                angular.forEach(value.areas.split(','), function (areaName, key) {
                    areaName = (areaName[0] == ' ') ? areaName.substr(1) : areaName;
                    if (!searchArea(areaName)) {
                        $scope.areas.push(areaName);
                    }
                });
            }
            if (value.themes) {
                angular.forEach(value.themes.split(','), function (themeName, key) {
                    themeName = (themeName[0] == ' ') ? themeName.substr(1) : themeName;
                    if (!searchTheme(themeName)) {
                        $scope.themesList.push(themeName);
                    }
                });
            }
            if (value.keywords) {
                angular.forEach(value.keywords.split(','), function (keyword, key) {
                    keyword = (keyword[0] == ' ') ? keyword.substr(1) : keyword;
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
        /*if($scope.sequences && $scope.sequences.length ){
            for(var i=0;i<$scope.sequences.length;i++) {
                var el = document.getElementById('sequence-description-'+$scope.sequences[i].id);
                if(!el) continue;
                var wordArray = el.innerHTML.split(' ');
                while(el.scrollHeight > el.offsetHeight) {
                    wordArray.pop();
                    el.innerHTML = wordArray.join(' ') + '...';
                 }
            }
            
        }*/
        
    }
    
    $scope.onSequenceBuy = function (sequence) {
        var ratingPlans = '';
        for(var i = 0; i < $scope.ratingPlans.length; i++) {
            var rt = $scope.ratingPlans[i];
            if(!rt.is_free) {
                var listItem = rt.description_items.split('|');
                var items = '';
                for(var j=0;j<listItem.length;j++) {
                    items += '<li class="card-rating-plan-id-'+ i +'" fs-2><span class="color-gray-dark fs--1">' + listItem[j] + '</span></li>';
                }
			   var name = rt.name ? rt.name.replace(/\s/g,'_').toLowerCase() : '';
               var href = '/plan_de_acceso/' + rt.id + '/' + name + '/' + sequence.id;
               var button = '<a href="'+href+'" class="ml-auto mr-auto btn btn-sm btn-outline-primary w-50">Adquirir</a>';    
               ratingPlans += '<div class="mt-3 col-12 col-md-4 "><div class="p-2 card" style="border-radius: 13px;">'+
			   '<h6 class="font-weight-bold card-rating-plan-id-'+ i +'">'+rt.name+'</h6>'+
			   '<ul class=" text-left fs-2">' + items + '</ul>'+button+'</div></div>';
            }
        }
        var html = '<div class="row justify-content-center">' + ratingPlans + '</div>';
        swal({
            title: '<small class="p-2 rounded" style="background-color: white;padding: 7px;">Debes seleccionar un plan de acceso para adquirir esta guía</small>',
            html: html,
            width: '75%',
            showConfirmButton: false, showCancelButton: false
        }).catch(swal.noop);
		$('.swal2-show').css('background-color','transparent');
    }
	
    $scope.setPositionScroll = function () {
        
        if(window.scrollY <= 50) {
            var eTop = $('#divSearch').offset().top;
            window.scrollTo( 0, eTop - 80 );
        }
    }

    $scope.onIconPedagogy = function(icon) {
        if($scope.icon_pedagogy === icon)  {
            $scope.icon_pedagogy = '';
        }
        else {
            $scope.icon_pedagogy = icon;
        }
    }
    
}]);
