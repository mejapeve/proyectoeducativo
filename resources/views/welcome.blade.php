@extends('layouts.app')
@section('content')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="{{ asset('falcon/css/swiper.min.css') }}">

<!-- Swiper -->
<div class="swiper-container">
   <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(images/welcome/swiper-container/swiper-container-1.png); background-size: 92vw 50vw;"></div>
      <div class="swiper-slide" style="background-image:url(images/welcome/swiper-container/swiper-container-2.png); background-size: 92vw 50vw;"></div>
      <div class="swiper-slide" style="background-image:url(images/welcome/swiper-container/swiper-container-3.png); background-size: 92vw 50vw;"></div>
      <div class="swiper-slide" style="background-image:url(images/welcome/swiper-container/swiper-container-4.png); background-size: 92vw 50vw;"></div>
      <div class="swiper-slide" style="background-image:url(images/welcome/swiper-container/swiper-container-5.png); background-size: 92vw 50vw;"></div>
   </div>
   <!-- Add Arrows -->
   <div class="swiper-button-next" style="color: white;"></div>
   <div class="swiper-button-prev" style="color: white;"></div>
</div>
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
.img-thumbnail {
	height: 79px;
}
</style>

<div class="text-center fs--1 no-gutters row">
   <div class="mb-1 col-xxl-1 col-0 col-md-0 col-lg-1 bg-white"></div>
   <div class="mb-1 col-xxl-2 col-6 col-md-4 col-lg-2">
      <div class="thumbnail bg-white p-3 h-100">
         <a href="/pages/profile">
			<img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('images/welcome/thumbnail/2.47d043fe.svg') }}" alt="">
		 </a>
         <h6 class="mb-1">
            <a href="/pages/profile">Enfoque pedagógico</a>
         </h6>
         <p class="fs--2 mb-1">
            <a class="text-700" href="/pages/people#!">Propone aprendizajes <strong>basados</strong> en la <strong>experiencia</strong></a>
         </p>
      </div>
   </div>
   <div class="mb-1 col-xxl-2 col-6 col-md-4 col-lg-2">
      <div class="bg-white p-3 h-100">
         <a href="/pages/profile">
         <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('images/welcome/thumbnail/1.a8e929d2.svg') }}" width="100" alt=""></a>
         <h6 class="mb-1"><a href="/pages/profile">Guías de aprendizaje</a></h6>
         <p class="fs--2 mb-1"><a class="text-700" href="/pages/people#!">Explora los contenidos educativos y <strong>elige qué deseas aprender</strong>
</a></p>
      </div>
   </div>
   <div class="mb-1 col-xxl-2 col-6 col-md-4 col-lg-2">
      <div class="bg-white p-3 h-100">
         <a href="/pages/profile">
         <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('images/welcome/thumbnail/3.67dc7dd1.svg') }}" width="100" alt=""></a>
         <h6 class="mb-1"><a href="/pages/profile">Kits de laboratorio</a></h6>
         <p class="fs--2 mb-1"><a class="text-700" href="/pages/people#!">Adquiere materiales para las <strong>prácticas experimentales</strong>
</a></p>
      </div>
   </div>
   <div class="mb-1 col-xxl-2 col-6 col-md-4 col-lg-2">
      <div class="bg-white p-3 h-100">
         <a href="/pages/profile">
         <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('images/welcome/thumbnail/depositphotos_95249690.jpg') }}" width="100" alt=""></a>
         <h6 class="mb-1"><a href="/pages/profile">Versión de prueba</a></h6>
         <p class="fs--2 mb-1"><a class="text-700" href="/pages/people#!">Accede de manera <strong>gratuita</strong> y <strong>ten la experiencia</strong></a></p>
      </div>
   </div>
   <div class="mb-1 col-xxl-2 col-6 col-md-4 col-lg-2">
      <div class="bg-white p-3 h-100">
         <a href="/pages/profile">
         <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('images/welcome/thumbnail/133406155-stock.jpg') }}" width="100" alt=""></a>
         <h6 class="mb-1"><a href="/pages/profile">Subscripciones</a></h6>
         <p class="fs--2 mb-1"><a class="text-700" href="/pages/people#!">Elige el plan de acceso que <strong>deseas</strong></a></p>
      </div>
   </div>
   <div class="mb-1 col-xxl-1 col-6 col-md-4 col-lg-1 bg-white"></div>
</div>

<script src="{{ asset('/falcon/js/swiper.min.js') }}" defer></script>

<script>
   window.onload = function() {
      var swiper = new Swiper('.swiper-container', {
      navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
      },
      });
   };
</script>

@endsection