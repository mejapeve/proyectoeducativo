@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                   <div ng-controller="availableSequencesStudentCtrl" ng-init="init(1)">
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

                        <div class="mb-3 card">
                            <div class="card-body">
                               <div class="justify-content-between align-items-center row">
                                    <h5 class="ml-2">Guías de aprendizaje</h5>
                               </div>
                                <div class="d-none-result d-none position-relative card-body pr-1 row">
                                   <div class="mt-3 col-lg-2 col-md-4 col-sm-12" ng-repeat="sequence in sequences">
                                    <img width="120px" height="120px" src="{{asset('/')}}@{{sequence.url_image}}" />
                                    <a class="ml-2 mt-2 btn btn-outline-primary fs--2"
                                    href="{{Request::server(env('APP_URL')).'/'.auth('afiliadoempresa')->user()->company_name()}}/student/secuencia/@{{sequence.id}}/situacion_generadora"
                                     class="col-6">Explorar</a>
                                   </div>
                                </div>
                                
                                <div class="p-3 border-lg-y col-lg-2 w-100" style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-show="sequences === null">
                                  cargando...
                               </div>
                               <div class="d-none-result d-none  p-3 border-lg-y col-lg-2 w-100" style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-show="sequences.length === 0">
                                  No se encontraron secuencias ...
                               </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('angular/controller/availableSequencesStudentCtrl.js') }}" defer></script>
@endsection
