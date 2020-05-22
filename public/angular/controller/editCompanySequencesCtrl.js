MyApp.controller("editCompanySequencesCtrl", ["$scope", "$http", "$timeout", function ($scope, $http, $timeout) {
    
    $scope.errorMessage = null;
    $scope.sequence = null;
    $scope.sequenceSection = null;
    $scope.moment = null;
    $scope.momentSection = null;
    $scope.momentSectionPart = null;
    $scope.moments = [];
    $scope.momentSections = [];
    $scope.momentSectionParts = [];
    $scope.sectionsSequenceNames = [{"id":1,"name":"Situación Generadora"},{"id":2,"name":"Ruta de viaje"},{"id":3,"name":"Guía de saberes"},{"id":4,"name":"Punto de encuentro"}];
    $scope.sectionsMomentNames = [{"type":1,"name":"Pregunta Central"},{"type":2,"name":"Ciencia en contexto"},{"type":3,"name":"Experiencia científica"},{"type":4,"name":"+ Conexiones"}];
    $scope.PageName = '';
    
    $scope.dataJstree = {};
    $scope.elementParentEdit = null;
    $scope.typeEdit = null;
    $scope.container = {};
    $scope.applyChange = false;
    
    $scope.elementEdit = null;
    $scope.indexElement = null;
    
    $scope.directoryPath = null;
    $scope.widthOriginal = null;
    $scope.heightOriginal = null;
    $scope.mbDelete = null;
        
    var card = $('.background-sequence-card');
    $scope.container.h = Math.round(Number(card.css('height').replace('px','')));
    $scope.container.w = Math.round(card.css('width').replace('px',''));
    
    
    $scope.resizeWidth = function () {
        var newW = Number(card.css('width').replace('px',''));
        var deltaW = newW - $scope.container.w;
        var deltaH = Math.round(( deltaW * $scope.container.h ) / $scope.container.w);
        $scope.container.w = Math.round(card.css('width').replace('px',''));
        $scope.container.h += deltaH;
        var background = $('.background-sequence-image');
        background.css('width',$scope.container.w);
        background.css('height',$scope.container.h);
        card.css('height',$scope.container.h);
        
        if($scope.dataJstree.type==='openSequenceSectionPart') {
            $scope.sequenceSectionPart.container = $scope.container;
        }
        else if($scope.dataJstree.type==='openMomentSectionPart') {
            $scope.momentSectionPart.container = $scope.container;
        }
    }
    
    $( window ).resize(function() {
        $scope.resizeWidth();
    });
    
    $scope.resizeWidth();
    
    $scope.onChangeHeight = function() {
        
        var minH = Number(card.css('min-height').replace('px',''));
        if($scope.container.h < minH ) {
            $scope.container.h = minH; 
            return;
        }
        
        card.css('height',$scope.container.h);
        var background = $('.background-sequence-image');
        background.css('width',$scope.container.w);
        background.css('height',$scope.container.h);
        
        if($scope.dataJstree.type==='openSequenceSectionPart') {
            $scope.sequenceSectionPart.container = $scope.container;
        }
        else if($scope.dataJstree.type==='openMomentSectionPart') {
            $scope.momentSectionPart.container = $scope.container;
        }
        $scope.applyChange = true;
    }
    
    $scope.toggleSideMenu = function() {
        if( $('#sidemenu-sequences-button').hasClass('fa-caret-square-left')) {
            hiddenSideMenu();
        }
        else if( $('#sidemenu-sequences-button').hasClass('fa-caret-square-right')) {
            showSideMenu();
        }        
        $scope.resizeSequenceCard();
        $scope.resizeWidth();
    };

    function findById(list,id){
        for(var i=0;i<list.length;i++) {
            if(list[i].id === Number(id)) {
                return list[i];
            }
        }
        return false;
    }
    
    function findSectionSequenceEmpty(sequence) {
        var section = null;
        var list = Object.assign([], $scope.sectionsSequenceNames);
        
        for(var i=0;i<4;i++) {
            section = sequence['section_'+(i+1)];
            if(section && JSON.parse(section).section && JSON.parse(section).section.id) {
                for(var j=0;j<list.length;j++) {
                    if(list[j].id === JSON.parse(section).section.id) {                            
                        list.splice(j,1);
                    }
                }
            }
        }
        return list[0];
    }
        
    function findMoment(order) {
        var  moment = null;
        for(var i=0;i<$scope.moments.length;i++) {
            if(Number($scope.moments[i].order) === Number(order)) {
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
    
    function findSectionMomentEmpty(moment) {
        var section = null;
        var list = Object.assign([], $scope.sectionsMomentNames);
        
        for(var i=0;i<4;i++) {
            section = moment['section_'+(i+1)];
            if(section && JSON.parse(section).section && JSON.parse(section).section.type) {
                for(var j=0;j<list.length;j++) {
                    if(list[j].type === JSON.parse(section).section.type) {                            
                        list.splice(j,1);
                    }
                }
                
            }
        }
        return list[0];
    }
    
    function InitializeJstree() {
      
      $('#sidemenu-sequences-content').remove();
      $scope.typeEdit = $scope.indexElement = null;
      
      $newDiv = $('#sidemenu-sequences-content-temp').clone().prependTo('#sidemenu-sequences');
      $newDiv.addClass('d-lg-block');
      $newDiv.find('#jstree').attr('id','jstreetemp');
      $newDiv.attr('id','sidemenu-sequences-content');
      $('#jstreetemp').on('select_node.jstree', function (evt, data) {
          
        if($scope.applyChange) {
            $scope.openChangeAlert();
            return;
        }  
          
        $scope.dataJstree = JSON.parse($('#'+data.selected).attr('data-jstree'));
        $scope.sequenceSection = $scope.sequenceSectionPart = $scope.moment = $scope.momentSection = $scope.momentSectionPart = $scope.momentSections = $scope.momentSectionParts = null;
        
        
        switch($scope.dataJstree.type) {
        case 'openSequence': 
            $scope.PageName = 'Guía de Aprendizaje';
            $scope.elementParentEdit = $scope.sequence;
            $('#sidemenu-sequences .overflow-auto').addClass('height_337').removeClass('height_235');
        break;
        case 'openSequenceSection':
        case 'openSequenceSectionPart':
            $scope.sequenceSection = JSON.parse($scope.sequence[$scope.dataJstree.sequenceSectionIndex]);
            $scope.sequenceSection.sequenceSectionIndex = $scope.dataJstree.sequenceSectionIndex;
            $scope.sequenceSection.sequenceSectionPartIndex = $scope.dataJstree.partId;
            $scope.sequenceSection[$scope.sequenceSection.sequenceSectionPartIndex] = $scope.sequenceSection[$scope.sequenceSection.sequenceSectionPartIndex] || {};
            $scope.sequenceSectionPart = $scope.sequenceSection[$scope.sequenceSection.sequenceSectionPartIndex];
            $scope.PageName = $scope.sequenceSection.section.name;
            $scope.elementParentEdit = $scope.sequenceSectionPart;
            $scope.container = $scope.sequenceSectionPart.container || { "w" : $scope.container.w, "h" : 385 };
            $('#sidemenu-sequences .overflow-auto').addClass('height_235').removeClass('height_337');
            
            if($scope.dataJstree.type==='openSequenceSection') {
                var section = $('#' + data.selected[0]);
                data.instance.open_node(section);
                data.instance.deselect_all(true);
                data.instance.select_node($(section.find('.jstree-children li'))[0]);
            }
            
            $scope.resizeWidth();
        break;
        case 'openMoment':
            $scope.moment = findMoment($scope.dataJstree.momentIndex);
            $scope.PageName = 'Momento ' + $scope.moment.order;
            $scope.elementParentEdit = $scope.moment;
            $('#sidemenu-sequences .overflow-auto').addClass('height_337').removeClass('height_235');
            var section = $('#' + data.selected[0]);
            data.instance.toggle_node(section);
        break;
        case 'openSectionMoment':
        case 'openMomentSectionPart': 
            $scope.moment = findMoment($scope.dataJstree.momentIndex);
            $scope.momentSection = $scope.moment.sections[Number($scope.dataJstree.momentSectionIndex)];
            
            $scope.PageName = $scope.momentSection.section.name;
            
            if($scope.dataJstree.type==='openSectionMoment') {
                var section = $('#' + data.selected[0]);
                data.instance.open_node(section);
                data.instance.deselect_all(true);
                data.instance.select_node($(section.find('.jstree-children li'))[0]);
            }
            
            $scope.dataJstree.type = 'openMomentSectionPart';
            
            $scope.momentSectionPart = $scope.momentSection[$scope.dataJstree.momentSectionPartIndex];
            $scope.momentSectionPart.momentSectionPartIndex = $scope.dataJstree.momentSectionPartIndex;
            $scope.elementParentEdit = $scope.momentSectionPart;
            
            $scope.container = $scope.momentSectionPart.container || { "w" : $scope.container.w, "h" : 385 };
            $scope.resizeWidth();
            
            $('#sidemenu-sequences .overflow-auto').addClass('height_235').removeClass('height_337');
        break;
        }
        
        $scope.$apply();
        $scope.resizeSequenceCard();
      }).jstree({
          "core" : {
            "multiple" : false,
            "animation" : 0
          }
      });
      
    }
    
    $scope.initSequence = function(sequence_id) {
        loadSequence(sequence_id);
        $scope.PageName = 'Secuencia';
        $scope.dataJstree.type = 'openSequence';
        $scope.elementParentEdit = $scope.sequence;
    }
    
    function loadSequence(sequence_id) {
        
        $http.get('/get_sequence/'+sequence_id)
        .then(function (response) {
            
            $scope.sequence = response.data[0];
            
            if(!$scope.sequence['section_1'])  $scope.sequence['section_1'] = angular.toJson({"section":findSectionSequenceEmpty($scope.sequence)});
            if(!$scope.sequence['section_2'])  $scope.sequence['section_2'] = angular.toJson({"section":findSectionSequenceEmpty($scope.sequence)});
            if(!$scope.sequence['section_3'])  $scope.sequence['section_3'] = angular.toJson({"section":findSectionSequenceEmpty($scope.sequence)});
            if(!$scope.sequence['section_4'])  $scope.sequence['section_4'] = angular.toJson({"section":findSectionSequenceEmpty($scope.sequence)});
            
            $scope.moments = $scope.sequence.moments;
            var moment = section1 = section2 = section3 = section4 = null;
            var partsDefault = {'part_1':{},'part_2':{},'part_3':{},'part_4':{}};
            for(var i=0;i<$scope.moments.length;i++) {
                moment = $scope.moments[i];
                section1 = JSON.parse(moment['section_1']);
                if(!section1){
                    section1 = Object.assign({ "section": findSectionMomentEmpty(moment)},Object.assign({},partsDefault));
                    moment.section_1 = angular.toJson(section1);
                }
                section1 = Object.assign(section1,{'momentSectionIndex':'0'});
                
                section2 = JSON.parse(moment['section_2']);
                if(!section2){ 
                    section2 = Object.assign({ "section": findSectionMomentEmpty(moment)},Object.assign({},partsDefault));
                    moment.section_2 = angular.toJson(section2);
                }
                section2 = Object.assign(section2,{'momentSectionIndex':'1'});
                
                section3 = JSON.parse(moment['section_3']);
                if(!section3){
                    section3 = Object.assign({ "section": findSectionMomentEmpty(moment)},Object.assign({},partsDefault));
                    moment.section_3 = angular.toJson(section3);
                }
                section3 = Object.assign(section3,{'momentSectionIndex':'2'});
                
                section4 = JSON.parse(moment['section_4']);
                if(!section4){ 
                    section4 = Object.assign({ "section": findSectionMomentEmpty(moment)},Object.assign({},partsDefault));
                    moment.section_4 = angular.toJson(section4);
                }
                section4 = Object.assign(section4,{'momentSectionIndex':'3'});
                moment.sections = [section1,section2,section3,section4];
            }
            
            $timeout(function() {
                InitializeJstree();
            },500);
        });
    };    
    
    $scope.deleteBackgroundSection = function (){
        
        if($scope.dataJstree.type==='openSequenceSectionPart') {
            $scope.sequenceSectionPart.background_image = '';
        }
        else if($scope.dataJstree.type==='openMomentSectionPart') {
            $scope.momentSectionPart.background_image = '';
        }
        
        $scope.applyChange = true;
    }
    
    $scope.onClickElement = function(parent,element,title,type) {
        if($scope.mbDelete) {
            $scope.mbDelete = false;
            return;
        }
        $scope.typeEdit = type;
        $scope.elementParentEdit = parent;
        $scope.elementEdit =  element;
        $scope.mbImageShow = false;
        
        if($scope.typeEdit === 'image-element' || $scope.typeEdit === 'video-element') {
            element.bindWidthHeight = element.bindWidthHeight || true;
            $scope.bindWidthHeight = element.bindWidthHeight;
            $scope.widthOriginal = element.w;
            $scope.heightOriginal = element.h;
        }
        else {
            $scope.bindWidthHeight = false;
        }
        
        $scope.titleEdit = title;        
        if($scope.typeEdit === 'img') {
            var dir = $scope.elementParentEdit[$scope.elementEdit] || 'images/sequences/sequence'+$scope.sequence.id+'/.';
            dir = getLastPath(dir);
            $scope.onChangeFolderImage(dir);
        }
        else if($scope.typeEdit === 'image-element') {
            var dir = $scope.elementEdit.url_image || 'images/sequences/sequence'+$scope.sequence.id+'/.';
            dir = getLastPath(dir);
            $scope.onChangeFolderImage(dir);
        }
    }
    
    $scope.onClickElementWithDelete = function(parent,element,$index) {
        $scope.indexElement = $index;
        var title = ( element.type==='text-element' ) ? 'Texto' : 
                    ( element.type==='text-area-element' ) ? 'Párrafo' : 
                    ( element.type==='image-element' ) ? 'Imágen' : 
                    ( element.type==='video-element' ) ? 'Video' : 
                    ( element.type==='button-element' ) ? 'Botón' : ''
        $scope.onClickElement(parent,element,title,element.type);
    }
    
    $scope.changeFormatDate = function(elementParentEdit,elementEdit,format) {
         try { 
             $scope.elementParentEdit[elementEdit] = moment($scope.elementParentEdit[elementEdit],"YYYY-MM-DD").format(format);
             $scope.applyChange = true;
         } catch(e){}
    }
    
    $scope.onImgChange = function(field) {
        $scope.applyChange = true;
        
        if(typeof $scope.elementEdit === 'object') {
            var image = new Image();
            var refSplit = window.location.href.split('/');
            image.src = refSplit[0]+'//'+refSplit[2]+'/'+field.url_image;
            image.onload = function() {
                $scope.elementEdit.url_image = field.url_image;
                $scope.elementEdit.w = this.width;
                $scope.elementEdit.h = this.height;
                $scope.widthOriginal = $scope.elementEdit.w;
                $scope.heightOriginal = $scope.elementEdit.h;
                $scope.bindWidthHeight = true;
                $scope.elementEdit.bindWidthHeight = $scope.bindWidthHeight;
                
                $scope.$apply();
            };
        }
        else {
            if($scope.dataJstree.type==='openSequenceSectionPart') {
                $scope.elementParentEdit[$scope.elementEdit] = field.url_image;
                $scope.sequence[$scope.sequenceSectionIndex] = angular.toJson($scope.elementParentEdit);
            }
            else {
                $scope.elementParentEdit[$scope.elementEdit] = field.url_image;
            }
            
        }
        
        
        $timeout(function() {                
            $scope.resizeSequenceCard();
        },1000);
    } 

    $scope.onChangeFolderImage = function(directoryPath) {        
        $scope.directoryPath = null;
        $http.post('/conexiones/admin/get_folder_image',{'dir':directoryPath}).then(function (response) {
            var list = response.data.scanned_directory;
            $scope.directoryPath = response.data.directory;
            $scope.directory = [];
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
            $scope.errorMessage = angular.toJson(e);
        }*/    
    }

    $scope.newElement = function(typeItem) {
        $scope.applyChange = true;
        
        var id = moment().format('YYYYMMDDHHmmssSSS');
        
        var parentElement = $scope.dataJstree.type==='openMomentSectionPart' ? $scope.momentSectionPart : $scope.elementParentEdit;
        if(typeItem==='text-element') {
            parentElement.elements = parentElement.elements || [];
            parentElement.elements.push({'id':id,'type':typeItem,'fs':11,'ml':10,'mt':76,'w':100,'h':26,'text':'--texto de guía--'});
        }
        else if(typeItem==='text-area-element') {
            parentElement.elements = parentElement.elements || [];
            parentElement.elements.push({'id':id,'type':typeItem,'fs':11,'ml':100,'mt':76,'w':100,'h':200,'text':'--Parrafo 1--'});            
        }
        else if(typeItem==='image-element') {
            parentElement.elements = parentElement.elements || [];
            parentElement.elements.push({'id':id,'type':typeItem,'url_image':'images/icons/NoImageAvailable.jpeg','w':135,'h':115,'ml':150,'mt':76});            
        }
        else if(typeItem==='video-element') {
            parentElement.elements = parentElement.elements || [];
            parentElement.elements.push({'id':id,'type':typeItem,'url_vimeo':'https://player.vimeo.com/video/286898202','w':210,'h':151,'ml':260,'mt':170});            
        }
        else if(typeItem==='button-element') {
            parentElement.elements = parentElement.elements || [];
            parentElement.elements.push({'id':id,'type':typeItem,'fs':11,'ml':210,'mt':176,'w':130,'h':26,'text':'','class':'btn-sm btn-primary'});
        }
        $timeout(function() {
            $scope.resizeSequenceCard();
        },10);
        
    }

    $scope.deleteElement  = function(parentElement,$index,mbDelete) {
        if($index || $index === 0)  {
            $scope.mbDelete = mbDelete;
            $scope.elementEdit = null;
            $scope.indexElement = null;
            $scope.typeEdit = '';
            $scope.applyChange = true;
            if(parentElement && parentElement.elements ) {
                var newElements = [];
                for(var i=0; i<parentElement.elements.length; i++) {
                    if(i!== $index)
                    newElements.push(Object.assign({},parentElement.elements[i]));
                }
                //parentElement.elements = newElements;
            }
            parentElement.elements = [];
            parentElement.elements = newElements;
            //.splice($index,1);
            
            $timeout(function() {
               $scope.resizeSequenceCard();
               $scope.resizeWidth();
            },500);
        }
        else {
            if(parentElement.background_image) {
                $scope.deleteBackgroundSection();
            }
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
        $http.post('/update_sequence/',$scope.sequence)
        .then(function (response) {
            if(response && response.status===200) {
                $scope.applyChange = false;
                swal('Conexiones',response.data.message,'success');
                loadSequence($scope.sequence.id);
            }
            else {
                swal('Conexiones','Error al modificar la secuencia','danger');
            }
        });
        //.error(function(reason) {
        //    swal('Conexiones','Error al modificar la secuencia','danger');
        //});
    }
    
    $scope.onSaveSequenceSection = function () {
        
        var sectionNumber = Number($scope.sequenceSection.sequenceSectionIndex.replace('section_',''));
        var data = {
            'id': $scope.sequence.id,
            'section_number': sectionNumber,
            'data_section': JSON.stringify($scope.sequenceSection)
        };
        
        $http.post('/update_sequence_section/',data)
        .then(function (response) {
            if(response && response.status===200) {
                $scope.applyChange = false;
                swal('Conexiones',response.data.message,'success');
                loadSequence($scope.sequence.id);
            }
            else {
                swal('Conexiones','Error al modificar la sección de la secuencia','error');
            }
            loadSequence($scope.sequence.id);
        },function(reason) {
            var message = (reason && reason.data) ? reason.data.message : '';
            swal('Conexiones','Error al modificar la secuencia: '+message,'error');
            loadSequence($scope.sequence.id);
        });
    }
    
    $scope.onSaveMoment = function () {
        $http.post('/update_moment/',$scope.moment)
        .then(function (response) {
            if(response && response.status===200) {
                $scope.applyChange = false;
                loadSequence($scope.sequence.id);
                swal('Conexiones',response.data.message,'success');
            }
            else {
                swal('Conexiones','Error al modificar la secuencia','danger');
            }
            
        }, function(reason) {
            var message = (reason && reason.data) ? reason.data.message : '';
            swal('Conexiones','Error al modificar el momento: '+message,'error');
            loadSequence($scope.sequence.id);
        });
    }

    $scope.onSaveMomentSectionPart = function () {
        
        //var sectionNumber = Number($scope.momentSectionPart.momentSectionPartIndex.replace('part_',''));
        var sectionNumber = Number($scope.momentSection.momentSectionIndex) + 1;
        
        var data = {
            'id': $scope.moment.id,
            'section_number': sectionNumber,
            'data_section': angular.toJson($scope.momentSection)
        };
        
        $http.post('/update_moment_section/',data)
        .then(function (response) {
            if(response && response.status===200) {
                $scope.applyChange = false;
                loadSequence($scope.sequence.id);
                swal('Conexiones',response.data.message,'success');
            }
            else {
                swal('Conexiones','Error al modificar la seccíón del momento','danger');
            }
            
        }, function(reason) {
            var message = (reason && reason.data) ? reason.data.message : '';
            swal('Conexiones','Error al modificar la seccion de momento: '+message,'error');
            loadSequence($scope.sequence.id);
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
        
        if($scope.dataJstree.type==='openMoment') {
            $scope.applyChange = true;
            $scope.moment.section_1 = angular.toJson(newList[0]);
            $scope.moment.section_2 = angular.toJson(newList[1]);
            $scope.moment.section_3 = angular.toJson(newList[2]);
            $scope.moment.section_4 = angular.toJson(newList[3]);
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
        if($scope.dataJstree.type==='openMoment') {
            $scope.applyChange = true;
            $scope.moment.section_1 = angular.toJson(newList[0]);
            $scope.moment.section_2 = angular.toJson(newList[1]);
            $scope.moment.section_3 = angular.toJson(newList[2]);
            $scope.moment.section_4 = angular.toJson(newList[3]);
        }
    }
    
    $scope.openChangeAlert = function(){
        swal({ text: "Debe guardar cambios para continuar",
          showConfirmButton: false,showCancelButton: false,
          dangerMode: false,
        }).catch(swal.noop);
    }
    
    $scope.resizeSequenceCard = function () {
        var card = $('.background-sequence-card');
        
        var w = Number(card.attr('w'));
        var h = Number(card.attr('h'));
        var newW = Number(card.css('width').replace('px',''));
        var newH = Number(card.css('height').replace('px',''));
        
        var deltaW = newW - w;
        var deltaH = Math.round(( deltaW * h ) / w);
        
        var background = $('.background-sequence-image');
            background.css('width',newW);
            background.css('height', + (h + deltaH));
            card.css('height', + (h + deltaH));
        
        if($scope.elementParentEdit && $scope.elementParentEdit.elements) {
            var element = null;
            var card = $('.background-sequence-card');
            var w = Number(card.attr('w'));
            var h = Number(card.attr('h'));
            var newW = Number(card.css('width').replace('px',''));
            var newH = Number(card.css('height').replace('px',''));

            var deltaW = newW - w;
            var deltaH = newH - h;

            var percentW =  deltaW / w;
            var percentH =  deltaH / h;

            for(var i=9999990;i<$scope.elementParentEdit.elements.length;i++) {
                element = $scope.elementParentEdit.elements[i];
                var jsElement = $('#'+element.id);
                
                
                if(element.w) {
                    var newObjH = element.h + (  element.h * percentH  );
                    var newObjW = element.w + (  element.w * percentW  );
                    $(jsElement).addClass('position-absolute');
                    $(jsElement).css('width',newObjW+'px');
                    $(jsElement).css('height',newObjH+'px');
                    
                    element.w = newObjW;
                    element.h = newObjH;
                
                }
                if(element.ml) {
                    var newObjMl = element.ml + (  element.ml * percentW  );
                    
                    
                    if( element.type === 'video-element' || element.type === 'image-element') {
                        $(jsElement).parent().css('margin-left',newObjMl+'px');
                        $(jsElement).parent().addClass('position-absolute');
                    }
                    else {
                        $(jsElement).css('margin-left',newObjMl+'px');
                        $(jsElement).addClass('position-absolute');
                    }
                    element.ml = newObjMl;
                }
                if(element.mt) {
                    var newObjMt = element.mt + (  element.mt * percentH  );
                    var jsElement = $('#'+element.id+'-'+element.type);
                    
                    if( element.type === 'video-element' || element.type === 'image-element') {
                        $(jsElement).parent().css('margin-top',newObjMt+'px');
                        $(jsElement).parent().addClass('position-absolute');
                    }
                    else {
                        $(jsElement).css('margin-top',newObjMt+'px');
                        $(jsElement).addClass('position-absolute');
                    }
                    element.mt = newObjMt;
                }
            }
        }

        $(card).find('[fs]').each(function(value,key){
            var fs = $(this).attr('fs');
            var newFs = fs;//( fs * newW / w);
            $(this).css('font-size',newFs+'px');
        });
        
        $(card).find('[w]').each(function(value,key){
            var objW = Number($(this).attr('w'));
            $(this).css('width',objW+'px');
            $(this).addClass('position-absolute');
        });
        
        $(card).find('[h]').each(function(value,key){
            var objH = Number($(this).attr('h'));
            $(this).css('height',objH+'px');
            $(this).addClass('position-absolute');
        });
        
        $(card).find('[mt]').each(function(value,key){
            var objMt = Number($(this).attr('mt'));
            $(this).css('margin-top',objMt+'px');
            $(this).addClass('position-absolute');
        });
        
        $(card).find('[ml]').each(function(value,key){
            var objMl = Number($(this).attr('ml'));
            $(this).css('margin-left',objMl+'px');
            $(this).addClass('position-absolute');
        });
        
        $('.d-none-result').removeClass('d-none');
    }

    
}]);

MyApp.directive('conxTextList', function() {
  return {
    restrict: 'E',
    template: '<div ng-show="elementParentEdit && elementParentEdit[elementEdit].length > 0" ng-repeat="split in elementParentEdit[elementEdit].split(\'|\') track by $index"> ' +
    '<input ng-change="onChangeSplit($index,split)" ng-model="split" class="mt-1 fs--1"/>  ' +
    '<a ng-click="delete($index)" style="marging-top: 8px:;"><i class="far fa-times-circle"></i><a/> </div> ' +
    '<input class="mt-1 w-75 fs--1" type="text" ng-model="newSplit"/> <a class="cursor-pointer" ng-click="onNewSplit()"> <i class="fas fa-plus"></i><a/>',
    controller: function ($scope,$timeout) {
        $scope.delete = function($index) {
            
            $scope.applyChange = true;
            
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
            $scope.applyChange = true;
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
            $scope.applyChange = true;
            if($scope.newSplit && $scope.newSplit.length > 0) {
                if($scope.elementParentEdit[$scope.elementEdit].length > 0) {
                    $scope.elementParentEdit[$scope.elementEdit] += '|';
                }
                $scope.elementParentEdit[$scope.elementEdit] += $scope.newSplit;
            }
            $scope.newSplit = '';
        }     
        $scope.onChangeInput = function() {
            $scope.applyChange = true;
            if($scope.dataJstree.type==='openSequenceSectionPart') {                
                $scope.sequence[$scope.sequenceSectionIndex] = angular.toJson($scope.sequenceSection);                
            }    
            $timeout(function() {                
                $scope.resizeSequenceCard();
            },10);
        }
        $scope.onChangeWidthHeight = function(elementEdit,type){
            if($scope.bindWidthHeight) {
                if(type === 'w') {
                    var deltaW = elementEdit.w - $scope.widthOriginal;
                    var deltaH = Math.round(deltaW * $scope.heightOriginal / $scope.widthOriginal);
                    elementEdit.h += deltaH;
                }
                else if(type === 'h') {
                    var deltaH = elementEdit.h - $scope.heightOriginal;
                    var deltaW = Math.round(deltaH * $scope.widthOriginal / $scope.heightOriginal);
                    elementEdit.w += deltaW;
                }
            }
            $scope.widthOriginal = elementEdit.w;
            $scope.heightOriginal = elementEdit.h;
                
            $scope.applyChange = true;
            
            $timeout(function() {           
                $scope.resizeSequenceCard();
            },10);
            
        }
    }
  };
});

MyApp.directive('conxSlideImages', function() {
    return {
      restrict: 'E',
      template: '<div ng-show="elementParentEdit && elementParentEdit[elementEdit].length > 0" ng-repeat="split in elementParentEdit[elementEdit].split(\'|\') track by $index"> ' +
      '<input ng-change="onChangeSplit($index,split)" ng-model="split" class="mt-1 fs--1"/>  ' +
      '<a ng-click="delete($index)" style="marging-top: 8px:;"><i class="far fa-times-circle"></i><a/> </div> ' +
      '<input class="mt-1 h-75 fs--1" type="text" ng-model="newSplit"/> <a class="cursor-pointer" ng-click="onNewSplit()"> <i class="fas fa-plus"></i><a/>',
      controller: function ($scope,$timeout) {
          $scope.delete = function($index) {
              
              $scope.applyChange = true;
              
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
              $scope.applyChange = true;
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
              $scope.applyChange = true;
              if($scope.newSplit && $scope.newSplit.length > 0) {
                  if($scope.elementParentEdit[$scope.elementEdit].length > 0) {
                      $scope.elementParentEdit[$scope.elementEdit] += '|';
                  }
                  $scope.elementParentEdit[$scope.elementEdit] += $scope.newSplit;
              }
              $scope.newSplit = '';
          }     
          $scope.onChangeInput = function() {
              $scope.applyChange = true;
              if($scope.dataJstree.type==='openSequenceSectionPart') {                
                  $scope.sequence[$scope.sequenceSectionIndex] = angular.toJson($scope.sequenceSection);                
              }    
              $timeout(function() {                
                  $scope.resizeSequenceCard();
              },10);
          }
          $scope.onChangeWidthHeight = function(elementEdit,type){
              if($scope.bindWidthHeight) {
                  if(type === 'w') {
                      var deltaW = elementEdit.w - $scope.widthOriginal;
                      var deltaH = Math.round(deltaW * $scope.heightOriginal / $scope.widthOriginal);
                      elementEdit.h += deltaH;
                  }
                  else if(type === 'h') {
                      var deltaH = elementEdit.h - $scope.heightOriginal;
                      var deltaW = Math.round(deltaH * $scope.widthOriginal / $scope.heightOriginal);
                      elementEdit.w += deltaW;
                  }
              }
              $scope.widthOriginal = elementEdit.w;
              $scope.heightOriginal = elementEdit.h;
                  
              $scope.applyChange = true;
              
              $timeout(function() {           
                  $scope.resizeSequenceCard();
              },10);
              
          }
      }
    };
  });

//JASCRIPT JQUERY METHODS
//TOOGLE MENU
var hiddenSideMenu = function() {
    $('#sidemenu-sequences-button').removeClass('fa-caret-square-left');
    $('#sidemenu-sequences-button').addClass('fa-caret-square-right');
    $('#sidemenu-sequences-empty').addClass('show');
    $('#sidemenu-sequences-empty').removeClass('d-none');
    $('#sidemenu-sequences-content').addClass('d-none');
    $('#sidemenu-sequences-content').removeClass("show");
    $('#sidemenu-sequences-content').removeClass("d-lg-block");
    $('#sidemenu-tools-content').addClass('d-none');
    $('#sidemenu-tools-content').removeClass("show");
    $('#sidemenu-tools-content').removeClass("d-lg-block");
    $('#sidemenu-sequences').addClass("col-lg-0_5");
    $('#sidemenu-sequences').removeClass("col-lg-3");
    $('#content-section-sequences').removeClass("col-lg-9");
    $('#content-section-sequences').addClass("col-lg-11_5");
};

var showSideMenu = function() {
    $('#sidemenu-sequences-empty').removeClass('show');
    $('#sidemenu-sequences-empty').addClass('d-none');
    
    $('#sidemenu-sequences-content').removeClass('d-none');
    $('#sidemenu-sequences-content').addClass("show");
    $('#sidemenu-sequences-content').addClass("d-lg-block");
    
    $('#sidemenu-tools-content').removeClass('d-none');
    $('#sidemenu-tools-content').addClass("show");
    $('#sidemenu-tools-content').addClass("d-lg-block");
    
    $('#sidemenu-sequences-button').addClass('fa-caret-square-left');
    $('#sidemenu-sequences-button').removeClass('fa-caret-square-right');
    
    $('#sidemenu-sequences-hidden-side').removeClass("d-none");
    $('#sidemenu-sequences-content').removeClass("d-none");
    $('#sidemenu-sequences-empty').addClass("d-none");
    
    $('#sidemenu-tools-content').addClass("show");
    $('#sidemenu-tools-content').removeClass("d-none");
    
    $('#sidemenu-sequences').removeClass("col-lg-0_5");
    $('#sidemenu-sequences').addClass("col-lg-3");
    
    $('#content-section-sequences').addClass("col-lg-9");
    $('#content-section-sequences').removeClass("col-lg-11_5");
}

