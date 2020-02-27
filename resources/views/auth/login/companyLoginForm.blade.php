@extends('layouts.appCorporate')
@section('content')
<div class="flex-center min-vh-100 py-6 row">
   <div class="col-xxl-5 col-sm-11 col-md-9 col-lg-7 col-xl-6">
      
         <div class="d-flex flex-center font-weight-extra-bold fs-5 mb-4">
            <div class="avatar avatar-5xl">
               <img class="rounded-circle " src="{{ $company->url_icon }}" alt="">
            </div>
         </div>
      
      <div class="text-center card">
         <div class="card-header">{{ __('Inicio de sesion como ') }}<strong>alumno</strong></div>
         <div class="p-4 card-body">
            <form method="POST" action="{{ route('user.login','1') }}">
               @csrf
               <div class="form-group">
                  <input autocomplete='off' placeholder="Usuario" name="user_name" id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required autocomplete="name" autofocus>
                  @error('user_name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-check form-group">
                  <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                  <label for="exampleCheck" class="form-check-label">Recordar datos</label>
               </div>
               <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                     <input type="hidden" name="company" value="{{$company->id}}"/>
                     <button type="submit" class="btn btn-primary">
                     {{ __('Entrar') }}
                     </button>
                  </div>
               </div>
               <div class="mt-2 custom-control">
                  <label class="label"><a href="{{route('password.reset',$company->nick_name)}}">¿ Olvidó sus datos ?</a></label>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection