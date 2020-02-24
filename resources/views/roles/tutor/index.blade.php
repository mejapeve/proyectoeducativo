@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3 card">
                        <div class="card-header"><h5 class="mb-0">VISTA
                                TUTOR {{auth('afiliadoempresa')->user()->nombre}}</h5></div>
                        <div class="bg-light card-body">
                            <div dir="ltr"
                                 style="position: relative; text-align: left; box-sizing: border-box; padding: 0px; overflow: hidden; white-space: pre; font-family: monospace; color: rgb(248, 248, 242); background-color: rgb(40, 42, 54);">
                            </div>
                            <div class="mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item btn">Cras justo odio</li>
                                    <li class="list-group-item btn">Dapibus ac facilisis in</li>
                                    <li class="list-group-item btn">Morbi leo risus</li>
                                    <li class="list-group-item btn">Porta ac consectetur ac</li>
                                    <li class="list-group-item btn">Vestibulum at eros</li>
                                    <li class="list-group-item btn">Odio at morbi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3 card">
                        <div class="card-header"><h5 class="mb-0">VISTA ESTUDIANTE</h5></div>
                        <div class="bg-light card-body">
                            <div dir="ltr"
                                 style="position: relative; text-align: left; box-sizing: border-box; padding: 0px; overflow: hidden; white-space: pre; font-family: monospace; color: rgb(248, 248, 242); background-color: rgb(40, 42, 54);">
                            </div>
                            <p>Mi perfil</p>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center col-md-7">
                                <div class="p-4 p-md-5 flex-grow-1">
                                    <h3>Registro de alumno</h3>
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
                                            <input placeholder="" type="text" name="apellido"
                                                   class="form-control @error('apellido') is-invalid @enderror" value="">
                                            @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="">{{ __('Fecha nacimiento') }}</label>
                                            <input placeholder="" type="text" name="fecha"
                                                   class="form-control @error('fecha') is-invalid @enderror" value="">
                                            @error('fecha')
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
