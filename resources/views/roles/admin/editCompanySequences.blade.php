@extends('layouts.app_side')
@section('content')
<link rel="stylesheet" href="../../../jstree/themes/default/style.min.css">
<div class="container" ng-controller="editCompanySequencesCtrl" ng-init="initEdit({{$sequence->id}})">
   <div class="content" ng-controller="contentSequencesStudentCtrl">
      <div class="row">
         <div class="col-lg-3 open" id="sidemenu-sequences"  >
            <div class="mb-3 card fade show d-none d-lg-block p-3 overflow-auto" id="sidemenu-sequences-content">
               <div id="jstree" class="fs--1" >
                  <ul>
                     <li data-jstree='{ "type":"openSequence", "opened": true, "selected": true }'>
                        Secuencia: <strong>{{$sequence->name}}</strong>
                        <ul>
                           <li ng-click="gotoSequenceSection(sect)" ng-repeat="sect in sections" 
                              data-jstree='{ "type":"openSequenceSection", "id":"@{{sect.id}}", "selected" : false, "icon": "jstree-file"}'>@{{sect.name}}</li>
                           <li data-jstree='{ "type":"openMoment", "opened" : false, "selected" : false }'>
                              Momento 1
                              <ul>
                                 <li data-jstree='{ "selected" : false, "icon": "jstree-file"}'>
                                    Pregunta central
                                    <ul>
                                       <li data-jstree='{ "selected" : false, "icon": "jstree-file"}'>Section 1</li>
                                    </ul>
                                 </li>
                                 <li data-jstree='{ "selected" : false, "icon": "jstree-file"}'>Ciencia en contexto</li>
                                 <li data-jstree='{ "selected" : false, "icon": "jstree-file"}'>Experiencia cientíﬁca</li>
                                 <li data-jstree='{ "selected" : false, "icon": "jstree-file"}'>+ Conexiones</li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
            <div ng-show="dataJstreeType === 'openSequenceSection'" class="mb-3 card fade show d-none d-lg-block p-3 height_282" id="sidemenu-tools-content">
               <h6> Herramientas</h6>
               <ul class="navbar-nav flex-column">
                  <li class="nav-item">
                     <a class="nav-link" href="#" ng-click="newElement('text')">
                        <div class="d-flex align-items-center">
                           <i class="fas fa-heading mr-3"></i>
                           Texto
                        </div>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"  ng-click="newElement('paragraph')">
                        <div class="d-flex align-items-center">
                           <i class="fas fa-align-left mr-3"></i>
                           Párrafo
                        </div>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"  ng-click="newElement('image-element')">
                        <div class="d-flex align-items-center">
                           <i class="fas fa-image mr-3"></i>
                           Imágen
                        </div>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="h-75 mb-3 fade show d-none card w-10" id="sidemenu-sequences-empty">
            </div>
            <div class="d-none d-lg-block text-sans-serif dropdown position-absolute cursor-pointer" style="top: 91px; right:7px;" ng-click="toggleSideMenu()">
               <i class="far fa-caret-square-left" id="sidemenu-sequences-button"></i>
            </div>
         </div>
         <div class="col-lg-9"  id="content-section-sequences">
            <div ng-show="errorMessage" id="errorMessage"
               class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
               <span class="col">@{{ errorMessage }}</span>
               <span class="col-auto"><a ng-click="errorMessage = null"><i class="far fa-times-circle"></i></a></span>
            </div>
            <div class="mb-3 card z-index-0">
               <div class="card-header d-flex">
                  <h5 class="">@{{sectionName}}</h5>
                  <div ng-show="dataJstreeType==='openSequence'"  class="ml-3 pt-1 conx-element" ng-click="onClickElement(sequence,'name','Nombre','text')">
                  </div>
				  <div ng-show="dataJstreeType==='openSequence'" class="ml-auto">
                     <button ng-disabled="!changesApply" class="btn btn-sm btn-outline-primary" ng-click="onSaveSequence()">Editar</button>
                  </div>
                  <div ng-show="dataJstreeType==='openSequenceSection'"  class="ml-3 pt-1 conx-element" ng-click="onClickElement(sequenceSection,'title','Título','text')">
                     <h6 type="text" class="">@{{sequenceSection.title}}</h6>
                  </div>
                  <div ng-show="dataJstreeType==='openSequenceSection'" class="ml-auto">
                     <button ng-disabled="!changesApply" class="btn btn-sm btn-outline-primary" ng-click="onSaveSequenceSection()">Editar</button>
                  </div>
               </div>
               <div  class="bg-light card-body min-card-body p-0 background-sequence-card z-index--1" w="@{{container.w}}" h="@{{container.h}}">
                  <div class="p-3 row" ng-show="dataJstreeType === 'openSequence'">
                     <div class="conx-element col-auto" ng-click="onClickElement(sequence,'url_image','Carátula','img')">
                        <img ng-src="../../../@{{sequence.url_image}}" width="79px" height="auto"/>
                     </div>
                     <div class="col-4 fs--1  conx-element" ng-click="onClickElement(sequence,'description','Descripción','textArea')">
                        @{{ sequence.description }}
                     </div>
                     <div class="col-12 fs--1 mt-3 pt-1 conx-element d-flex" ng-click="onClickElement(sequence,'keywords','Palabras clave','text-list')">
                        <h6>Palabras clave</h6>
                        &nbsp; &nbsp;  @{{ sequence.keywords }}
                     </div>
                     <div class="col-12 fs--1 mt-2 pt-1 conx-element d-flex" ng-click="onClickElement(sequence,'areas','Áreas','text-list')">
                        <h6>Áreas</h6>
                        &nbsp; &nbsp;  @{{ sequence.areas }}
                     </div>
                     <div class="col-12 fs--1 mt-2 pt-1 conx-element d-flex" ng-click="onClickElement(sequence,'themes','Temas','text-list')">
                        <h6>Temáticas</h6>
                        &nbsp; &nbsp;  @{{ sequence.themes }}
                     </div>
                     <div class="col-12 fs--1 mt-2 pt-1 conx-element d-flex" ng-click="onClickElement(sequence,'objectives','Objetivos','text-list')">
                        <h6>Objetivos</h6>
                        &nbsp; &nbsp;  @{{ sequence.objectives }}
                     </div>
                     <div class="col-12 fs--1 mt-2">
                        <button ng-hide="hidePublicateBtn || (sequence.expiration_date && sequence.expiration_date.lenght > 0)" class="btn btn-sm btn-primary" ng-click="hidePublicateBtn=true">Publicar</button>
                     </div>
                     <div ng-show="sequence.init_date.lenght || hidePublicateBtn " class="col-12 fs--1 mt-2 pt-1 conx-element d-flex" ng-click="onClickElement(sequence,'init_date','Fecha de Inicio','date')">
                        <h6>Fecha de Inicio</h6>
                        &nbsp; &nbsp;  @{{ sequence.init_date }}
                     </div>
                     <div ng-show="sequence.init_date.lenght || hidePublicateBtn " class="col-12 fs--1 mt-2 pt-1 conx-element d-flex" ng-click="onClickElement(sequence,'expiration_date','Fecha Expiración','date')">
                        <h6>Fecha Expiración</h6>
                        &nbsp; &nbsp;  @{{ sequence.expiration_date }}
                     </div>
                  </div>
                  <div ng-show="dataJstreeType === 'openSequenceSection'">
                     <div class="col-1 d-flex">
						<img ng-show="sequenceSection.background_image" id="section-background" class="background-sequence-image z-index--1" src="../../../@{{sequenceSection.background_image}}"/>
                        <button class="edit-button-background btn btn-sm btn-outline-primary" ng-click="onClickElement(sequenceSection,'background_image','Fondo','img')">Fondo</button>
                        <a class="cursor-pointer" ng-show="sequenceSection.background_image.length > 0" ng-click="deleteBackgroundSection()" style="marging-top: 8px:;">
							<i class="far fa-times-circle"></i>
                        </a>
                     </div>
                     
                     <div class="col-4 fs--1 position-absolute" ng-repeat="element in sequenceSection.elements track by $index">
						 <div ng-show="element.type==='text'" ml="@{{element.ml}}" mt="@{{element.mt}}" w="@{{element.w}}" h="@{{element.h}}" fs="@{{element.fs}}"
							class="font-text conx-element" ng-click="onClickElement(sequenceSection,element,'Texto','text-element')"
							ng-style="{'color':element.color, 'background-color': element.background_color}">
							 @{{element.text}}
							 <div class="delete-element" ng-click="deleteElement(sequenceSection,$index)">
							 <i class="far fa-times-circle"></i>
							 </div>
						 </div>	
						 <div ng-show="element.type==='paragraph'" ml="@{{element.ml}}" mt="@{{element.mt}}" w="@{{element.w}}" h="@{{element.h}}" fs="@{{element.fs}}"
							class="font-text conx-element" ng-click="onClickElement(sequenceSection,element,'Párrafo','text-area-element')"
							ng-style="{'color':element.color, 'background-color': element.background_color}">
							 @{{element.text}}	
							 <div class="delete-element" ng-click="deleteElement(sequenceSection,$index)">
								<i class="far fa-times-circle"></i>
							 </div>
						 </div>
						 <div ng-show="element.type==='image-element'" mt="@{{element.mt}}" ml="@{{element.ml}}"  
							class="font-text conx-element" ng-click="onClickElement(sequenceSection,element,'Imágen','image-element')">
							 <img src="../../../@{{element.url}}" w="@{{element.w}}" h="@{{element.h}}"/>
							 <div class="delete-element" ng-click="deleteElement(sequenceSection,$index)">
								<i class="far fa-times-circle"></i>
							 </div>
						 </div>
                     </div>							
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="edit-element-panel" ng-show="typeEdit"  >
	   <div class="modal-backdrop fade show" ng-click="typeEdit=''"></div>
	   <div class="mb-3 card">
		   <div class="card-header">
			   <div ng-click="typeEdit=''" class="position_absolute fs-2 cursor-pointer" style="top: 3px;right: 16px;text-align: right;position: absolute;"> 
				<i class="far fa-times-circle"></i> 
			   </div>
			   <h5 class="">@{{titleEdit}}</h5>
		   </div>
		   <div class="bg-light card-body">
			   <input type="text" ng-show="typeEdit === 'text'" ng-change="onChangeInput()" ng-model="elementParentEdit[elementEdit]" class="w-100"/>
			   <textarea ng-show="typeEdit === 'textArea'" ng-model="elementParentEdit[elementEdit]" class="w-100 h-100">
			   </textarea>
			   <div ng-show="typeEdit === 'img'">
				   <img ng-src="../../../@{{elementParentEdit[elementEdit]}}" width="79px" height="auto" class=""/>
				   <div class="line-separator"></div>
				   <div class="bg-light mb-3 row edit-div-folder">
					   <div ng-repeat="field in directory" class="col-12" >
						<a class="btn btn-sm btn-outline-primary" ng-click="onChangeFolderImage(field.dir)" >
						@{{field.name}}
						</a>
					   </div>
					   <div ng-repeat="field in filesImages"  class="col-4">
						<img ng-src="../../../@{{field.url_image}}" width="79px" height="auto" ng-click="onImgChange(field)"/>
					   </div>	 
				   </div>
			   </div>
			   <div ng-show="typeEdit === 'text-list'">			 
				<conx-text-list elementParent="elementParentEdit" elementChild="elementEdit"></conx-text-list>
			   </div> 
			   <div ng-show="typeEdit === 'date'">			 
				<input placeholder="día/mes/año"  type="date" data-date="" ng-change="changeFormatDate(elementParentEdit,elementEdit,'DD/MM/YYYY')" data-date-format="DD/MM/YYYY" ng-model="elementParentEdit[elementEdit]"/>
			   </div> 
			   <div ng-show="typeEdit === 'text-element' || typeEdit === 'text-area-element'">
				   <div ng-show="typeEdit === 'text-area-element'">
					<textarea ng-change="onChangeInput()" ng-show="typeEdit === 'text-area-element'" ng-model="elementEdit.text" rows="5" class="w-100 h-100">
					</textarea>
				   </div>
				   <div ng-show="typeEdit === 'text-element'">
					<input type="text"  ng-change="onChangeInput()" ng-model="elementEdit.text" class="w-100"/>
				   </div>
				   <div  class="d-flex mt-3">
					   <i class="fas fa-arrow-right mr-2"></i>
					   <input class="mr-2 col-4" type="number"  ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.ml"/>
					   <i class="fas fa-arrow-down mr-2 "></i>
					   <input class="col-4" type="number" ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.mt"/>
				   </div>
				   <div  class="d-flex mt-3">
					   <i class="fas fa-arrows-alt-h  mr-2"></i>
					   <input class="mr-2 col-4" type="number" ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.w"/>
					   <i class="fas fa-arrows-alt-v  mr-2"></i>
					   <input class="col-4" type="number"  ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.h"/>
				   </div>
				   <div class="d-flex mt-3">
					   <i class="fas fa-text-height mr-2"></i><small>Tamaño letra</small>
					   <input class="col-4 ml-2" type="number" onkeyup="onKeyupInput()"  ng-change="onChangeInput()" ng-model="elementEdit.fs"/>
				   </div>
				   <div class="d-flex mt-3">
					   <i class="fas fa-text-height mr-2"></i><small>Color</small>
					   <input class="col-4 ml-2" type="text" onkeyup="onKeyupInput()"  ng-change="onChangeInput()" ng-model="elementEdit.color"/>
				   </div>
				   <div class="d-flex mt-3">
					   <i class="fas fa-text-height mr-2"></i><small>Fondo</small>
					   <input class="col-4 ml-2" type="text" onkeyup="onKeyupInput()"  ng-change="onChangeInput()" ng-model="elementEdit.background_color"/>
				   </div>
			   </div>
			   <div ng-show="typeEdit === 'image-element'">
				   <img ng-src="../../../@{{elementEdit.url}}" width="79px" height="auto" class=""/>
				   <div class="line-separator"></div>					
				   <div  class="d-flex mt-3">
					   <i class="fas fa-arrow-right mr-2"></i>
					   <input class="mr-2 col-4" type="number" ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.ml"/>
					   <i class="fas fa-arrow-down mr-2 "></i>
					   <input class="col-4" type="number" ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.mt"/>
				   </div>
				   <div  class="d-flex mt-3">
					   <i class="fas fa-arrows-alt-h  mr-2"></i>
					   <input class="mr-2 col-4" type="number" ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.w"/>
					   <i class="fas fa-arrows-alt-v  mr-2"></i>
					   <input class="col-4" type="number" ng-keypress="onChangeInput()" ng-change="onChangeInput()" ng-model="elementEdit.h"/>
				   </div>
				   <div class="line-separator"></div>
				   <div class="bg-light mb-3 row edit-div-folder">
					   <div ng-repeat="field in directory" class="col-12" >
						<a class="btn btn-sm btn-outline-primary" ng-click="onChangeFolderImage(field.dir)" >
						@{{field.name}}
						</a>
					   </div>
					   <div ng-repeat="field in filesImages"  class="col-4">
						<img ng-src="../../../@{{field.url_image}}" width="79px" height="auto" ng-click="onImgChange(field)"/>
					   </div>	 
				   </div>
			   </div>
		   </div>
	   </div>
   </div>
</div>
@endsection
@section('js')
<script src="{{asset('/../angular/controller/editCompanySequencesCtrl.js')}}"></script>
<script src="{{asset('/../angular/controller/contentSequencesStudentCtrl.js')}}"></script>
<script src="{{asset('/../jstree/jstree.min.js')}}"></script>
@endsection