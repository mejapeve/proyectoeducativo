MyApp.controller("editCompanySequencesCtrl", ["$scope", "$http", "$timeout", function ($scope, $http, $timeout) {
    
    $scope.errorMessage = null;
	$scope.sequence = null;
	$scope.section = null;
	$scope.sectionName = 'Secuencia';
	$scope.sectionSequenceId = null;
	$scope.sections = [{"id":1,"name":"Situación Generadora"},{"id":2,"name":"Ruta de viaje"},{"id":3,"name":"Guía de saberes"},{"id":4,"name":"Punto de encuentro"}];
	$scope.typeEdit = null;
	$scope.elementParentEdit = null;
	$scope.elementEdit = null;
	$scope.dataJstreeType = 'openSequence';
	$scope.container = { 'w':895,'h':569};
	
    function find(list,id){
		for(var i=0;i<list.length;i++) {
			if(list[i].id === Number(id)) {
				return list[i];
			}
		}
		return false;
	}
	
	$( window ).resize(function() {
        $scope.container.w = window.innerHeight || $(window).height();
		$scope.container.h =  window.innerWidth || $(window).width();		
    });
	
	$scope.initEdit = function(sequence_id) {
		$http.get('/get_sequence/'+sequence_id)
		.then(function (response) {
			
			$scope.sequence = response.data[0];
			$scope.elementParentEdit = $scope.sequence;
			
			$('#jstree').on('select_node.jstree', function (evt, data) {
				var dataJstree = JSON.parse($('#'+data.selected).attr('data-jstree'));
				if(dataJstree.type==='openSequence') {
					$scope.sectionName = 'Secuencia';
					$scope.sectionSequenceId = null;
					$scope.sequenceSection = null;
					$scope.elementParentEdit = $scope.sequence;
				}
				else if(dataJstree.type==='openSequenceSection'){
					$scope.sectionSequenceId = 'section_'+dataJstree.id; 
					$scope.sequenceSection = JSON.parse($scope.sequence[$scope.sectionSequenceId]);
					$scope.sectionName = find($scope.sections,$scope.sequenceSection.section.id).name;
					$scope.elementParentEdit = $scope.sequenceSection; 
				}
				else if(dataJstree.type==='openMoment'){
					$scope.sectionName = '';
					
				}
				else if(dataJstree.type==='openMoment'){
					
				}
				$scope.dataJstreeType = dataJstree.type;
				$scope.typeEdit = null;
				if($scope.sequenceSection) {
					 if(!$scope.sequenceSection.background_image) {
						 $scope.sequenceSection.background_image = '';
					 }						 
				}
				$scope.$apply();
				resizeSequenceCard();
				
			  }).jstree({
				  "core" : {
					"multiple" : false,
					"animation" : 0
				  }
				});
		});
    };	
	
	$scope.deleteBackgroundSection = function (){
		
		if($scope.dataJstreeType==='openSequenceSection') {
			$scope.sequenceSection.background_image = '';
			$scope.sequence[$scope.sectionSequenceId] = JSON.stringify($scope.sequenceSection);
		}
	}
	
	$scope.onClickElement = function(parent,element,title,type) {
		$scope.typeEdit = type;
		$scope.elementParentEdit = parent;
		$scope.elementEdit =  element;		
		$scope.titleEdit = title;		
		if($scope.typeEdit === 'img') {
			var dir = getLastPath($scope.elementParentEdit[$scope.elementEdit]) || 'images/sequences/sequence'+$scope.sequence.id;
			$scope.onChangeFolderImage(dir);
		}
		else if($scope.typeEdit === 'image-element') {
			var dir = getLastPath($scope.elementEdit.url) || 'images/sequences/sequence'+$scope.sequence.id;
			$scope.onChangeFolderImage(dir);
		}
	}
	
	$scope.changeFormatDate = function(elementParentEdit,elementEdit,format) {
		 try { 
			 $scope.elementParentEdit[elementEdit] = moment($scope.elementParentEdit[elementEdit],"YYYY-MM-DD").format(format);
			 
		 } catch(e){}
	}
	
	$scope.onImgChange = function(field,element) {
		if(typeof $scope.elementEdit === 'object') {
			var image = new Image();
			var refSplit = window.location.href.split('/');
			image.src = refSplit[0]+'//'+refSplit[2]+'/'+field.url_image;
			image.onload = function() {
				$scope.elementEdit.url = field.url_image;
				$scope.elementEdit.w = this.width;
				$scope.elementEdit.h = this.height;
				$scope.$apply();
			};
			
		}
		else {
			$scope.elementParentEdit[$scope.elementEdit] = field.url_image;			
		}
		
		if($scope.dataJstreeType==='openSequenceSection') {
			$scope.sequence[$scope.sectionSequenceId] = JSON.stringify($scope.elementParentEdit);
		}
		$timeout(function() {                
			resizeSequenceCard();
		},1000);
	} 

	$scope.onChangeFolderImage = function(directory) {		
		$http.post('/conexiones/admin/get_folder_image',{'dir':directory}).then(function (response) {
			var list = response.data;
			
			$scope.directory = [];
			$scope.filesImages = [];
			var item = null;
			for(indx in list) {
				item = list[indx];				 
				if(item.includes('.png')||item.includes('.jpg')||item.includes('.jpeg')) {				 
					$scope.filesImages.push({'type':'img','url_image':directory+'/'+item});
				}
				else if(!item.includes('.')) {
					$scope.directory.push({'type':'dir','name':item,'dir':directory+'/'+item});
				}
				else if (item === '..' && directory != 'images') {
					var dir = getLastPath(directory);
					$scope.directory.push({'type':'dir','name':item,'dir':dir});
				}
			} 
		});
		/*.catch(e){
			$scope.errorMessage = JSON.stringify(e);
		}*/	
	}

	$scope.newElement = function(typeItem) {
		if(typeItem==='text') {
			$scope.elementParentEdit.elements = $scope.elementParentEdit.elements || [];
			$scope.elementParentEdit.elements.push({'type':typeItem,'fs':12,'ml':10,'mt':76,'w':100,'h':26,'text':'--texto de guía--'});
		}
		else if(typeItem==='paragraph') {
			$scope.elementParentEdit.elements = $scope.elementParentEdit.elements || [];
			$scope.elementParentEdit.elements.push({'type':typeItem,'fs':12,'ml':100,'mt':76,'w':100,'h':200,'text':'--Parrafo 1--'});			
		}
		else if(typeItem==='image-element') {
			$scope.elementParentEdit.elements = $scope.elementParentEdit.elements || [];
			$scope.elementParentEdit.elements.push({'type':typeItem,'url':'images/icons/NoImageAvalilable.jpeg','w':162,'h':200,'ml':150,'mt':76});			
		}
		$timeout(function() {                
			resizeSequenceCard();
		},10);
		
	}

	$scope.deleteElement  = function(parentElement,$index) {
		if(parentElement && parentElement.elements ) {
			var newElements = [];
			for(var i=0; i<parentElement.elements.length; i++) {
				if(i!== $index)
				newElements.push(parentElement.elements[i]);
			}
			parentElement.elements = newElements;
		}
		
	}
	
	function getLastPath(directory) {
		var dirSplit = directory.split('/');
		var dirName = '';
		for(var i=0;i<dirSplit.length-1;i++) {
			if(dirName.length>0)  dirName += '/';						
			dirName += dirSplit[i];						
		}
		return dirName;
	}
	
	$scope.onSaveSequence = function () {
		
	}
	
}]);

