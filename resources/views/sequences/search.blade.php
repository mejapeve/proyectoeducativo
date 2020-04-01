@extends('layouts.app')
@section('content')
<div ng-controller="sequencesSearchCtrl" ng-init="init(1)">
   
   <div ng-show="errorMessageFilter"
        id="errorMessageFilter" 
        class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
         <span class="col">@{{ errorMessageFilter }}</span>
         <span class="col-auto"><a ng-click="errorMessageFilter = null"><i class="far fa-times-circle"></a></i></span>
   </div>

   <div class="mb-3 card">
      <div class="card-body">
         <div class="no-gutters row">
            <div class="mb-3 col-12">
               <div class="justify-content-center justify-content-sm-between row">
                  <div class="text-center col-sm-auto boder-header p-2 ml-3">
                     <h5 class="d-inline-block">Guías de aprendizaje</h5>
                  </div>
                  <div class="d-none-result d-none d-flex flex-center mt-1 mt-sm-0 col-sm-auto d-none-result d-none">
                     <input ng-change="onSeachChange()" placeholder="Palabra clave..." aria-label="Search" 
                        type="search" ng-model="searchText" name="searchText" id="searchText"
                        ng-keyup="complete($event, searchText)"
                        ng-blur = "fillTextbox($event,searchText)"
                        class="fs-lg--1 fs-md--1 mr-2 rounded-pill search-input form-control">
      
                     <div ng-show="wordList.length > 0" tabindex="-1" role="menu" aria-hidden="false" 
                     class="d-none-result d-none dropdown-menu-card dropdown-menu dropdown-menu-left show" style="left: 28px;">
                        <div class="modal-menu shadow-none card py-2" style="max-width: 20rem;">
                                 <a href="#!" tabindex="0" role="menuitem" 
                                 id="keywordlist"
                                 class="dropdown-item fs-lg--1 fs-md--1" 
                                 ng-if = "$index < 10"
                                 ng-repeat="keyword in wordList">@{{keyword}}</a>
                           </div>
                        </div>
                     <select ng-change="onThemeChange()" ng-model="themeName" class="custom-select custom-select-sm fs-lg--1 fs-md--1">
                        <option value="">Tema</option>
                        <option value="@{{theme}}" ng-repeat="theme in themesList">@{{theme}}</option>
                     </select>
                     <select ng-change="onAreaChange()" ng-model="areaName" class="ml-2 custom-select custom-select-sm fs-lg--1 fs-md--1">
                        <option value="">Área</option>
                        <option class=" " value="@{{area}}" ng-repeat="area in areas">@{{area}}</option>
                     </select>
                  </div>
               </div>
            </div>
			<div class="pr-lg-2 col-lg-12">
				<p>Todas las <strong>guías de aprendizaje</strong> que hacen parte de <strong>Conexiones</strong>, usan como metáfora &nbsp;para estructurar sus contenidos la idea de viaje, como una invitación &nbsp;para explorar, conocer y comprender a través de la indagación el mundo natural del que hacemos parte . Así, cada <strong>guía de aprendizaje</strong>&nbsp; está compuesta por una <strong>situación generadora</strong> o punto de partida, un <strong>mapa de ruta</strong> flexible, un entramado <strong>saberes </strong>a desarrollar y un <strong>punto de encuentro</strong> o propósito que integra un conjunto amplio de recursos didácticos orientados al desarrollo de pensamiento científico. Cada <strong>guía de aprendizaje</strong> propone una ruta de <strong>ocho momentos </strong>&nbsp;o estaciones que se componen &nbsp;a su vez de preguntas, experiencias científicas, explicaciones en contexto y enlaces sugeridos para + conexiones. <strong>(Ver + haciendo clic en cada ícono)</strong></p>
				
				<ul class="nav row fs--1 text-align mt-1">
				<li class="ml-auto" style="width:87px;"><img src="{{asset('images/icons/situacionGeneradora.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Situación generadora </span></li>
				<li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:87px;"><img src="{{asset('images/icons/rutaViaje.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Ruta de viaje </span></li>
				<li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:87px;"><img src="{{asset('images/icons/puntoEncuentro.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Punto de encuentro </span></li>
				<li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:87px;"><img src="{{asset('images/icons/GuiaSaberes.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Guía de saberes </span></li>
				<li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:87px;"><img src="{{asset('images/icons/pCentral.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Pregunta Central </span></li>
				<li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:87px;"><img src="{{asset('images/icons/iconoExperiencia.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Experiencia Científica </span></li>
				<li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:87px;"><img src="{{asset('images/icons/cienciaCotidiana.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Ciencia cotidiana </span></li>
				<li class="mr-auto" style="width:87px;"><img src="{{asset('images/icons/masConexiones.png')}}" width="60px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> + Conexiones </span></li>
				</ul>
				
			</div>
            <div class="d-none-result d-none row w-100">
               <div class=" col-lg-6 col-md-6" ng-repeat="sequence in sequences | filter: searchText" style="border: 10px solid white;">
                  <div class="card card-body bg-dark text-center p-2 row" style="height: 325px">
                     <div class="col-6 row">
                        <img ng-src="@{{sequence.url_image}}" width="162px" height="162px" class="col-12 p-0 sequence-imagen"/> 
                     </div>
                     <div class="p-3 col-6 sequence-description ml-2 text-justify fs--1 flex-100" id="sequence-description-@{{sequence.id}}">
                        <h5 class="pl-3 boder-header"> <span class="ml-2">@{{sequence.name}} </span></h5>  
                        <p class="mt-4 ml-2"> @{{sequence.description}}</p>
						<div class="position-absolute fs--2" style="bottom: 11px;">
						<a class="btn btn-outline-primary" ng-href="/guia_de_aprendizaje/@{{sequence.id}}/@{{sequence.name.replace(' ','_')}}">Detalle</a>
                        <a class="ml-2 btn btn-outline-primary" href="#" class="col-auto">Comprar</a>
						</div>
                     </div>
                  </div>
               </div>
            </div>
            
               <div class="p-3 border-lg-y col-lg-2 w-100" style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-hide="sequences.length > 0">
                  cargando...
               </div>
            
         </div>
      </div>
   </div>
</div>

<script src="{{ asset('/../angular/controller/sequencesSearchCtrl.js') }}" defer></script>

<style type="text/css">
   .list-group-item:hover{
      color: #337ab7;
      text-shadow:  0 0 1em #337ab7;
      cursor: pointer;
   }
</style>
@endsection
