@extends('roles.student.sequences_layout')

@section('content')
    <div class="container"  ng-controller="contentSequencesStudentCtrl" ng-init="init({{auth('afiliadoempresa')->user()->company_id()}},{{$sequence->id}})">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('roles/student/timeline_sequences')
                </div>
                <div class="col-md-3 open" id="sidemenu-sequences"  >
                    <div class="mb-3 card fade show d-none d-lg-block" id="sidemenu-sequences-content">
                        @include('roles/student/sidebar_sequences')
                    </div>
                    <div class="h-75 mb-3 fade show d-none card w-10" id="sidemenu-sequences-empty">
                    </div>
                    <div class="d-none d-lg-block text-sans-serif dropdown position-absolute cursor-pointer" style="top: 91px; right:7px;" ng-click="toggleSideMenu()">
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

                        <div class="d-none-result d-none  mb-3 card background-sequence-card" w="{{$container['w']}}" h="{{$container['h']}}">
                            @if(isset($background_image))
                            <img src="{{asset($background_image)}}" class="background-sequence-image"/>
                            @endif
                            <div class="card-body pb-0">
                              @if(isset($elements))
                              @foreach($elements as $element)
                                @if($element['type'] == 'text-element' || $element['type'] == 'text-area-element')
                                   <div ng-style="{@if(isset($element['color'])) 'color': '{{$element['color']}}', @endif @if(isset($element['background_color'])) 'background-color': '{{$element['background_color']}}', @endif}" 
                                        class="@if(isset($element['class'])) $element['class'] @endif p-0 font-text card-body col-7" w="{{$element['w']}}" h="{{$element['h']}}" mt="{{$element['mt']}}" ml="{{$element['ml']}}" fs="{{$element['fs']}}">
                                    {!! $element['text'] !!}
                                   </div>
                                @endif
                                @if($element['type'] == 'image-element')
                                    <div class="z-index-1" mt="{{$element['mt']}}" ml="{{$element['ml']}}">
                                        <img src="{{asset($element['url_image'])}}" w="{{$element['w']}}" h="{{$element['h']}}"/>
                                    </div>    
                                @endif
                                @if($element['type'] == 'video-element' && isset($element['url_vimeo']))
                                   <div class="z-index-2" mt="{{$element['mt']}}" ml="{{$element['ml']}}">
                                        <iframe src="{{$element['url_vimeo']}}" w="{{$element['w']}}" h="{{$element['h']}}" frameborder="0" 
                                           webkitallowfullscreen="false" mozallowfullscreen="false" allowfullscreen="false">
                                        </iframe>
                                    </div>
                                @endif
                                @if($element['type'] == 'button-element')
                                    <button 
                                    @if(isset($element['action']))
                                      onclick="location='{{route('student.show_moment_section',
                                      [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                        'sequence_id'=>$sequence->id, 
                                        'moment_id'=>explode('|',$element['action'])[1],
                                        'order_moment_id'=>explode('|',$element['action'])[2],
                                        'section'=>explode('|',$element['action'])[3],
                                        'account_service_id'=>$account_service_id,
                                      ])}}'"
                                      conx-action="{{$element['action']}}"
                                      disabled
                                    @endif
                                      class="{{$element['class']}} cursor-pointer button-moment-validate cursor-not-allowed "
                                      ml="{{$element['ml']}}" mt="{{$element['mt']}}" w="{{$element['w']}}" h="{{$element['h']}}">
                                     {{$element['text']}}
                                    </button>
                                    <span ml="{{$element['ml']}}" mt="{{$element['mt']}}" class="not-allowed">No tiene permisos</span>
                                    
                                @endif
                              @endforeach
                              @endif
                            </div>   
                        </div>
                    </div>
                
                    <div class="mb-3 card fade show d-md-none d-sm-block" id="sidemenu-sequences-content">
                        @include('roles/student/sidebar_sequences')
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
