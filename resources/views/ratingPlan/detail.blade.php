@extends('layouts.app_side')

@section('content')

<div class="w-100" ng-controller="ratingPlanDetailCtrl" ng-init="init(1,'{{$rating_plan_id}}','{{$sequence_id}}')">
    <div ng-show="errorMessageFilter" id="errorMessageFilter"
      class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
      <span class="col">@{{ errorMessageFilter }}</span>
      <span class="col-auto"><a ng-click="errorMessageFilter = null"><i class="far fa-times-circle"></i></a></span>
    </div>
    <div class="mb-3 card col-12" ng-show="ratingPlan">
      <div class="card-body w-100">
        <div class="row d-none-result d-none">
             <div class="mb-3">
                <h4 class=" boder-header p-1 pl-3">
                   @{{ratingPlan.name}}
                </h4>
             </div>
                          
             <ul class="text-justify pr-4 mb-0">
                <p>@{{ratingPlan.description}}</p>
                <p> A continuación, te mostramos las guías de aprendizaje disponibles. Para conocer de qué se tratan y cuáles son sus contenidos pueden hacer clic en detalles, allí encontrarán un video introductorio y una malla curricular en la que se describen los propósitos de cada momento, la pregunta central, el eje temático de la explicación de ciencia en contexto, las experiencias científicas propuestas y los materiales que se requieren para esta.     </p>
                <p>Si tiene alguna pregunta pueden escribirnos a través del formulario de contacto. </p>
             </ul>
             
             <div class="col-12 text-right">
                <button ng-click="onContinueElements()" ng-disabled="!selectComplete" class="d-none-result d-none ml-3 mt-3 btn btn-outline-primary fs-0 confirm_rating" href="#" class="col-6"><i class="fas fa-arrow-right"></i> Continuar compra</button>
             </div>
             
             <div class="col-12 ml-2 mt-1 row" ng-show="sequences">

               <div ng-class="{'col-lg-4 col-md-6 col-sm-12': ratingPlan.type_rating_plan_id === 1,
                               'col-xl-4 col-lg-5 col-md-6 col-sm-12': ratingPlan.type_rating_plan_id === 2 || ratingPlan.type_rating_plan_id === 3}" class="col-12" 
                    ng-show="sequenceForAdd" style="border: 10px solid white;">
                  <div class="card card-body bg-dark text-center pt-5 row sequence_div_responsive">
                     <div class="position-absolute" style="top:10px; transform : scale(2);">
                         <input type="checkbox" ng-model="sequenceForAdd.isSelected" name="check_sequence_ForAdd_"@{{sequenceForAdd.id}} ng-change="onCheckChange(sequenceForAdd,null,sequenceForAdd)"/>
                     </div>

                     <div class="col-5">
                        <img ng-src="/@{{sequenceForAdd.url_image}}" width="auto" height="auto" class="col-12 p-0"/> 
                        <a ng-click="showMash(sequence)" class="ml-3 mt-3 btn btn-outline-primary fs--2" href="#" class="col-6">
                            <i class="fas fa-search"></i> Ver contenido
                        </a>                     
                     </div>
                     <div class="col-7 pl-0 ml-2 text-justify fs--1 flex-100" id="sequence-descriptionForAdd-@{{sequenceForAdd.id}}">
                        <h5 class="pl-3 boder-header"> <span class="ml-2">@{{sequenceForAdd.name}} </span></h5>  
                        <p class="mt-4 ml-2"> @{{sequenceForAdd.description}}</p>
                     </div>
                     <div class="fade bg-light moment_div_responsive row p-3" ng-show="sequenceForAdd.isSelected" id="moment_div_responsive_ForAdd"> 
                         <div class="text-left" ng-repeat="moment in sequenceForAdd.moments" ng-show="ratingPlan.type_rating_plan_id === 2">
                             <input class="transform-scale-2 ml-3 mt-1 mr-2" type="checkbox" ng-model="moment.isSelected" name="check_moment_ForAdd@{{moment.id}}" ng-change="onCheckChange(sequenceForAdd,moment,sequenceForAdd)"/>
                             <span>@{{moment.name}}</span>
                         </div>
                         <div class="text-left" ng-repeat="moment in sequenceForAdd.moments"  ng-show="ratingPlan.type_rating_plan_id === 3">
                             <input class="transform-scale-2 ml-3 mt-1 mr-2" type="checkbox" ng-model="moment.isSelected" name="check_experience_ForAdd@{{moment.id}}" ng-change="onCheckChange(sequenceForAdd,moment,sequenceForAdd)"/>
                             <span>@{{moment.name}}</span>
                         </div>
                     </div>
                  </div>
               </div>

               
               <div ng-class="{'col-lg-4 col-md-6 col-sm-12': ratingPlan.type_rating_plan_id === 1,
                               'col-xl-4 col-lg-5 col-md-6 col-sm-12': ratingPlan.type_rating_plan_id === 2 || ratingPlan.type_rating_plan_id === 3}" class="col-12" 
                    ng-repeat="sequence in sequences" style="border: 10px solid white;">
                  <div class="card card-body bg-dark text-center pt-5 row sequence_div_responsive">
                     <div class="position-absolute" style="top:10px; transform : scale(2);">
                         <input type="checkbox" ng-model="sequence.isSelected" name="check_sequence_"@{{sequences.id}} ng-change="onCheckChange(sequence)"/>
                     </div>

                     <div class="col-5">
                        <img ng-src="{{asset('/')}}@{{sequence.url_image}}" width="auto" height="auto" class="col-12 p-0"/> 
                        <a ng-click="showMash(sequence)" class="ml-3 mt-3 btn btn-outline-primary fs--2" href="#" class="col-6">
                            <i class="fas fa-search"></i> Ver contenido
                        </a>                     
                     </div>
                     <div class="col-7 pl-0 ml-2 text-left fs--1 flex-100" id="sequence-description-@{{sequence.id}}">
                        <h5 class="pl-3 boder-header"> <span class="">@{{sequence.name}} </span></h5>  
                        <p class="mt-4 ml-2"> @{{sequence.description}}</p>
                     </div>
                     <div class="fade bg-light moment_div_responsive row p-3" ng-show="sequence.isSelected" id="moment_div_responsive_@{{sequence.id}}"> 
                         <div class="text-left" ng-repeat="moment in sequence.moments" ng-show="ratingPlan.type_rating_plan_id === 2">
                             <input class="transform-scale-2 ml-3 mt-1 mr-2" type="checkbox" ng-model="moment.isSelected" name="check_moment_@{{moment.id}}" ng-change="onCheckChange(sequence,moment)"/>
                             <span>@{{moment.name}}</span>
                         </div>
                         <div class="text-left" ng-repeat="moment in sequence.moments"  ng-show="ratingPlan.type_rating_plan_id === 3">
                             <input class="transform-scale-2 ml-3 mt-1 mr-2" type="checkbox" ng-model="moment.isSelected" name="check_experience_@{{moment.id}}" ng-change="onCheckChange(sequence,moment)"/>
                             <span>@{{moment.name}}</span>
                         </div>
                     </div>
                  </div>
               </div>
             </div>
             
             <div class="col-12 text-right">
                <button ng-click="onContinueElements()" ng-disabled="!selectComplete" class="d-none-result d-none ml-3 mt-3 btn btn-outline-primary fs-0 confirm_rating" href="#" class="col-6"><i class="fas fa-arrow-right"></i> Continuar compra</button>
             </div>
        </div>

        <div id="loading" class="fade show p-3 border-lg-y col-lg-2 w-100" ng-hide="ratingPlan"
           style="min-height: 43vw; border: 0.4px solid grey; min-width: 100%">
           cargando...
        </div>
      </div>
      @include('ratingPlan/elements_kits')
   </div>
   
</div>

<script src="{{ asset('/../angular/controller/ratingPlanDetailCtrl.js') }}" defer></script>

@endsection