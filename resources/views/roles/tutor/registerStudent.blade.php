@extends('roles.tutor.profile')
@section('content-tutor-profile')
   <div class="d-flex justify-content-center align-items-center col-md-7">
      <div class="flex-grow-1">
         <h3>Registro de estudiante</h3>
         <form method="POST" action="{{ route('register_student') }}">
               @csrf
               <div class="form-group">
                  <label class="">{{ __('Nombres') }}</label>
                  <input placeholder="" type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="">{{ __('Apellidos') }}</label>
                  <input placeholder="" type="text" name="last_name"
                        class="form-control @error('last_name') is-invalid @enderror" value="">
                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="">{{ __('Fecha nacimiento') }}</label>
                  <input placeholder="" type="text" name="date_birth"
                        class="form-control @error('date_birth') is-invalid @enderror" value="">
                  @error('date_birth')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-row mt-3">

                  <!--button disabled="" class="mt-3 btn btn-primary btn-block disabled">Registar</button-->
                  <button type="submit" class="btn col-12 btn-primary">
                     {{ __('Registro') }}
                  </button>
               </div>
         </form>
      </div>
   </div>
   <br>
   <div class="list-group">
       <h3>Lista de usuarios</h3>
   <div ng-controller="TutorIndexController" ng-init="init()" >
       <a href="#" class="list-group-item list-group-item-action" ng-repeat="person in familiary"><img width="40px" height="40px" class="rounded-circle " src="{{asset('/static/media/3.cb95ae1b.jpg')}}" alt=""/>   @{{person.name}} @{{person.last_name}}</a>
   </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/TutorIndexController.js')}}"></script>
@endsection