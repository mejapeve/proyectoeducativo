@extends('layouts.app_side')

@section('content')
<div class="row">
    <div class="m-auto border-top-4 justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Inicio de sesion como ') }}<strong>Administrador</strong></div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.login','4') }}">
                    @csrf
                    <input hidden id="company" type="text" name="company" value=1>
                    <div class="form-group">
                        <input autocomplete='off' placeholder="Usuario o correo" name="user_name" id="user_name" type="text"
                            class="form-control @error('user_name') is-invalid @enderror @error('email') is-invalid @enderror" value="{{ old('user_name') }}"
                            required autocomplete="name" autofocus>

                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input placeholder="Contraseña" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Entrar') }}
                            </button>
                        </div>
                        @if ($errors->any())
                        {{ $errors }}
                        @endif
                    </div>

                    <div class="form-group row mt-3 justify-content-center">
                        @if (Route::has('password.sendlink'))
                        <label class="label">
                            <a href="{{route('password.sendlink',[$company->nick_name,4])}}">¿ Olvidó sus datos ?</a>
                        </label>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
       var navbarH = $("#navbar").height();
    var footerH = $("#footer").height();
    var $winHeight = $(window).height();
    
    $("#content").height($winHeight-footerH-navbarH);
    

</script>
@endsection