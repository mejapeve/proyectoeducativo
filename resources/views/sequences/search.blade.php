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
            <div class="d-none-result d-none row w-100">
               <div class=" col-lg-4 col-md-6" ng-repeat="sequence in sequences | filter: searchText" style="border: 6px solid white;">
                  <div class="h-100 card-body bg-light text-center p-2 row">
                     <div class="col-8 row">
                        <img ng-src="@{{sequence.url_image}}" width="162px" height="162px" class="col-12 p-0 sequence-imagen"/> 
                        <a ng-href="/guia_de_aprendizaje/@{{sequence.name}}" class="ml-auto mr-auto mt-2 btn btn-outline-primary fs--2" href="#" class="col-6">Detalle</a>
                        <a class="ml-auto mr-auto mt-2 btn btn-outline-primary fs--2" href="#" class="col-6">Comprar</a>
                     </div>
                     <div class="pr-0 col-4-5 sequence-description ml-2" id="sequence-description-@{{sequence.id}}">
                        <h6 class=" boder-header p-1">
                        @{{sequence.name}}
                        </h6>  
                        @{{sequence.description}}
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
