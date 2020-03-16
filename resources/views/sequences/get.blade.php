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
            <div class="mb-3 col-12">
               <div class="justify-content-center justify-content-sm-between row">
                  <div class="d-none-result d-none d-flex flex-center mt-1 mt-sm-0 col-sm-auto d-none-result d-none">
                     <!-- Swiper -->
                     <div class="swiper-container">
                        <div class="swiper-wrapper">
                           <div ng-repeat="imagen in sequence.images" class="swiper-slide"
                              style="
                              width: 74vw;
                              background-image: url('@{{ imagen}}');
                              background-size: 92vw 50vw;">
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
               <div class=" col-lg-4 col-md-6"
                  style="border: 6px solid white;">
                  <div class="h-100 card-body bg-light text-center p-2 row">
                     <div class="col-8 row">
                        <img ng-src="@{{sequence.url_image}}" width="162px" height="162px"
                           class="col-12 p-0 sequence-imagen" />
                        <a class="ml-auto mr-auto mt-2 btn btn-outline-primary fs--2" href="#" class="col-6">Detalle</a>
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
            <div class="p-3 border-lg-y col-lg-2 w-100"
               style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%"
               ng-hide="sequence">
               cargando...
            </div>

         </div>
      </div>
   </div>
</div>

<script src="{{ asset('/falcon/js/swiper.min.js') }}" defer></script>
<script src="{{ asset('/../angular/controller/sequencesGetCtrl.js') }}" defer></script>

@endsection