@extends('roles.student.achievements_layout')

@section('achievements_layout')
<div class="row p-2 pl-md-4 pr-md-4" ng-controller="achievementsStudentCtrl" ng-init="initSequences(1)" >
	<div class="col-12 mt-sm-2 pr-sm-0 " ng-repeat="sequence in sequences">
	    <div class="oval-line"></div>
		<div class="d-flex pt-2 p-md-4">
			<img class="imagen-sequence" src="{{asset('/')}}@{{sequence.sequence.url_image}}" width="80px" height= "122px"/>
			<div class="mr-2 ml-2 d-block fs--1" style="max-width: 138px;">
				<p class="font-weight-bold mb-1">@{{ 'Guía de aprendizaje ' + ($index + 1) }}</p>
				<p class="" >@{{sequence.sequence.name}}</p>
			</div>
			<div class="d-block col-mg-4 text-align">
				<div class="col-12 border-left-mini">
					<img src="{{asset('images/icons/puntoEncuentro.png')}}" class="imagen-sequence-mini"  width="45px" height= "auto"/>
				</div>
				<div class="p-3 fs-sm--3 fs--3">Reporte por guía de aprendizaje</div>
			</div>
			<div class="d-block col-mg-4 text-align">
				<div class="col-12 border-left-mini">
					<img src="{{asset('images/icons/puntoEncuentro.png')}}" class="imagen-sequence-mini"  width="45px" height= "auto"/>
				</div>
				<div class="p-3 fs-sm--3 fs--3">Reporte por guía de aprendizaje</div>
			</div>
			<div class="d-block col-mg-4 text-align">
				<div class="col-12 border-left-mini">
					<img src="{{asset('images/icons/puntoEncuentro.png')}}" class="imagen-sequence-mini"  width="45px" height= "auto"/>
				</div>
				<div class="p-3 fs-sm--3 fs--3">Reporte por guía de aprendizaje</div>
			</div>
		</div>
    </div>
	<div class="col-12 sequences-line" ng-show="sequences.length === 0">
	   <div class="oval-line mb-4"></div>
	   <h6>Aún no cuentas con guías de aprendizaje activas.</h6>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/achievementsStudentCtrl.js')}}"></script>
@endsection
