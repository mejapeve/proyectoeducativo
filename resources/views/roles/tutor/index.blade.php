@extends('roles.tutor.layout')

@section('content-tutor-index')
    <div class="" ng-controller="TutorProfileCtrl">
        <h5 class="mt-3">Mi perfíl</h5>
		<div class="row pl-4 pb-4 pt-4 pr-4">
			<div class="col-3">Imagen de peril</div>
			<div class="col-6"><img class="rounded-pill" src="{{asset(auth('afiliadoempresa')->user()->url_image)}}" width="60px" style="margin:-15px;"></div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Nombre</div>
			<div class="col-6">{{$tutor->name}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Apellido</div>
			<div class="col-6">{{$tutor->last_name}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Número de estudiantes registrados</div>
			<div class="col-6">{{'nombre'}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
		<h5 class="mt-3">Cuenta</h5>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-6">
				<label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Contraseña actual') }}</label>
				<div class="input-group">
					<input ID="txtPassword" type="Password" name="password1"  ng-model="tutor.password1"
						   class="form-control @error('last_name') is-invalid @enderror" value="">
					<div class="input-group-append">
						<button id="show_password" class="btn btn-primary" type="button" ng-click="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
					</div>
				</div>
			</div>
			<div class="col-6">
				<label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nueva contraseña') }}</label>
				<div class="input-group">
					<input ID="txtPassword" type="password" name="password2"  ng-model="tutor.password2"
						   class="form-control @error('last_name') is-invalid @enderror" value="">
					<div class="input-group-append">
						<button id="show_password" class="btn btn-primary" type="button" ng-click="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
					</div>
				</div>
			</div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar contraseña</button></div>
		</div>
    </div>
	<script src="{{ asset('angular/controller/TutorProfileCtrl.js') }}" defer></script>
@endsection
