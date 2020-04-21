@extends('roles.student.sequences_layout')

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
                              @if(isset($button1_w))
                              <button onclick="location='{{route('student.show_moment_section',
                                  [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                    'sequence_id'=>$sequence->id, 
                                    'order_moment_id'=>1,
                                    'section'=>1,
                                    'account_service_id'=>$account_service_id
                                  ])}}'"
                              class="cursor-pointer" ml="{{$button1_ml}}" mt="{{$button1_mt}}" w="{{$button1_w}}" h="{{$button1_h}}">button1</button>
                              @endif
                              @if(isset($button2_w))
                                  <button 
                              onclick="location='{{route('student.show_moment_section',
                              [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                'sequence_id'=>$sequence->id, 
                                'order_moment_id'=>2,
                                'section'=>1,
                                'account_service_id'=>$account_service_id
                              ])}}'"
                              class="cursor-pointer " ml="{{$button2_ml}}" mt="{{$button2_mt}}" w="{{$button2_w}}" h="{{$button2_h}}">button2</button>
                              @endif
                              @if(isset($button3_w))
                                  <button class="cursor-pointer " 
                              onclick="location='{{route('student.show_moment_section',
                              [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                'sequence_id'=>$sequence->id, 
                                'order_moment_id'=>3,
                                'section'=>1,
                                'account_service_id'=>$account_service_id
                              ])}}'"
                              ml="{{$button3_ml}}" mt="{{$button3_mt}}" w="{{$button3_w}}" h="{{$button3_h}}">button3</button>
                              @endif
                              @if(isset($button4_w))
                                  <button class="cursor-pointer " 
                              onclick="location='{{route('student.show_moment_section',
                              [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                'sequence_id'=>$sequence->id, 
                                'order_moment_id'=>4,
                                'section'=>1,
                                'account_service_id'=>$account_service_id
                              ])}}'"
                              ml="{{$button4_ml}}" mt="{{$button4_mt}}" w="{{$button4_w}}" h="{{$button4_h}}">button4</button>
                              @endif
                              @if(isset($button5_w))
                                  <button class="cursor-pointer " 
                              onclick="location='{{route('student.show_moment_section',
                              [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                'sequence_id'=>$sequence->id, 
                                'order_moment_id'=>5,
                                'section'=>1,
                                'account_service_id'=>$account_service_id
                              ])}}'"
                              ml="{{$button5_ml}}" mt="{{$button5_mt}}" w="{{$button5_w}}" h="{{$button5_h}}">button5</button>
                              @endif
                              @if(isset($button6_w))
                                  <button class="cursor-pointer " 
                              onclick="location='{{route('student.show_moment_section',
                              [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                'sequence_id'=>$sequence->id, 
                                'order_moment_id'=>6,
                                'section'=>1,
                                'account_service_id'=>$account_service_id
                              ])}}'"
                              ml="{{$button6_ml}}" mt="{{$button6_mt}}" w="{{$button6_w}}" h="{{$button6_h}}">button6</button>
                              @endif
                              @if(isset($button7_w))
                                  <button class="cursor-pointer " 
                              onclick="location='{{route('student.show_moment_section',
                              [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                'sequence_id'=>$sequence->id, 
                                'order_moment_id'=>7,
                                'section'=>1,
                                'account_service_id'=>$account_service_id
                              ])}}'"
                              ml="{{$button7_ml}}" mt="{{$button7_mt}}" w="{{$button7_w}}" h="{{$button7_h}}">button7</button>
                              @endif
                              @if(isset($button8_w))
                                  <button class="cursor-pointer " 
                              onclick="location='{{route('student.show_moment_section',
                              [ 'empresa'=>auth('afiliadoempresa')->user()->company_name(), 
                                'sequence_id'=>$sequence->id, 
                                'order_moment_id'=>8,
                                'section'=>1,
                                'account_service_id'=>$account_service_id
                              ])}}'"
                              ml="{{$button8_ml}}" mt="{{$button8_mt}}" w="{{$button8_w}}" h="{{$button8_h}}">button8</button>
                              @endif

                              @if(isset($text1))
                               <div class="font-text card-body col-7" mt="180" fs="12">
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