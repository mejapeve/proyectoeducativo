<div class="mb-3 card">
   <div class="card-header  m-auto">
      <div class="avatar avatar-5xl">
	  {{auth('afiliadoempresa')->user()}}
		@if(isset(auth('afiliadoempresa')->user()->url_image)) 
		
		 <img class="rounded-circle " src="{{asset(auth('afiliadoempresa')->user()->url_image)}}" width="100px">
		@else 
         <img class="rounded-circle " src="{{asset('images/icons/default-avatar.png')}}"  width="100px">
		@endif 
      </div>
      <h5 style="text-align: center;" class="mt-2 mb-0 avatar-name" id="tutorProfileFullName">{{auth('afiliadoempresa')->user()->name }}
         {{auth('afiliadoempresa')->user()->last_name}}</h5>
   </div>
   <div class="bg-light border-top card-body">

      <div class="row">
         <div class="mt-2 col-12">
            <h6 class="font-weight-semi-bold ls mb-3 text-uppercase">Información de cuenta</h6>
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-1">Usuario</p>
               </div>
               <div class="col">{{auth('afiliadoempresa')->user()->user_name}}</div>
            </div>
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-1">Correo</p>
               </div>
               <div class="col">{{auth('afiliadoempresa')->user()->email}}</div>
            </div>
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-1">Creado</p>
               </div>
               <div class="font-italic text-400 col">{{auth('afiliadoempresa')->user()->created_at}}</div>
            </div>
         </div>
      </div>
   </div>
</div>