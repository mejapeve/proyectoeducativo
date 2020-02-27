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
         <div class="card-header">{{ __('Link de recuperación de contraseña ') }}</div>
         <div class="p-4 card-body">
            <form method="POST" action="{{ route('password.email',$company) }}">
               @csrf
               <div class="form-group">
                  <input autocomplete='off' placeholder="Usuario" name="user_name" id="user_name" type="text"
                     class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}"
                     required autocomplete="name" autofocus>
                  @error('user_name')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                     <button type="submit" class="btn btn-primary">
                        {{ __('Enviar link') }}
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
      </div>
   </div>
</div>
@endsection