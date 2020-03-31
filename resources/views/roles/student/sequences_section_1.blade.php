@extends('layouts.app')

@section('content')
    <div class="container"  ng-controller="contentSequencesStudentCtrl" ng-init="init(1)">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('roles/student/timeline_sequences')
                </div>
                <div class="col-md-3 open" id="sidemenu-sequences"  >
					<div class="mb-3 card fade show" id="sidemenu-sequences-content">
						@include('roles/student/sidebar_sequences')
					</div>
					<div class="h-75 mb-3 fade show d-none card w-10" id="sidemenu-sequences-empty">
					</div>
					<div class="d-none d-md-block text-sans-serif dropdown position-absolute cursor-pointer" style="top: 91px; right:7px;" ng-click="toggleSideMenu()">
						<i class="far fa-caret-square-left" id="sidemenu-sequences-button"></i>
					</div>
                </div>
				
                <div class="col-md-9" id="content-section-sequences">
                   <div>
                        @if (isset($success))
                        <div class="fade-message alert alert-success" role="alert" id="alert1" >
                           @{{ $success }}
                           <button type="button" class="close" aria-label="Close" on-click="alert(document.getElementById('alert1'))">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        @endif
                        @if (isset($errorMessage))
                        <div class="fade-message alert alert-danger" role="alert" id="alert2" >
                           @{{ $errorMessage }}
                           <button type="button" class="close" aria-label="Close" on-click="alert(document.getElementById('alert2'))">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        @endif
                        <div ng-show="errorMessage" class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
                         <span class="col">@{{ errorMessage }}</span>
                         <span class="col-auto"><a ng-click="errorMessage = null"><i class="far fa-times-circle"></a></i></span>
                        </div>

                        <div class="mb-3 card background-sequence-card" w="895" h="569">
                            <img src="{{asset($background_image)}}" class="background-sequence-image"/>
                            <div class="card-body pb-0">
                              @if(isset($sequence))
                               <div class="font-text card-body col-7" mt="220" fs="12">
                                {!! $text1 !!}
                                </div>
                              @endif
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('angular/controller/contentSequencesStudentCtrl.js') }}" defer></script>
	<style>
		#sidemenu-sequences-button:not(.show) {
			
		}
	</style>
@endsection