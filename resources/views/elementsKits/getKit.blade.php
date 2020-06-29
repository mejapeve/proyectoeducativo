@extends('layouts.app_side')

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
               
            </div>
            <div class="d-none-result d-none row w-100">
                 <div class="pr-0 col-12 sequence-description ml-2">
				    <div class="text-align"><img class="kit-imagen col-12 p-0" ng-src="{{asset('/')}}@{{kit.url_image}}" width="62px" height="62px" /></div>
                    <h5 class="boder-header p-1 mt-4 mb-3">
                       @{{kit.name}}
                    </h5>
                    @{{kit.description}}
 				   <div class="product-label-sold-out" ng-show="kit.status=='sold-out'" style="top:0px">
						 Producto agotado
				    </div>
				    <div class="product-label-no-available" ng-show="kit.status==='no-available'">
						 Producto no disponible
				    </div>
                 </div>
                 <div class="col-12">
                    <a ng-hide="kit.status === 'sold-out' || kit.status === 'no-available'"
					class="ml-3 mt-3 btn btn-outline-primary fs-0" href="#" class="col-6"><i class="fas fa-shopping-cart"></i> Comprar</a>
                 </div>
                 
                 <div class="col-12 ml-2 mt-3" ng-show="listSequence.length > 0">
                   <h6 class="p-1">Este elemento es requerido para las siguientes guías de aprendizaje</h6>
                   <div class="row">
                       <div class="col-lg-4 col-md-6" ng-repeat="sequence in listSequence" style="border: 6px solid white;">
                          <div class="card-body bg-light text-center p-1 row">
                             <div class="col-5">
                                <img class="kit-imagen col-12 p-0" ng-src="{{asset('/')}}@{{sequence.url_image}}" width="62px" height="62px" />
                            </div>
                             <div class="col-7">
                                 <div class="col-12 mt-3 kit-description">
                                    <h6 class="boder-header p-1  fs-1">
                                       @{{sequence.name}}
                                    </h6>
                                    @{{sequence.description}}
                                 </div>
                            </div>
                          </div>
                       </div>
                   </div>
                 </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="{{ asset('/falcon/js/swiper.min.js') }}" defer></script>
<script src="{{ asset('/../angular/controller/kitsElementsCtrl.js') }}" defer></script>

@endsection