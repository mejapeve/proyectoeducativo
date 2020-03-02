<div class="mb-3 card">
   <div class="card-header  m-auto">
      <div class="avatar avatar-5xl">
         <img class="rounded-circle " src="http://localhost:8000/static/media/3.cb95ae1b.jpg" alt="">
      </div>
      <h5 style="text-align: center;" class="mt-2 mb-0 avatar-name">{{auth('afiliadoempresa')->user()->name }}
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
         <div class="mt-4 col-12">
            <h6 class="font-weight-semi-bold ls mb-3 text-uppercase">INFORMACIÓN DE COBRO</h6>
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-1">Dirección</p>
               </div>
               <div class="col">
                  <p class="mb-1">8962 Lafayette St.<br>Oswego, NY 13126</p>
               </div>
            </div>
            @if(auth('afiliadoempresa')->user()->country_id )
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-1">Pais</p>
               </div>
               <div class="col">{{auth('afiliadoempresa')->user()->country->name}}</div>
            </div>
            @endif
            @if(auth('afiliadoempresa')->user()->city_id )
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-0">Ciudad</p>
               </div>
               <div class="col">
                  {{auth('afiliadoempresa')->user()->cityName->name}}
               </div>
            </div>
            @else
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-0">Estado</p>
               </div>
               <div class="col">
                  <p class="font-weight-semi-bold mb-0">{{auth('afiliadoempresa')->user()->city}}</p>
               </div>
            </div>
            @endif
            <div class="row">
               <div class="col-5 col-sm-4">
                  <p class="font-weight-semi-bold mb-1">Teléfono</p>
               </div>
               <div class="col btn-outline-primary">+1-202-555-0110</div>
            </div>

         </div>
      </div>

   </div>
</div>