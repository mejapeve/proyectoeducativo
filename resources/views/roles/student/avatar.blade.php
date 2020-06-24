@extends('roles.student.layout')

@section('content')
    <div class="container ">
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
                                 <h6>Antes de iniciar la ruta de aprendizaje, te invitamos a que personalices tu imagen</h6>
                              </div>
                              <div class="col-auto">
                                 @if(!auth('afiliadoempresa')->user()->url_image)
                                 <button class="mr-2 btn btn-outline-primary btn-sm" ng-click="onSaveAvatarDefault()">Omitir</button>
                                 @endif
                                 <button ng-disabled="!customImage && !avatar"
                                 class="mr-2 btn btn-falcon-default btn-sm" ng-click="onSaveAvatar()">Guardar</button>
                                 <form action="{{route('update_avatar',auth('afiliadoempresa')->user()->company_name())}}" method="POST" id="save-avatar-form">
                                    @csrf
                                    <input type="hidden" id="url_image" name="url_image" ng-value="urlImage"/>
                                    <input type="hidden" id="custom_image" name="custom_image" ng-value="customImage"/>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="mb-3 overflow-hidden card" style="min-width: 12rem;">
                        <div class="p-3 border-lg-y col-lg-2 w-100 loading"
                           style="min-height: 23vw; border: 0.4px solid grey; min-width: 100%" ng-hide="kits.length > 0">
                           cargando...
                        </div>
                        <div class="position-relative card-body pr-1 d-result d-none ">
                           <h6> Puedes crear tu propio avatar o elegir uno</h6>
                           <div class="row mt-3">
                              <div class="col-3 col-md-4">
                                 <img ng-repeat="avatar in avatars" class="shadow-sm avatar-default rounded-circle" src="@{{avatar.urlImage}}" ng-click="setAvatar(avatar)" >
                              </div>
                              <div class="col-7 col-md-5 col-lg-4">
                                 <div ng-show="avatar" style="width: 75%;">
                                    <img class="shadow-sm rounded-circle" width="100%" height="auto" src="@{{avatar.urlImage}}">
                                    <h6 class="text-align mt-2">@{{avatar.name}}</h6>
                                    <h5 class="text-align mt-2">@{{avatar.job}}</h5>
                                 </div>
                                 <canvas ng-hide="avatar" class="" width="272" height="300" id="canvas">No Canvas support</canvas>
                              </div>
                              <div class="col-2 col-md-3 col-lg-4"  class="card-body">
                                 <div id="menu">
                                    <div class="mb-3">
                                       <img width="65px" height="65px" src="{{asset('images/avatars/icons/cara.png')}}" class="tab-avatar btn btn-falcon-primary pl-2 pr-2" data-tab="skin"/>
                                       <img width="65px" height="65px" src="{{asset('images/avatars/icons/rasgo.png')}}" class="tab-avatar btn btn-falcon-primary pl-2 pr-2" data-tab="features"/>
                                       <img width="65px" height="65px" src="{{asset('images/avatars/icons/cabello.png')}}" class="tab-avatar btn btn-falcon-primary pl-2 pr-2" data-tab="hair"/>
                                       <img width="65px" height="65px" src="{{asset('images/avatars/icons/accesorio11.png')}}" class="tab-avatar btn btn-falcon-primary p-2 pt-3 pb-3" data-tab="accessories1"/>
                                       <img width="65px" height="65px" src="{{asset('images/avatars/icons/accesorio2.png')}}" class="tab-avatar btn btn-falcon-primary p-2 pt-3 pb-3" data-tab="accessories2"/>
                                    </div>
                                 </div>
                                 <div id="avatar">
                                    <div id="skin"  data-top="45" data-left="0" data-width="262" data-height="223" >
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer activo seleccionado" src="{{ asset('images/avatars/cara/1-01.png')}}" data-ears="165" data-mouth    ="88" data-hair="165" />
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cara/2-02.png')}}" data-ears="135" data-mouth="88" data-hair="165"/>
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cara/3-03.png')}}" data-ears="150" data-mouth="88" data-hair="165"/>
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cara/4-04.png')}}" data-ears="145" data-mouth="88" data-hair="165"/>
                                    </div>
                                    <div id="features" class="d-none" data-top="100" data-left="90" data-width="123" data-height="117">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/1.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/2.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/3.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/4.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/5.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/6.png')}}"   data-left="75" data-top="90">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/7.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/8.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/9.png')}}">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/10.png')}}"  data-top="110" data-left="82" data-width="113" data-height="110">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/11.png')}}"  data-top="105" data-left="76" data-width="123" data-height="117">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/rasgos/12.png')}}">
                                    </div>
                                    <div id="hair" class="d-none">
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cabello/1.png')}}" data-top="0" data-left="35" data-width="206" data-height="114">
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cabello/2.png')}}" data-top="20" data-left="45" data-width="180" data-height="100">
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cabello/3.png')}}" data-top="0" data-left="35" data-width="206" data-height="114">
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cabello/4.png')}}" data-top="9" data-left="0" data-width="225" data-height="114">
                                       <img width="65px" height="65px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cabello/5.png')}}" data-top="3" data-left="0" data-width="260" data-height="260" data-ears="165" >
                                       <img width="65px" height="95px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/cabello/6.png')}}" data-top="0" data-left="10" data-width="249" data-height="384">
                                    </div>
                                    <div id="accessories1" class="d-none">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorio_cara/5-15.png')}}"  data-top="-0" data-left="45" data-width="170" data-height="72"/>
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorio_cara/6-16.png')}}"  data-top="-5" data-left="25" data-width="209" data-height="89"/>
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorio_cara/7-17.png')}}"  data-top="-5" data-left="30" data-width="209" data-height="86"/>
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorio_cara/8-18.png')}}"  data-top="-5" data-left="40" data-width="190" data-height="66"/>
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorio_cara/eraser.png')}}"/>
                                    </div>
                                    <div id="accessories2" class="d-none">
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorios_cabeza/1-11.png')}}"  data-width="223" data-height="132" data-top="10" data-left="20"/>
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorios_cabeza/2-12.png')}}"  data-width="223" data-height="132" data-top="0" data-left="40" />
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorios_cabeza/3-13.png')}}"  data-width="228" data-height="145" data-top="0" data-left="25"/>
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorios_cabeza/4-14.png')}}"  data-width="178" data-height="105" data-top="10" data-left="45"/>
                                       <img width="65px" height="55px" class="img-thumbnail cursor-pointer" src="{{ asset('images/avatars/accesorios_cabeza/eraser.png')}}"/>
                                    </div>
                                 </div>
                                 <!--input type="hidden" id="colores" class="card" _data-colores="#a1a1a1,#FDF2E9,#EBF5FB,#F7DC6F,#F2CFAF"/-->
                              </div>
                           </div>
                        </div>
                     </div>
                </div>
                <style>
                    .avatar-default {
                        max-width: 85px;
                        margin: 4px;
                        cursor: pointer;
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

