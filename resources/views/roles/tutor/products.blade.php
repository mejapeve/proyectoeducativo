@extends('roles.tutor.layout')

@section('content-tutor-index')
   <div class="d-none-result d-none" ng-controller="tutorProductsCtrl" ng-init="init()" >
        <div class="row no-gutters" ng-show="products && products.length > 0">
          <h6 ng-show="products.length === 1" class="mt-3 mb-4"> Actualmente cuentas con el siguiente producto con nosotros.</h6>
          <h6 ng-show="products.length > 1" class="mt-3 mb-4"> Actualmente cuentas con diferentes productos con nosotros.</h6>
          <div class="row">
              <div ng-repeat="product in products" class="col-lg-6 col-12 mb-3">
                <div ng-show="product.type_product_id === 1" class="d-flex">
                    <img width="auto" height="100px" src="{{asset('/')}}@{{product.sequence.url_image}}" />
                    <div class="row">
                       <h6 class="col-12 ml-3">Secuencia @{{product.sequence.name}}</h6>
                       <p class="fs--3 ml-3 col-12  pr-5">Esta guía de aprendizaje consta de : Situación generadora, guía de saberes, ruta de viaje y los 8 momentos que contienen : Pregunta central, ciencia en contexto, experiencia cientíﬁcas y + conexiones</p>
                    </div>
                </div>
                <div ng-show="product.type_product_id === 2" class="d-flex">
                    <img width="auto" height="100px" src="{{asset('/')}}@{{product.sequence.url_image}}" />
                    <div class="row">
                       <h6 class="col-12 ml-3">Experiencia @{{product.sequence.name}}</h6>
                       <p class="fs--3 ml-3 col-12  pr-5">Consta de diversas experiencias científicas</p>
                    </div>
                </div>
                <div ng-show="product.type_product_id === 3" class="d-flex">
                    <img width="auto" height="100px" src="{{asset('/')}}@{{product.sequence.url_image}}" />
                    <div class="row">
                       <h6 class="col-12 ml-3">Momentos de @{{product.sequence.name}}</h6>
                       <p class="fs--3 ml-3 col-12 pr-5">Consta de diveros momentos</p>
                    </div>
                </div>
                <div ng-show="product.affiliated_account_services.rating_plan.is_free" class="position-absolute label_free">
                       Prueba gratuita
                </div>
              </div>
           </div>
        </div>
        <div class="fs--1" ng-show="products && products.length === 0">
          <h6>Aún no cuentas con productos con nosotros</h6>
        </div>
        <div class="p-3 border-lg-y col-lg-2 w-100"
               style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-hide="products">
               cargando...
        </div>
        <div class="p-3 border-lg-y col-lg-2 w-100"
               style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-hide="ratingPlans">
               cargando...
        </div>
        
        <div class="no-gutters" ng-show="ratingPlans && ratingPlans.length > 0">
          <h6 class="mt-3 mb-4"> Recuerda nuestros planes y beneﬁcios para ampliar las posibilidades de aprendizaje.</h6>
          <div class="row">
              <div ng-hide="ratingPlan.is_free"class="mb-6 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-6" 
                  ng-repeat="ratingPlan in ratingPlans track by $index">
                  <div class="card card-body pr-2 pl-2 pb-0 h-100">
                     <div class=" ml-2 fs--3 flex-100">
                        <h6 class="font-weight-bold text-center fs--3 card-rating-plan-id-@{{$index}}"> <span class="ml-2">@{{ratingPlan.name}} </span></h6>  
                        <ul class="p-0 ml-2" ng-repeat="item in ratingPlan.description_items">
                            <li class="fs-1 small pl-1 pr-2 mt-3 ml-3 card-rating-plan-id-@{{$parent.$index}}"> 
                            <span class="color-gray-dark fs--1">
                            @{{item}}
                            </span></li>
                        </ul>
                     </div>
                  </div>
                  <div class="trapecio-top position-absolute ml-4" style="bottom: -25px;">
                    <a class=""
                        ng-href="{{route('/')}}/plan_de_acceso/@{{ratingPlan.id}}/@{{ratingPlan.name_url_value}}" class="col-auto">
                        <span class="fs--3 ml-1 mt-2" style="position: absolute;top: -31px;color: white;">Adquirir</span>
                    </a>
                </div>
               </div>
           </div>
        </div>
   </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/tutorProductsCtrl.js')}}"></script>
@endsection