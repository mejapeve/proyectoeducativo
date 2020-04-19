@extends('roles.tutor.layout')

@section('content-tutor-index')
    <div class="" ng-controller="TutorIndexController">
        <h5 class="mt-3">Mi perfíl</h5>
		<div class="row pl-4 pb-4 pt-4 pr-4">
			<div class="col-3">Imagen de peril</div>
			<div class="col-6"><img class="rounded-pill" src="{{asset(auth('afiliadoempresa')->user()->url_image)}}" width="60px" style="margin:-15px;"></div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Nombre</div>
			<div class="col-6">{{'nombre'}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Apellido</div>
			<div class="col-6">{{'nombre'}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Teléfono</div>
			<div class="col-6">{{'nombre'}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary">Cambiar</button></div>
		</div>
    </div>
@endsection
