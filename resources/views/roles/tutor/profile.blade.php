@extends('layouts.app_side')

@section('content')
<div class="container" ng-controller="TutorIndexController">
   <div class="content">
      <div class="row">
         <div class="col-md-4">
            @include('roles/tutor/sidebar')
         </div>
         <div class="col-md-8">
            <div class="mb-3 card">
               <div class="card-header">
                    <h5>Perfíl Tutor</h5> 
               </div>
               <div class="bg-light card-body">
                  <div class="justify-content-center align-items-center">
                     <div class="flex-grow-1">
                        <ul class="nav">
                           <li class="nav-item nav-item-tutor mb-3">
                              <div class="avatar avatar-3xl">
                                 <a href="{{route('password.reset',['empresa'=>'conexiones','token'=> 1])}}">
                                    <img class="rounded-circle mb-3 shadow-sm"
                                       src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
                                 </a>
                                 <p class="fs--2 mb-1">
                                    <a class="text-700"
                                       href="{{route('password.reset',['empresa'=>'conexiones','token'=> 1])}}">
                                       <small class="font-weight-bold"> Cambio de clave</small></a>
                                 </p>
                              </div>
                           </li>
                           <li class="nav-item nav-item-tutor mb-3">
                                 <div class="avatar avatar-3xl">
                                    <a href="{{route('registerStudent',['empresa'=>'conexiones'])}}">
                                       <img class="rounded-circle mb-3 shadow-sm"
                                          src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
                                    </a>
                                    <p class="fs--2 mb-1">
                                       <a class="text-700"
                                          href="{{route('registerStudent',['empresa'=>'conexiones'])}}">
                                          <small class="font-weight-bold"> Registrar estudiante </small>
                                       </a>
                                    </p>
                                 </div>
                              </li>
                        </ul>
                     </div>
                  </div>
                  <div class="bg-light card-body">
                        @yield('content-tutor-profile')
                  </div>


                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
