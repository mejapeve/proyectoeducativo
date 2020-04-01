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
   
  .swiper-wrapper.kit .swiper-slide {
		max-height: 373px;
		width: 96vw;
		background-size: 95vw 29vw;
		background-repeat: no-repeat;
	}
</style>

<div ng-controller="kitsElementsCtrl" ng-init="getKits()">
   <div ng-show="errorMessageFilter" id="errorMessageFilter"
      class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
      <span class="col">@{{ errorMessageFilter }}</span>
      <span class="col-auto"><a ng-click="errorMessageFilter = null"><i class="far fa-times-circle"></a></i></span>
   </div>
   <div class="mb-3 card">
      <div class="card-body">
         <div class="no-gutters row">
            <div class="d-none-result d-none mb-3 col-12">
               <div class="justify-content-center justify-content-sm-between row">
                  <div class="d-none-result d-none d-flex flex-center mt-1 mt-sm-0 col-sm-auto d-none-result d-none">
                     <!-- Swiper -->
                     <div class="swiper-container">
                        <div class="swiper-wrapper kit">
                           <div class="swiper-slide" ng-repeat="imagen in kit.images" 
                              style="background-image: url('{{env('APP_URL')}}/@{{imagen}}');">
                           </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next" style="color: white;"></div>
                        <div class="swiper-button-prev" style="color: white;"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="d-none-result d-none row w-100">
				 <div class="pr-0 col-12 sequence-description ml-2">
					<h4 class=" boder-header p-1">
					   @{{kit.name}}
					</h4>
					@{{kit.description}}
				 </div>
				 <div class="col-12">
					<a class="ml-3 mt-3 btn btn-outline-primary fs-0" href="#" class="col-6"><i class="fas fa-shopping-cart"></i> Comprar</a>
				 </div>
				 
				 <div class="col-12 ml-2 mt-3" ng-show="kit_elements">
				   <h5 class="p-1">Esta guía requiere instrumentos y materiales de laboratorio </h5>
				   <div class="row">
					   <div class="col-lg-4 col-md-6" ng-repeat="kit_element in kit_elements" style="border: 6px solid white;">
						  <div class="card-body bg-light text-center p-1 row">
							 <div class="col-5">
								<img class="kit-imagen col-12 p-0" ng-src="@{{kit_element.url_image}}" width="62px" height="62px" />
							</div>
							 <div class="col-7">
								 <div class="col-12 mt-3 kit-description">
									<h6 class="boder-header p-1  fs-1">
									   @{{kit_element.name}}
									</h6>
									@{{kit_element.description}}
								 </div>
								 <div class="col-12 p-2 mt-3 text-aling-left">
									<a class="pl-3 ml-4 mt-1 btn btn-outline-primary fs--2" href="#" class="col-6">Agregar</a>
								 </div>
							</div>
						  </div>
					   </div>
				   </div>
				 </div>
            </div>

            <div id="loading" class="fade show p-3 border-lg-y col-lg-2 w-100" ng-hide="kit"
               style="min-height: 43vw; border: 0.4px solid grey; min-width: 100%">
               cargando...
            </div>

         </div>
      </div>
   </div>
</div>

<script src="{{ asset('/falcon/js/swiper.min.js') }}" defer></script>
<script src="{{ asset('/../angular/controller/kitsElementsCtrl.js') }}" defer></script>

@endsection