MyApp.controller("editCompanySequencesCtrl", ["$scope", "$http", "$timeout", function ($scope, $http, $timeout) {
    
    $scope.errorMessage = null;
	$scope.sequence = null;
	$scope.moments = [];
	$scope.moment = null;
	$scope.section = null;
	$scope.sectionName = 'Secuencia';
	$scope.sectionSequenceId = null;
	$scope.sectionSequenceNames = [{"id":1,"name":"Situación Generadora"},{"id":2,"name":"Ruta de viaje"},{"id":3,"name":"Guía de saberes"},{"id":4,"name":"Punto de encuentro"}];
	$scope.sectionsMomentNames = [{"type":1,"name":"Pregunta Central"},{"type":2,"name":"Ciencia en contexto"},{"type":3,"name":"Experiencia científica"},{"type":4,"name":"+ Conexiones"}];
	$scope.typeEdit = null;
	$scope.elementParentEdit = null;
	$scope.elementEdit = null;
	$scope.dataJstreeType = 'openSequence';
	$scope.container = { 'w':895,'h':569};
	$scope.changesApply = false;
	$scope.indexElement = null;
	$scope.directoryPath = null;
	$scope.momentSections = null;
	
    
	$( window ).resize(function() {
        $scope.container.w = window.innerHeight || $(window).height();
		$scope.container.h =  window.innerWidth || $(window).width();		
    });
	
	function findById(list,id){
		for(var i=0;i<list.length;i++) {
			if(list[i].id === Number(id)) {
				return list[i];
			}
		}
		return false;
	}
		
	function findMoment(order) {
		var  moment = null;
		for(var i=0;i<$scope.moments.length;i++) {
			if($scope.moments[i].order === order) {
				return $scope.moments[i];
			}
		}
		return moment;
	}
	
	function findSectionMoment(list,type){
		for(var i=0;i<list.length;i++) {
			if(list[i].type === Number(type)) {
				return list[i];
			}
		}
		return false;
	}
	
	function InitializeJstree() {
	  
	  $('#sidemenu-sequences-content').remove();
	  
	  $newDiv = $('#sidemenu-sequences-content-temp').clone().prependTo('#sidemenu-sequences');
	  $newDiv.addClass('d-lg-block');
	  $newDiv.find('#jstree').attr('id','jstreetemp');
	  $newDiv.attr('id','sidemenu-sequences-content');
	  
	  $('#jstreetemp').on('select_node.jstree', function (evt, data) {
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
			$scope.sectionName = findById($scope.sectionSequenceNames,$scope.sequenceSection.section.id).name;
			$scope.elementParentEdit = $scope.sequenceSection;
		}
		else if(dataJstree.type==='openMoment'){
			$scope.moment = findMoment(dataJstree.order);
			$scope.sectionName = 'Momento ' + $scope.moment.order;
			$scope.sectionSequenceId = null;
			$scope.sequenceSection = null;
			$scope.elementParentEdit = $scope.moment;
		}
		else if(dataJstree.type==='openSectionMoment'){
			$scope.moment = findMoment(dataJstree.order);
			$scope.sectionMomentId = Number(dataJstree.section);
			$scope.sectionName = $scope.moment.sections[$scope.sectionMomentId].section.name;
			$scope.elementParentEdit = $scope.moment.sections[$scope.sectionMomentId];
		}
		
		$scope.dataJstreeType = dataJstree.type;
		$scope.typeEdit = null;
		$scope.indexElement = null;
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
	  
	}
	
	$scope.initEdit = function(sequence_id) {
		$http.get('/get_sequence/'+sequence_id)
		.then(function (response) {
			
			$scope.sequence = response.data[0];
			
			$scope.moments = $scope.sequence.moments;
			var moment = section1 = section2 = section3 = section4 = null;
			for(var i=0;i<$scope.moments.length;i++) {
				moment = $scope.moments[i];
				
				section1 = JSON.parse(moment.section_1);
				if(section1 && section1.section)
				section1.section = findSectionMoment($scope.sectionsMomentNames,section1.section.type);
				
				section2 = JSON.parse(moment.section_2);
				if(section2 && section2.section)
				section2.section = findSectionMoment($scope.sectionsMomentNames,section2.section.type);
				
				section3 = JSON.parse(moment.section_3);
				if(section3 && section3.section)
				section3.section = findSectionMoment($scope.sectionsMomentNames,section3.section.type);
				
				section4 = JSON.parse(moment.section_4);
				if(section4 && section4.section)
				section4.section = findSectionMoment($scope.sectionsMomentNames,section4.section.type);
				
				moment.sections = [section1,section2,section3,section4];
			}
			
			$scope.elementParentEdit = $scope.sequence;
			
			$timeout(function() {                
				InitializeJstree();
			},500);
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
	
	$scope.onClickElementWithDelete = function(parent,element,$index) {
		$scope.indexElement = $index;
		var title = (element.type==='text-element') ? 'Texto' : ( element.type==='text-area-element' ) ? 'Párrafo' : (element.type==='image-element') ? 'Imágen' : '';
		$scope.onClickElement(parent,element,title,element.type);
	}
	
	$scope.changeFormatDate = function(elementParentEdit,elementEdit,format) {
		 try { 
			 $scope.elementParentEdit[elementEdit] = moment($scope.elementParentEdit[elementEdit],"YYYY-MM-DD").format(format);
			 $scope.changesApply = true;
		 } catch(e){}
	}
	
	$scope.onImgChange = function(field,element) {
		$scope.changesApply = true;
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

	$scope.onChangeFolderImage = function(directoryPath) {		
		$scope.directoryPath = null;
		$http.post('/conexiones/admin/get_folder_image',{'dir':directoryPath}).then(function (response) {
			var list = response.data;
			$scope.directory = [];
			$scope.directoryPath = directoryPath;
			$scope.filesImages = [];
			var item = null;
			for(indx in list) {
				item = list[indx];				 
				if(item.includes('.png')||item.includes('.jpg')||item.includes('.jpeg')) {				 
					$scope.filesImages.push({'type':'img','url_image':directoryPath+'/'+item});
				}
				else if(!item.includes('.')) {
					$scope.directory.push({'type':'dir','name':item,'dir':directoryPath+'/'+item});
				}
				else if (item === '..' && directoryPath != 'images') {
					var dir = getLastPath(directoryPath);
					$scope.directory.push({'type':'dir','name':item,'dir':dir});
				}
			} 
		});
		/*.catch(e){
			$scope.errorMessage = JSON.stringify(e);
		}*/	
	}

	$scope.newElement = function(typeItem) {
		$scope.changesApply = true;
		if(typeItem==='text-element') {
			$scope.elementParentEdit.elements = $scope.elementParentEdit.elements || [];
			$scope.elementParentEdit.elements.push({'type':typeItem,'fs':12,'ml':10,'mt':76,'w':100,'h':26,'text':'--texto de guía--'});
		}
		else if(typeItem==='text-area-element') {
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
		$scope.changesApply = true;
		if(parentElement && parentElement.elements ) {
			var newElements = [];
			for(var i=0; i<parentElement.elements.length; i++) {
				if(i!== $index)
				newElements.push(parentElement.elements[i]);
			}
			parentElement.elements = newElements;
		}
		
		if($scope.dataJstreeType==='openSequenceSection') {				
			$scope.sequence[$scope.sectionSequenceId] = JSON.stringify($scope.sequenceSection);				
		}
		$scope.indexElement = null;
		$scope.typeEdit = '';
		
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
		$http.post('/update_sequence/',$scope.sequence)
		.then(function (response) {
			if(response && response.status===200) {
				$scope.changesApply = false;
				swal('Conexiones',response.data.message,'success');
				$scope.initEdit($scope.sequence.id);
			}
			else {
				swal('Conexiones','Error al modificar la secuencia','danger');
			}
		});
		//.error(function(reason) {
		//	swal('Conexiones','Error al modificar la secuencia','danger');
		//});
	}
	
	$scope.onSaveSequenceSection = function () {
		
		var data = {
			'id': $scope.sequence.id,
			'section_number': $scope.sectionSequenceId.replace('section_',''),
			'data_section': $scope.sequence[$scope.sectionSequenceId]
		};
		
		$http.post('/update_sequence_section/',data)
		.then(function (response) {
			if(response && response.status===200) {
				$scope.changesApply = false;
				swal('Conexiones',response.data.message,'success');
				$scope.initEdit($scope.sequence.id);
			}
			else {
				swal('Conexiones','Error al modificar la sección de la secuencia','error');
			}
			$scope.initEdit($scope.sequence.id);
		},function(reason) {
			var message = (reason && reason.data) ? reason.data.message : '';
			swal('Conexiones','Error al modificar la secuencia: '+message,'error');
			$scope.initEdit($scope.sequence.id);
		});
	}
	
	$scope.onSaveMoment = function () {
		$http.post('/update_moment/',$scope.moment)
		.then(function (response) {
			if(response && response.status===200) {
				$scope.changesApply = false;
				$scope.initEdit($scope.sequence.id);
				swal('Conexiones',response.data.message,'success');
			}
			else {
				swal('Conexiones','Error al modificar la secuencia','danger');
			}
			
		}, function(reason) {
			var message = (reason && reason.data) ? reason.data.message : '';
			swal('Conexiones','Error al modificar el momento: '+message,'error');
			$scope.initEdit($scope.sequence.id);
		});
	}
	
	$scope.downSection = function(list,item) {
		var newList = [];
		for(var i=0;i<list.length;i++) {
			if(i===item) {
				newList.push(list[i+1]);
				newList.push(list[i]);
				i++;
			}
			else {
				newList.push(list[i]);
			}
		}
		$scope.moment.sections = newList;
		
		if($scope.dataJstreeType==='openMoment') {
			$scope.changesApply = true;
			$scope.moment.section_1 = JSON.stringify(newList[0]);
			$scope.moment.section_2 = JSON.stringify(newList[1]);
			$scope.moment.section_3 = JSON.stringify(newList[2]);
			$scope.moment.section_4 = JSON.stringify(newList[3]);
		}
	}
	
	$scope.upSection = function(list,item) {
		var newList = [];
		for(var i=0;i<list.length;i++) {
			if(i+1===item) {
				newList.push(list[i+1]);
				newList.push(list[i]);
				i++;
			}
			else {
				newList.push(list[i]);
			}
		}
		$scope.moment.sections = newList;
		if($scope.dataJstreeType==='openMoment') {
			$scope.changesApply = true;
			$scope.moment.section_1 = JSON.stringify(newList[0]);
			$scope.moment.section_2 = JSON.stringify(newList[1]);
			$scope.moment.section_3 = JSON.stringify(newList[2]);
			$scope.moment.section_4 = JSON.stringify(newList[3]);
		}
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
			
			$scope.changesApply = true;
			
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
			$scope.changesApply = true;
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
			$scope.changesApply = true;
			if($scope.newSplit && $scope.newSplit.length > 0) {
				if($scope.elementParentEdit[$scope.elementEdit].length > 0) {
					$scope.elementParentEdit[$scope.elementEdit] += '|';
				}
				$scope.elementParentEdit[$scope.elementEdit] += $scope.newSplit;
			}
			$scope.newSplit = '';
		}		
		$scope.onChangeInput = function() {
			$scope.changesApply = true;
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
