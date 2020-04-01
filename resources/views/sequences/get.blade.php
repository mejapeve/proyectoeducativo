@extends('layouts.app')
@section('content')

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="{{ asset('falcon/css/swiper.min.css') }}">

<!-- Demo styles -->
<style type="text/css">
   .swiper-container {
      width: 100%;
      height: 100%;
   }
   .swiper-slide {
      text-align: center;
      height: 50vw;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
   }
</style>

<div ng-controller="sequencesGetCtrl" ng-init="init()">
   <div ng-show="errorMessageFilter" id="errorMessageFilter"
      class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
      <span class="col">@{{ errorMessageFilter }}</span>
      <span class="col-auto"><a ng-click="errorMessageFilter = null"><i class="far fa-times-circle"></a></i></span>
   </div>
   <div class="mb-3 card" ng-show="sequence">
      <div class="card-body">
         <div class="no-gutters row">
            <div class="d-none-result2 d-none mb-3 col-12">
               <div class="justify-content-center justify-content-sm-between row">
                  <div class="d-none-result d-none d-flex flex-center mt-1 mt-sm-0 col-sm-auto d-none-result d-none">
                     <!-- Swiper -->
                     <div class="swiper-container">
                        <div class="swiper-wrapper sequence">
                           <div class="swiper-slide" ng-repeat="imagen in sequence.images" 
                              style=" background-image: url('{{App::environment('APP_URL')}}/@{{ imagen}}');">
                           </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next" style="color: white;"></div>
                        <div class="swiper-button-prev" style="color: white;"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="d-none-result2 d-none row w-100">
				 <div class="pr-0 col-12 sequence-description ml-2" id="sequence-description-@{{sequence.id}}">
					<h4 class=" boder-header p-1">
					   @{{sequence.name}}
					</h4>
					@{{sequence.description}}
				 </div>
				 <div class="col-12">
					<a class="ml-3 mt-3 btn btn-outline-primary fs-0" href="#" class="col-6"><i class="fas fa-shopping-cart"></i> Comprar</a>
				 </div>
				 <div class="col-12">
				   <h5 class=" boder-header p-1">Esta guía requiere instrumentos y materiales de laboratorio </h5>
				   <div class="row">
					   <div class="col-12" ng-repeat="kit in kits">
					   @{{kits}}
					   </div>
				   </div>
				 </div>
            </div>

            <div id="loading" class="fade show p-3 border-lg-y col-lg-2 w-100" ng-hide="sequence"
               style="min-height: 43vw; border: 0.4px solid grey; min-width: 100%">
               cargando...
            </div>

         </div>
      </div>
   </div>
</div>

<script src="{{ asset('/falcon/js/swiper.min.js') }}" defer></script>
<script src="{{ asset('/../angular/controller/sequencesGetCtrl.js') }}" defer></script>

@endsection