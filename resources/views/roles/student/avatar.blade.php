@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                   <div ng-controller="avatarStudentCtrl" ng-init="init()">
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

                    <div class="mb-3 card">
                        <div class="card-body">
                           <div class="justify-content-between align-items-center row">
                              <div class="col-md">
                                 <h5 class="mb-2 mb-md-0">Crear Avatar</h5>
                              </div>
                              <div class="col-auto">
                                 <button ng-disabled="!customImage && !urlImage"
                                 class="mr-2 btn btn-falcon-default btn-sm" ng-click="onSaveAvatar()">Guardar</button>
                                 <form action="{{route('update_avatar',auth('afiliadoempresa')->user()->company_name())}}" method="POST" id="save-avatar-form">
                                    @csrf
                                    <input type="hidden" name="url_image" ng-value="urlImage"/>
                                    <input type="hidden" id="custom_image" name="custom_image" ng-value="customImage"/>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="mb-3 overflow-hidden card" style="min-width: 12rem;">
                        <div class="bg-holder bg-card bg-holder-blue">
                        </div>
                        <div class="position-relative card-body pr-1">
                           <h6> Puedes crear tu propio avatar o elegir uno</h6>
                           <div class="row mt-3">
                              <div class="col-4">
                                 <img class="shadow-sm avatar-default rounded-circle" src="{{asset('images/avatars/avatar-default/avatar1.png')}}" ng-click="setAvatar('images/avatars/avatar-default/avatar1.png')" >
                                 <img class="shadow-sm avatar-default rounded-circle" src="{{asset('images/avatars/avatar-default/avatar2.png')}}" ng-click="setAvatar('images/avatars/avatar-default/avatar2.png')" >
                                 <img class="shadow-sm avatar-default rounded-circle" src="{{asset('images/avatars/avatar-default/avatar3.png')}}" ng-click="setAvatar('images/avatars/avatar-default/avatar3.png')" >
								 <img class="shadow-sm avatar-default rounded-circle" src="{{asset('images/avatars/avatar-default/avatar4.png')}}" ng-click="setAvatar('images/avatars/avatar-default/avatar4.png')" >
                              </div>
                              <div class="col-4">
                                 <img id="avatar-selected" class="d-none shadow-sm rounded-circle" src="{{ asset('images/avatars/default/avatar-default-3.png') }}">
                                 <canvas class="" width="263" height="300" id="canvas">No Canvas support</canvas>
                              </div>
                              <div class="col-4"  class="card-body">
                                 <div id="menu">
                                    <div class="mb-3">
                                       <img width="54px" height="50px" src="{{asset('images/avatars/icons/cara-01.png')}}" class="tab-avatar btn btn-falcon-primary pl-2 pr-2" data-tab="skin"/>
                                       <img width="54px" height="50px" src="{{asset('images/avatars/icons/rasgos-01.png')}}" class="tab-avatar btn btn-falcon-primary pl-2 pr-2" data-tab="features"/>
                                       <img width="54px" height="50px" src="{{asset('images/avatars/icons/cabello-01.png')}}" class="tab-avatar btn btn-falcon-primary pl-2 pr-2" data-tab="hair"/>
                                       <img width="54px" height="50px" src="{{asset('images/avatars/icons/accesorios-01.png')}}" class="tab-avatar btn btn-falcon-primary p-2 pt-3 pb-3" data-tab="accessories"/>
                                    </div>
                                 </div>
                                 <div id="avatar">
                                    <div id="skin" data-top="70" data-left="0" data-width="250" data-height="500">
                                       <img width="65px" style="height:55px;" class="img-thumbnail activo seleccionado" src="{{ asset('images/avatars/skins/1-01.png')}}" style="cursor: pointer;">
                                       <img width="65px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/skins/2-02.png')}}" style="cursor: pointer;">
                                       <img width="65px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/skins/3-03.png')}}" style="cursor: pointer;">
                                       <img width="65px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/skins/4-04.png')}}" style="cursor: pointer;">
                                    </div>
                                    <div id="features" data-top="140" data-left="68" data-width="120" data-height="125" class="d-none">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/1-18.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/2-19.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/3-20.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/4-21.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/5-22.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/6-23.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/7-24.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/8-25.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/9-26.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/10-27.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/11-28.png')}}" style="cursor: pointer;">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/fatures/12-29.png')}}" style="cursor: pointer;">
                                    </div>
                                    <div id="hair" class="d-none">
                                       <img width="55px" style="height:60px;" class="img-thumbnail" src="{{ asset('images/avatars/hair/1-05.png')}}" style="cursor: pointer;" data-top="30" data-left="15" data-width="252" data-height="550">
                                       <img width="55px" style="height:55px;" class="img-thumbnail" src="{{ asset('images/avatars/hair/2-06.png')}}" style="cursor: pointer;" data-top="35" data-left="0" data-width="252" data-height="550">
                                       <img width="55px" style="height:45px;" class="img-thumbnail" src="{{ asset('images/avatars/hair/3-07.png')}}" style="cursor: pointer;" data-top="30" data-left="15" data-width="212" data-height="250">
                                       <img width="55px" style="height:45px;" class="img-thumbnail" src="{{ asset('images/avatars/hair/4-08.png')}}" style="cursor: pointer;" data-top="30" data-left="25" data-width="200" data-height="250">
                                       <img width="55px" style="height:45px;" class="img-thumbnail" src="{{ asset('images/avatars/hair/5-09.png')}}" style="cursor: pointer;" data-top="40" data-left="0" data-width="218" data-height="250">
                                       <img width="55px" style="height:45px;" class="img-thumbnail" src="{{ asset('images/avatars/hair/6-10.png')}}" style="cursor: pointer;" data-top="30" data-left="20" data-width="212" data-height="250">
                                    </div>
                                    <div id="accessories" class="d-none">
                                       <img width="55px" height="35px" class="img-thumbnail" src="{{ asset('images/avatars/accessories/1-11.png')}}" style="cursor: pointer;" data-top="32" data-left="17" data-width="212" data-height="250"> 
                                       <img width="55px" height="35px" class="img-thumbnail" src="{{ asset('images/avatars/accessories/2-12.png')}}" style="cursor: pointer;" data-top="32" data-left="17" data-width="212" data-height="250">
                                       <img width="55px" height="35px" class="img-thumbnail" src="{{ asset('images/avatars/accessories/3-13.png')}}" style="cursor: pointer;" data-top="28" data-left="35" data-width="180" data-height="210">
                                       <img width="55px" height="35px" class="img-thumbnail" src="{{ asset('images/avatars/accessories/4-14.png')}}" style="cursor: pointer;" data-top="22" data-left="17" data-width="212" data-height="250">
                                       <img width="55px" height="35px" class="img-thumbnail" src="{{ asset('images/avatars/accessories/5-15.png')}}" style="cursor: pointer;"  data-top="120" data-left="50" data-width="150" data-height="120" >
                                       <img width="55px" height="35px" class="img-thumbnail" src="{{ asset('images/avatars/accessories/6-16.png')}}" style="cursor: pointer;"  data-top="120" data-left="50" data-width="150" data-height="120" >
                                       <img width="55px" height="35px" class="img-thumbnail" src="{{ asset('images/avatars/accessories/7-17.png')}}" style="cursor: pointer;"  data-top="120" data-left="50" data-width="150" data-height="120" >
                                    </div>
                                 </div>
                                 <input type="hidden" id="colores" class="card" _data-colores="#a1a1a1,#FDF2E9,#EBF5FB,#F7DC6F,#F2CFAF"/>
                              </div>
                           </div>
                        </div>
                     </div>
                </div>
                <style>
                    .avatar-default {
                        max-width: 54px;
                        margin: 4px;
                        border-radius: 39%!important;
                    }
                    #avatar-selected {
                        border-radius: 39%!important;
                    }
                    #colors li:first-child {
                        margin-top: 10px;
                    }
                    #colors {
                        padding-left: 20px!important;
                    }
                </style>

                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('angular/controller/avatarStudentCtrl.js') }}" defer></script>
@endsection

