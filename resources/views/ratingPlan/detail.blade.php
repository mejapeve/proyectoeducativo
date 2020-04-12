@extends('layouts.app')
@section('content')

<div class="w-100" ng-controller="ratingPlanDetailCtrl" ng-init="init(1)">
    <div ng-show="errorMessageFilter" id="errorMessageFilter"
      class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
      <span class="col">@{{ errorMessageFilter }}</span>
      <span class="col-auto"><a ng-click="errorMessageFilter = null"><i class="far fa-times-circle"></a></i></span>
    </div>
    <div class="mb-3 card col-12" ng-show="ratingPlan">
      <div class="card-body w-100">
        <div class="row d-none-result d-none">
             <div class="mb-3">
                <h4 class=" boder-header p-1 pl-3">
                   @{{ratingPlan.name}}
                </h4>
                @{{ratingPlan.description}}
             </div>
             
             <ul class="text-justify pr-4 mb-0" ng-show="ratingPlan.type_rating_plan_id === 1">
                <li><strong>Situación generadora</strong>: tiene la intención pedagógica de movilizar la curiosidad de los estudiantes y las estudiantes para indagar y aprender. </li>
                <li><strong>Ruta de viaje</strong>: organizada en ocho momentos o etapas secuenciales que, en conjunto, permiten ampliar la comprensión de los fenómenos naturales tratados y la conexión de estos con el mundo de la vida </li>
                <li><strong>Guía de saberes</strong>: Durante el desarrollo de cada guía de aprendizaje, las y los estudiantes despliegan un conjunto de acciones de pensamiento y producción que constituyen las evidencias de aprendizaje. </li>
                <li><strong>Momentos</strong>:  Los momentos de la ruta están articulados a un punto de encuentro, que constituye el propósito común articulador de todos los contenidos. </li>
                <p class="mt-3"> A continuación te ofrecemos una lista para que elijas @{{ratingPlan.count===1 ? 'la secuencia': 'las '+ratingPlan.count+' secuencias'}} que deseas realizar.</p>
             </ul>
             
             <ul class="text-justify pr-4 mb-0" ng-show="ratingPlan.type_rating_plan_id === 2">
                <li><strong>Momentos</strong>:  Adquiere los momentos y experiencias de momentos según la guía de aprendizaje. </li>
                <p class="mt-3"> A continuación te ofrecemos una lista para que elijas @{{ratingPlan.count===0 ? ' los momentos ': ratingPlan.count===1 ? 'el momento': 'los '+ratingPlan.count +' momentos'}} que deseas realizar.</p>
             </ul>
             
             <ul class="text-justify pr-4 mb-0" ng-show="ratingPlan.type_rating_plan_id === 3">
                <li><strong>Experiencia</strong>:  Adquiere las experiencias de momentos según la guía de aprendizaje. </li>
                <p class="mt-3"> A continuación te ofrecemos una lista para que elijas @{{ratingPlan.count===0 ? 'las experiencias ' : ratingPlan.count===1 ? 'la experiencia': 'las '+ratingPlan.count +' experiencias'}} que deseas realizar.</p>
             </ul>
             
             <div class="col-12 text-right">
                <button ng-click="onContinueElements()" ng-disabled="!selectComplete" class="d-none-result d-none ml-3 mt-3 btn btn-outline-primary fs-0 confirm_rating" href="#" class="col-6"><i class="fas fa-arrow-right"></i> Continuar compra</button>
             </div>
             
             <div class="col-12 ml-2 mt-1 row" ng-show="sequences">
               
               <div ng-class="{'col-lg-4 col-md-6 col-sm-12': ratingPlan.type_rating_plan_id === 1,
                               'col-xl-4 col-lg-5 col-md-6 col-sm-12': ratingPlan.type_rating_plan_id === 2 || ratingPlan.type_rating_plan_id === 3}" class="col-12" 
                    ng-repeat="sequence in sequences" style="border: 10px solid white;">
                  <div class="card card-body bg-dark text-center pt-5 row sequence_div_responsive">
                     <div class="position-absolute" style="top:10px; transform : scale(2);">
                         <input type="checkbox" ng-model="sequence.isSelected" name="check_sequence_@{{sequences.id}}" ng-change="onCheckChange(sequence)"/> 
                     </div>

                     <div class="col-5">
                        <img ng-src="../../@{{sequence.url_image}}" width="auto" height="auto" class="col-12 p-0"/> 
                     </div>
                     <div class="col-7 pl-0 ml-2 text-justify fs--1 flex-100" id="sequence-description-@{{sequence.id}}">
                        <h5 class="pl-3 boder-header"> <span class="ml-2">@{{sequence.name}} </span></h5>  
                        <p class="mt-4 ml-2"> @{{sequence.description}}</p>
                     </div>
                     <div class="fade bg-light moment_div_responsive row p-3" ng-show="sequence.isSelected" id="moment_div_responsive_@{{sequence.id}}"> 
                         <div class="text-left" ng-repeat="moment in sequence.moments" ng-show="ratingPlan.type_rating_plan_id === 2">
                             <input class="transform-scale-2 ml-3 mt-1 mr-2" type="checkbox" ng-model="moment.isSelected" name="check_moment_@{{moment.id}}" ng-change="onCheckChange(sequence,moment)"/>
                             <span>@{{moment.name}}</span>
                         </div>
                         <div class="text-left" ng-repeat="moment in sequence.moments"  ng-show="ratingPlan.type_rating_plan_id === 3">
                            <div class="text-left" ng-repeat="experience in moment.experiences">
                             <input class="transform-scale-2 ml-3 mt-1 mr-2" type="checkbox" ng-model="experience.isSelected" name="check_experience_@{{moment.id}}" ng-change="onCheckChange(sequence,moment,experience)"/>
                             <span>@{{experience.tittle}}</span>
                            </div>
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