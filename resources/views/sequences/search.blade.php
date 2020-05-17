@extends('layouts.app_side')
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
               </div>
            </div>
            <div class="pr-lg-2 col-lg-12 text-justify">
               <br>Todas las <strong>guías de aprendizaje</strong> que hacen parte de <strong>Conexiones</strong>, usan como metáfora para estructurar sus contenidos la idea de viaje, como una invitación para explorar, conocer y comprender a través de la indagación el mundo natural del que hacemos parte . Así, cada <strong>guía de aprendizaje</strong>&nbsp; está compuesta por una <strong>situación generadora</strong> o punto de partida, un <strong>mapa de ruta</strong> flexible, un entramado <strong>saberes </strong>a desarrollar y un <strong>punto de encuentro</strong> o propósito, que integra un conjunto amplio de recursos didácticos orientados al desarrollo de pensamiento científico. </br> Cada <strong>guía de aprendizaje</strong> propone una ruta de <strong>ocho momentos </strong>&nbsp;o estaciones que se componen &nbsp;a su vez de preguntas, experiencias científicas, explicaciones en contexto y enlaces sugeridos para más conexiones. <strong>(Ver + haciendo clic en cada ícono)</strong></p>
               <ul class="nav row fs--1 text-align mt-1">
                  <li class="ml-auto" style="width:63px;"><img src="{{asset('images/icons/situacionGeneradora.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Situación generadora </span></li>
                  <li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:63px;"><img src="{{asset('images/icons/rutaViaje.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Ruta de viaje </span></li>
                  <li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:63px;"><img src="{{asset('images/icons/puntoEncuentro.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Punto de encuentro </span></li>
                  <li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:63px;"><img src="{{asset('images/icons/GuiaSaberes.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Guía de saberes </span></li>
                  <li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:63px;"><img src="{{asset('images/icons/preguntaCentral.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Pregunta Central </span></li>
                  <li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:63px;"><img src="{{asset('images/icons/iconoExperiencia.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Experiencia Científica </span></li>
                  <li class="ml-sm-1 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4" style="width:63px;"><img src="{{asset('images/icons/cienciaCotidiana.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> Ciencia cotidiana </span></li>
                  <li class="mr-auto" style="width:63px;"><img src="{{asset('images/icons/masConexiones.png')}}" width="50px" height="auto"/> <span class="d-flex mt-1 ml-auto mr-auto w-75"> + Conexiones </span></li>
               </ul>
            </div>
            <div class="mb-1 mt-3 col-12 mt-2">
               <div class="justify-content-center justify-content-sm-between row">
                  <div class="ml-auto col-sm-auto p-2 ml-3">
                     Buscar por
                  </div>
                  <div class="d-none-result d-none d-flex flex-center mt-sm-0 col-sm-auto" id="divSearch">
                     <input ng-click="setPositionScroll()" ng-change="onSeachChange()" placeholder="Palabra clave..." aria-label="Search" 
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
                     <select ng-click="setPositionScroll()" ng-change="onThemeChange()" ng-model="themeName" class="custom-select custom-select-sm fs-lg--1 fs-md--1">
                        <option value="">Todos los temas</option>
                        <option value="@{{theme}}" ng-repeat="theme in themesList">@{{theme}}</option>
                     </select>
                     <select ng-click="setPositionScroll()" ng-change="onAreaChange()" ng-model="areaName" class="ml-2 custom-select custom-select-sm fs-lg--1 fs-md--1">
                        <option value="">Todas las áreas</option>
                        <option class=" " value="@{{area}}" ng-repeat="area in areas">@{{area}}</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="d-none-result d-none row w-100 p-3">
               <div class="col-md-6 ml-2 pr-2 border-white-extent card card-body bg-dark row d-flex" ng-repeat="sequence in sequences | filter: searchText">
                  <div class="view" id="sequence-description-@{{sequence.id}}">
                     <div class="media">
                        <img ng-src="{{asset('/')}}@{{sequence.url_image}}" width="80px" height="100px"/> 
                        <div class="media-body pl-2 pr-3">
                           <h5 class="pl-2 fs-0 boder-header text-align-left">@{{sequence.name}}</h5>
                           <div class="mt-3 pr-2 pl-2 fs--1" style="min-height: 110px;">@{{sequence.description}}</div>
                           <div class="mt-2">
                              <a class="btn btn-sm btn-outline-primary" ng-href="/guia_de_aprendizaje/@{{sequence.id}}/@{{sequence.name_url_value}}">
                              <span class="fs--1">Detalle</span></a>
                              <a ng-click="onSequenceBuy(sequence)" class="ml-2  btn-sm btn btn-outline-primary" href="#" class="col-auto">
                              <span class="fs--1">
                              <i class="fas fa-shopping-cart"></i> Comprar</span></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="p-3 border-lg-y col-lg-2 w-100" style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-hide="sequences.length > 0">
               cargando...
            </div>
            <div class="d-none-result d-none p-3 border-lg-y col-lg-2 w-100" style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-show="searchText.length > 0 && sequences.length > 0">
               No se encontraron guías que coincidan con la búsqueda @{{searchText}}
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