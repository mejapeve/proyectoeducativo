<div class="mb-3 card">
   <div class="card-header  m-auto">
      <div class="ml-5 avatar avatar-5xl">
         @if(isset(auth('afiliadoempresa')->user()->url_image))
           <img class="rounded-circle m-auto" src="{{asset(auth('afiliadoempresa')->user()->url_image)}}" width="150px" height="auto">
          @else 
           <img class="rounded-circle m-auto" src="{{asset('images/icons/default-avatar.png')}}" width="150px" height="auto">
         @endif 
      </div>
      <h5 style="text-align: center;" class="mb-2 avatar-name" id="tutorProfileFullName">{{auth('afiliadoempresa')->user()->name }}
         {{auth('afiliadoempresa')->user()->last_name}}
      </h5>
      <a href="{{route('tutor','conexiones')}}"><button class="btn btn-sm btn-outline-primary ml-6 fs--3">Editar perfíl</button></a>
   </div>
   <div class="bg-light border-top card-body">

      <div class="row">
         <div class="mt-2 col-12 fs--1"  >
            <h6 class="font-weight-semi-bold ls mb-3 text-uppercase">Información de cuenta</h6>
            <div class="row">
               <div class="col-12">
                  <p class="font-weight-semi-bold mb-1">Nombre de usuario</p>
               </div>
               <div class="col-12">{{auth('afiliadoempresa')->user()->user_name}}</div>
            </div>
            <div class="row">
               <div class="col-12">
                  <p class="font-weight-semi-bold mb-1 mt-2 ">Correo electrónico</p>
               </div>
               <div class="col-12">{{auth('afiliadoempresa')->user()->email}}</div>
            </div>
            <div class="row">
               <div class="col-12">
                  <p class="font-weight-semi-bold mb-1 mt-2 ">Fecha del último pago </p>
               </div>
               <div class="font-italic text-400 col-12">{{auth('afiliadoempresa')->user()->last_payment_date()}}</div>
            </div>
            <div class="row">
               <div class="col-12">
                  <p class="font-weight-semi-bold mb-1 mt-2 ">Fecha de creación de usuario </p>
               </div>
               <div class="font-italic text-400 col-12">{{auth('afiliadoempresa')->user()->created_at}}</div>
            </div>
         </div>
      </div>
   </div>
</div>