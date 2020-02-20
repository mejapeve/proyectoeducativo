@extends('layouts.app')
@section('content')
<div class="no-gutters row">
   <div class="pr-lg-2 mb-3 col-lg-6">
      <div class="card-header about-header" >
         <h5 class="mb-0">¿Qué es Conexiones?</h5>
      </div>
      <div class="about-body">
         Es una plataforma interactiva dirigida a niños,
         niñas y jóvenes, que se interesan en las en las
         ciencias naturales y desean aprender sobre el
         mundo que les rodea.
      </div>
   </div>
   <div class="pl-lg-2 mb-3 col-lg-6">
      <img class="img-thumbnail img-fluid mb-3 shadow-sm" src="{{ asset('images/welcome/swiper-container/swiper-container-2.png') }}" alt="">
   </div>
</div>
<div class="no-gutters row">
   <div class="pl-lg-2 mb-3 col-lg-5 d-none d-lg-block ">
      <img class="img-thumbnail img-fluid mb-3 shadow-sm" src="{{ asset('images/trance.jpg') }}" alt="">
   </div>
   <div class="pr-lg-2 mb-3 col-lg-6"  style="margin-left: 10px;">
      <div class="card-header about-header" >
         <h5 class="mb-0">La propuesta de Conexiones</h5>
      </div>
      <div class="about-body" >
         Lorem ipsum dolor sit amet, consectetur adipiscing
      elit. Cras tempus euismod scelerisque. Suspendisse
      diam ante, elementum ac pharetra vitae, molestie
      a ipsum. Vestibulum et nisl d
      </div>
   </div>
   <div class="pl-lg-2 mb-3 col-lg-5 d-none dx-sm-block">
      <img class="img-thumbnail img-fluid mb-3 shadow-sm" src="{{ asset('images/trance.jpg') }}" alt="">
   </div>
</div>
<div class="no-gutters row">
   <div class="pr-lg-2 mb-3 col-lg-6">
      <div class="card-header about-header" >
         <h5 class="mb-0">Razones para elegir Conexiones</h5>
      </div>
      <div class="about-body">
         Lorem ipsum dolor sit amet, consectetur adipiscing
		  elit. Cras tempus euismod scelerisque. Suspendisse
		  diam ante, elementum ac pharetra vitae, molestie
		  a ipsum. Vestibulum et nisl d
      </div>
   </div>
   <div class="pl-lg-2 mb-3 col-lg-6">
      <img class="img-thumbnail img-fluid mb-3 shadow-sm" src="{{ asset('images/true_believers_principal.jpg') }}" alt="">
   </div>
</div>
<div class="card-header about-header">
   <h5 class="mb-0">Kit de laboratorio</h5>
</div>
<div class="mt-2 about-body card">
   <div class="pl-lg-2 mb-3 col-lg-4 bg-light card-body ">
      <img class="img-thumbnail img-fluid mb-3 shadow-sm" src="{{ asset('images/trance.jpg') }}" alt="">
      <h5 class="mb-0 about-title">Unidad</h5>
 <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing
      elit. Cras tempus euismod scelerisque. Suspendisse
      diam ante, elementum ac pharetra vitae, molestie
      a ipsum. Vestibulum et nisl d
   </p>
   </div>
   
   <div class="pl-lg-2 mb-3 col-lg-4"></div>
   <div class="pl-lg-2 mb-3 col-lg-4"></div>
</div>
</div>
@endsection