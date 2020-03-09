@extends('layouts.app')
@section('content')
<div ng-controller="sequencesSearchCtrl" ng-init="init(1)">
   <div class="bg-light mb-3 card">
      <div class="p-3 card-body">
         <div class="justify-content-center justify-content-sm-between row">
            <div class="text-center col-sm-auto">
               <i class="fas fa-filter"></i> Búsqueda de contenido
            </div>
            <div class="d-flex flex-center fs--1 mt-1 mt-sm-0 col-sm-auto">
               <input ng-change="onSeachChange()" placeholder="Buscar..." aria-label="Search" 
                  type="search" ng-model="searchText" name="searchText" id="searchText"
                  ng-keyup="complete($event, searchText)"
                  ng-blur = "fillTextbox($event,searchText)"
                  class="mr-2 rounded-pill search-input form-control" style="font-size: 0.85rem;">

               <div ng-show="wordList.length > 0" tabindex="-1" role="menu" aria-hidden="false" 
               class="dropdown-menu-card dropdown-menu dropdown-menu-left show" style="left: 28px;">
                  <div class="modal-menu shadow-none card py-2" style="max-width: 20rem;">
                          <a href="#!" tabindex="0" role="menuitem" class="dropdown-item" 
                          ng-if = "$index < 10"
                          ng-click="fillTextbox($event,keyword)"
                          ng-repeat="keyword in wordList">@{{keyword}}</a>
                     </div>
                  </div>

               <select ng-change="onSequenceChange()" placeholder="Secuencias" ng-model="sequencesId" class="mr-2 custom-select custom-select-sm">
                  <option value="">Secuencias</option>
                  <option value="@{{sequence.id}}" ng-repeat="sequence in sequences">@{{sequence.name}}</option>
               </select>
               <select ng-change="onTematicChange()" ng-model="tematicName" class="custom-select custom-select-sm">
                  <option value="">Temática</option>
                  <option value="@{{tematic}}" ng-repeat="tematic in tematics">@{{tematic}}</option>
               </select>

            </div>
         </div>
         <p class="fs--1 mb-0">

         </p>
      </div>
   </div>

   <div ng-show="errorMessageFilter" class="alert alert-danger p-1" role="alert">
         @{{ errorMessageFilter }}
   </div>

   <div class="mb-3 card">
      <div class="card-body">
         <div class="no-gutters row">
            <div class="mb-3 col-12">
               <div class="justify-content-center justify-content-sm-between row">
                  <div class="text-center col-sm-auto">
                     <h5 class="d-inline-block">Guías de aprendizaje (Básica)</h5>
                  </div>
                  <div class="d-flex flex-center fs--1 mt-1 mt-sm-0 col-sm-auto">

                     <!--div class="custom-switch custom-control">
                        <input type="checkbox" id="customSwitch1" class="custom-control-input" checked="false">
                        <label class="custom-control-label" for="customSwitch1">Sólo Gratuitas</label>
                     </div-->
                  </div>
               </div>
            </div>
            <div class="border-lg-y col-lg-2" ng-repeat="sequence in sequences | filter: searchText | filter : { id : (sequencesId || id) } : true | filter : { areas : tematicName || areas }">
               <div class="h-100">
                  <div class="text-center p-2">
                     <img src="images/welcome/swiper-container/swiper-container-1.png" width="160px" height="160px" /> 
                     <a class="mt-4 btn btn-outline-primary" href="#">Explorar</a>
                  </div>
               </div>
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