@extends('layouts.app_side')

@section('content')
<div class="container">
    <div class="content">
        <div class="row">
            @include('roles.admin.sidebar')
            <div class="col-md-8" ng-controller="listCompanySequencesCtrl">
                <div class="mb-3 card">
                    <div class="card-header d-flex ">
                        <div class="">Diseño de guias de aprendizaje</div>
                        <div class="mt-1 justify-content-end ml-auto">
                            <button class="btn btn-sm btn-outline-primary" ng-click="newSequence()">
                            <span class="fs-lg-0 fs-md-0 fs-sm--1"><i class="fas fa-plus"></i> Nueva</span>
                            </button>
                        </div>
                    </div>
                    <div class="bg-light card-body">
					   @if(isset($sequences))
					   @foreach($sequences as $sequence)
                        <div class="p-3 d-flex">
							<div class="">
                                @if($sequence->url_image)
                                <img src="{{ asset($sequence->url_image)  }}" width="60px"/>
                                @else
                                <img src="{{ asset('images/icons/NoImageAvailable.jpeg')  }}" width="60px"/>
                                @endif
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
<script src="{{asset('/../angular/controller/listCompanySequencesCtrl.js')}}"></script>
@endsection
