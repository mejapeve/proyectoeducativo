@extends('layouts.app')
@section('content')
<div ng-controller="ratingPlanListCtrl" ng-init="init(1)">
   
    <div ng-show="errorMessageFilter"
        id="errorMessageFilter" 
        class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
         <span class="col">@{{ errorMessageFilter }}</span>
         <span class="col-auto"><a ng-click="errorMessageFilter = null"><i class="far fa-times-circle"></a></i></span>
    </div>

    <div class="mb-3 card">
      <div class="card-body">
         <div class="row">
            <div class="mb-3 col-12">
               <div class="justify-content-center justify-content-sm-between row">
                  <div class="text-center col-sm-auto boder-header p-2 ml-3">
                     <h5 class="d-inline-block">Planes de acceso</h5>
                  </div>
               </div>
            </div>
            <div class="ml-2 pr-lg-5 pr-md-4 pr-sm-2 col-12">
                <p>Es importante tener en cuenta que si bien hay una ruta de viaje trazada, en Conexiones se puede  elegir hacer el recorrido en el orden propuesto o de manera aleatoria, pues aunque los momentos de cada guía de aprendizaje se relacionan entre sí, cada uno puede abordarse independientemente.</p>
                <p>De esta manera, Conexiones tiene una estructura flexible que se adapta  a diversos intereses de aprendizaje, planes de estudio y disponibilidad de tiempo,  dando la opción de elegir entre las siguientes opciones: </p>
                <ul>
                <li>Guía de aprendizaje completa con sus ocho momentos, cada uno con preguntas exploradoras de saberes, experiencias científicas, explicaciones de ciencias  en contexto e  ideas para + conexiones. </li>
                <li>Uno o varios momentos o etapas de una misma guía de aprendizaje o de  varias.</li>
                <li>Una o varias experiencias científicas, con los videos orientadores para su realización.</li>
                </ul>
                <p>A continuación puede consultar los diferentes planes disponibles. Si tiene dudas o sugerencias, contáctenos y con gusto le llamaremos para darle más detalles y ofrecerle la mejor opción de acuerdo sus expectativas.</p>
            </div>
            <div class="d-none-result d-none row col-12 ml-auto mr-auto">
               <div class="mt-xl-0 mt-5 col-xl-1_5 col-lg-2 col-md-3 col-sm-4 col-6 pl-0 pr-0" ng-repeat="ratingPlan in ratingPlans" style="border: 10px solid white;">
                  <div class="card card-body bg-light pr-2 pl-2 pb-0 h-100">
                     <div class="ml-2 fs--3 flex-100">
                        <h6 class="text-center fs--3"> <span class="ml-2">@{{ratingPlan.name}} </span></h6>  
                        <ul class="p-0 fs--3" ng-repeat="item in ratingPlan.description_items">
                            <li class="fs--3 small pr-3 mt-4 ml-2"> @{{item}}</li>
                        </ul>
                        <div class="position-absolute" style="bottom: -40px;">
							<a class="ml-lg-0 ml-2 btn btn-outline-primary" ng-hide="ratingPlan.is_free"
								ng-href="/plan_de_acceso/@{{ratingPlan.id}}/@{{ratingPlan.name_url}}" class="col-auto">
								<span>Adquirir</span>
							</a>
							<a class="ml-lg-0 ml-2 btn btn-outline-primary" ng-show="ratingPlan.is_free" href="#"
								ng-click="onRatingPlanFree(ratingPlan.id)" class="col-auto">
								<span>Plan gratuito</span>
							</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row w-100" style="height:20px"></div>
            </div>
           <div class="p-3 border-lg-y col-lg-2 w-100" style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-hide="ratingPlans.length > 0">
              cargando...
           </div>
         </div>
      </div>
   </div>
</div>

<script src="{{ asset('/../angular/controller/ratingPlanListCtrl.js') }}" defer></script>

@endsection
