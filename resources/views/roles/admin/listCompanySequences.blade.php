@extends('layouts.app_side')

@section('content')
<div class="container">
    <div class="content">
        <div class="row">
            @include('roles.admin.sidebar')
            <div class="col-md-8" ng-controller="editCompanySequencesCtrl">
                <div class="mb-3 card">
                    <div class="card-header">
                        <h5 class="">Diseño de guias de aprendizaje</h5>
                    </div>
                    <div class="bg-light card-body">
					   @if(isset($sequences))
					   @foreach($sequences as $sequence)
                        <div class="p-3 d-flex">
							<div class="">
								<img src="{{ asset($sequence->url_image) }}" width="60px"/>
							</div>
							<div class="col-3 ml-3 fs--1">
							  {{ $sequence->name }}
							</div>
							<div class="col-4 fs--2">
							  {{ $sequence->description }}
							</div>
							<div class="col-1">
							  <button class="btn btn-sm btn-outline-primary" onclick="location='/conexiones/admin/sequences_get/{{ $sequence->id }}'">Editar</button>
							</div>
                        </div>
						@endforeach
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('/../angular/controller/editCompanySequencesCtrl.js')}}"></script>
@endsection