MyApp.directive('conxTextList', function() {
  return {
	restrict: 'E',
    template: '<div ng-show="elementParentEdit && elementParentEdit[elementEdit].length > 0" ng-repeat="split in elementParentEdit[elementEdit].split(\'|\') track by $index"> ' +
	'<input ng-change="onChangeSplit($index,split)" ng-model="split" class="mt-1 fs--1"/>  ' +
	'<a ng-click="delete($index)" style="marging-top: 8px:;"><i class="far fa-times-circle"></i><a/> </div> ' +
	'<input class="mt-1 fs--1" type="text" ng-model="newSplit"/> <a class="cursor-pointer" ng-click="onNewSplit()"> <i class="fas fa-plus"></i><a/>',
	controller: function ($scope,$timeout) {
		$scope.delete = function($index) {
			var list = $scope.elementParentEdit[$scope.elementEdit].split('|');
			var newList = '';
			for(var i=0;i<list.length;i++) {
				if(i!=$index) {
					if(newList.length>0) {
						newList = newList + '|';
					}
					newList = newList + list[i];
				}
			}
			$scope.elementParentEdit[$scope.elementEdit] = newList;	 
		}
		$scope.onChangeSplit = function($index,split) {
			var list = $scope.elementParentEdit[$scope.elementEdit].split('|');
			var newList = '';
			for(var i=0;i<list.length;i++) {
				if(newList.length>0) {
					newList = newList + '|';
				}
				if(i!=$index) {					
					newList = newList + list[i];
				}
				else {
					newList = newList + split; 
				}
			}
			$scope.elementParentEdit[$scope.elementEdit] = newList;	 
		}
		$scope.onNewSplit = function() {
			if($scope.newSplit && $scope.newSplit.length > 0) {
				if($scope.elementParentEdit[$scope.elementEdit].length > 0) {
					$scope.elementParentEdit[$scope.elementEdit] += '|';
				}
				$scope.elementParentEdit[$scope.elementEdit] += $scope.newSplit;
			}
			$scope.newSplit = '';
		}		
		$scope.onChangeInput = function() {
			if($scope.dataJstreeType==='openSequenceSection') {				
				$scope.sequence[$scope.sectionSequenceId] = JSON.stringify($scope.sequenceSection);				
			}
			$timeout(function() {                
				resizeSequenceCard();
			},10);
		}
	}
  };
});

MyApp.directive('conxElement', function() {
  return {
	restrict: 'E',
	scope: {
      type: '@'
    },
    template: function(elem, attr) {
		if(attr.type === "text-list") { 
			return '<conx-text-list><input type="text" ng-value="split"/></conx-text-list>';
		}
	    else { 
			return '<input type="hidden" ng-value="element"/>';
		}
    },
	controller: ['$scope', function ($scope) {
      if($scope.element)
		  $scope.elementSplit = $scope.element.split(',');

       
    }]	
  };
});