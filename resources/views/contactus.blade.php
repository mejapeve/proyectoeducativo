@extends('layouts.app')
@section('content')
<div class="no-gutters row" ng-controller="contactusController">
   <div class="pr-lg-2 col-lg-12">
      <div class="mb-3 card">
         <div class="card-header">
            <h5 class="mb-0">Contáctenos</h5>
         </div>
         <div class="bg-light card-body">
            <form class="" ng-submit="insertData()" name="contactusForm" novalidate>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label for="name" class="">Nombre</label>
                        <input id="name" type="text" class="form-control" ng-model="name" autofocus required="" autocomplete="off"
                               ng-class="{'form-control': true, 'is-invalid':contactusForm.name.$dirty &&  contactusForm.name.$invalid }">

                     </div>
                  </div>

               </div>
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="form-group"><label for="email" class="">Correo</label><input id="last-name" type="email" class="form-control" ng-model="insert.email"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="form-group"><label for="phone" class="">Telefono</label><input id="phone" type="text" class="form-control"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="form-group"><label for="affair" class="">Asunto</label><input id="affair" type="email" class="form-control" ></div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="form-group"><label for="message" class="">Mensanje</label><textarea id="message" type="text" class="form-control"></textarea></div>
                  </div>
                  <div class="d-flex justify-content-end col-12"><button type="submit" class="btn btn-primary" ng-disabled="contactusForm.$invalid">Enviar</button></div>
               </div>
            </form>
         </div>
      </div>
   </div>

</div>
@endsection
@section('js')
   <script src="{{asset('/../angular/controller/ContactusController.js')}}"></script>
@endsection