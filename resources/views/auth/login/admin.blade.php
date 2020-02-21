
@extends('layouts.app')

@section('content')
    <style>

        /* Add a hover effect if you want */
        .fa:hover {
            opacity: 0.3;
        }

        /* Set a specific color for each brand */

        /* Facebook */
        .fa-facebook {
            /*background: #3B5998;*/
            color: white;
        }
    </style>
    <div class="">
        <div class="row">
            <div style="margin-top: 15px" class="border-top-4 col-md-4 col-sm-12 justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Inicio de sesion como ') }}<strong>Administrador</strong></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.login','4') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                    <div class="col-md-6">
                                        <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Iniciar sesion') }}
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </form>
                            <br>
                            <div class="row text-center">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <a href="{{ route('user.redirectfacebook',encrypt(4)) }}" class="btn btn-primary btn-block" style="margin-top: 2px"><i class="fa fa-facebook"></i> Inicio sesion con Facebook</a>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <a href="{{ route('user.redirectgmail',encrypt(4)) }}" class="btn btn-primary btn-block" style="margin-top: 2px; background-color: #dd4b39;border-color: rgb(221, 75, 57);"><i class="fa fa-google"></i> Inicio sesion con Gmail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
