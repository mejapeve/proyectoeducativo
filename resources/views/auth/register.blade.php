@extends('layouts.app_side')

@section('content')
<section class="py-0" ng-controller="registerController">
   <div class="container-fluid">
      <div class="flex-center no-gutters row">
         <div class="col-xxl-5 col-lg-10">
            <div class="overflow-hidden z-index-1 card">
               <div class="p-0 card-body">
                  <div class="h-100 no-gutters row">
                     <div class="col-md-12">
                        <div class="p-4" style="padding-bottom: 0px!important;">
                           <h6><i class="fa fas fa-arrow-right arrow-icon"></i>Registra tus datos para la creación de tu cuenta</h6>
                        </div>
                     </div>
                     <form action="{{ route('register') }}" method="POST" name="registerForm" novalidate>
                        <div class="p-4 pl-6 mr-8 col-12 d-flex justify-content-center align-items-center row">
                           @csrf
                           <div class="col-md-6 register-form-aling-top">
                              <div class="form-group">
                                 <label class=""><i
                                       class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nombre') }}</label>
                                 <input ng-model="name" autofocus required="" autocomplete="off" type="text" name="name"
                                    ng-class="{'form-control': true, 'is-invalid': registerForm.name.$dirty && registerForm.name.$invalid}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <span ng-show="registerForm.name.$dirty && registerForm.name.$invalid"
                                    class="invalid-feedback" role="alert">
                                    <strong>Campo nombre requerido.</strong>
                                 </span>
                              </div>
                              <div class="form-group">
                                 <label class=""><i
                                       class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Apellido') }}</label>
                                 <input ng-model="lastName" required="" autocomplete="off" type="text" name="last_name"
                                    value=""
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    ng-class="{'form-control': true, 'is-invalid': registerForm.last_name.$dirty && registerForm.last_name.$invalid}">
                                 @error('last_name')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <span ng-show="registerForm.last_name.$dirty && registerForm.last_name.$invalid"
                                    class="invalid-feedback" role="alert">
                                    <strong>Campo apellido requerido.</strong>
                                 </span>
                              </div>
                              <div class="form-group">
                                 <label class=""><i
                                       class="fa fas fa-arrow-right arrow-icon"></i>{{ __('País donde se encuentra') }}</label>
                                 <select id="selectCountry" name="country_id" ng-model="country_id" required
                                    ng-class="{'select2_multiple':true, 'form-control': true, 'is-invalid': registerForm.country_id.$dirty && registerForm.country_id.$invalid}">
                                    <option></option>
                                    <option value="42">Colombia</option>
                                    <option value="@{{country.id}}" ng-repeat="country in countries">@{{country.text}}
                                    </option>
                                 </select>
                                 @error('country_id')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <span ng-show="registerForm.country_id.$dirty && registerForm.country_id.$invalid"
                                    class="invalid-feedback" role="alert">
                                    <strong>Campo país requerido.</strong>
                                 </span>
                              </div>
                              @if(old('free_rating_plan_id') || isset($free_rating_plan_id))
                              <div class="form-group">
                                   <div class="register-band-addon">
                                      El plan gratuito se acreditará luego del registro 
                                   </div>
                              </div>
                              @endif
                              @if(old('redirect_to_shoppingcart') || isset($redirect_to_shoppingcart))
                              <div class="form-group">
                                   <div class="register-band-addon">
                                      Podrás registrar el pago de tus productos luego del registro
                                   </div>
                              </div>
                              @endif
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class=""><i
                                       class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Ciudad') }}</label>
                                 <div ng-show="showselectCity" >
                                    <select id="selectCity" ng-model="selectCity" name="selectCity"
                                       ng-class="{'select2_group':true, 'form-control':true, 'is-invalid': registerForm.city.$dirty && registerForm.city.$invalid}"
                                       class="select2_group form-control @error('city') is-invalid @enderror">
                                       <option></option>
                                    </select>
                                 </div>
                                 <div ng-hide="showselectCity">
                                    <input class="d-none-result d-none" ng-required="!showselectCity" ng-model="city" type="text" id="city"
                                       name="city" autocomplete="off"
                                       ng-class="{'form-control': true, 'is-invalid': registerForm.city.$dirty && registerForm.city.$invalid}" />
                                 </div>
                                 @error('city')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <span ng-show="registerForm.name.$dirty && registerForm.name.$invalid"
                                    class="invalid-feedback" role="alert">
                                    <strong>Campo cuidad requerido.</strong>
                                 </span>
                              </div>
                              <div class="form-group">
                                 <label class=""><i
                                       class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Correo electrónico') }}</label>
                                 <input autocomplete="off" requeried ng-model="email" placeholder="" type="email"
                                    name="email" class="form-control @error('email') is-invalid @enderror" value="">
                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <input name="agreeToTerms" type="checkbox" class="" ng-model="agreeToTerms"
                                    required="">
                                 <label class="control-label">Acepto <a ng-click="onTermsConditions()" href="#"> términos y condiciones</a></label>
                                 <p><small>La plataforma asignará un usuario y contraseña que será enviada al correo electrónico la cual podrá ser cambiada luego</small></p>
                              </div>
                              <div class="form-group">
                                 <input type="hidden" name="password" id="password" value="password" />
                                 @if(isset($free_rating_plan_id))
                                 <input class="d-none-result d-none" ng-show="false" type="text" name="free_rating_plan_id" value="{{$free_rating_plan_id}}" value="free_rating_plan_id" />
                                 @endif
                                 <input class="d-none-result d-none" ng-show="false" type="text" name="department_id" id="department_id" ng-model="departmentId" />
                                 <input class="d-none-result d-none" ng-show="false" type="text" name="city_id" id="city_id"
                                    ng-required="showselectCity" ng-model="city_id" />
                                 <button type="submit" class="btn btn-primary w-100" style="font-size:13px;"
                                    ng-disabled="registerForm.$invalid">
                                    {{ __('Guardar registro y continuar') }}
                                 </button>
                                 <div class="row">
                                    <div id="formFacebook" action="{{ route('user.redirectfacebook',encrypt(3)) }}" class="col-6 mt-2"  style="height:43px">
                                        <button type="button" class="btn btn-primary btn-block d-flex h-100" ng-click="goToFacebook()">
                                            <i class="fab fa-facebook fs-3 mr-2"></i>
                                            <span class="fs--1">Entrar con Facebook</span>
                                        </button>
                                    </div>
                                    <div id="formGmail" action="{{ route('user.redirectgmail',encrypt(3)) }}" class="col-6" style="height:43px">
                                        <button type="button" class="btn btn-primary btn-block  d-flex mt-2 h-100" 
                                        style="background-color: #dd4b39;border-color: rgb(221, 75, 57);" ng-click="goToGmail()">
                                          <i class="fab fa-google fs-2 mr-2"></i>
                                          <span class="fs--1">Entrar con Gmail</span>
                                        </button>
                                    </div>
                                 </div>
                              </div>
                              <!--
                              @if ($errors->any())
                                 <li>{{ $errors }}</li>
                              @endif
                              -->
                              <div ng-show="messageError" class="col-md-12 d-none-result d-none">
                                 <span class="invalid-feedback btn-block" role="alert">
                                    <strong>@{{messageError}}</strong>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </form>
                     <form id="goToProvider" method="GET">
                        @csrf
                        @if(old('free_rating_plan_id'))
                           <input class="d-none-result d-none" ng-show="false"  name="free_rating_plan_id" value="{{old('free_rating_plan_id')}}" value="free_rating_plan_id" />
                        @elseif(isset($free_rating_plan_id))
                           <input class="d-none-result d-none" ng-show="false"  name="free_rating_plan_id" value="{{$free_rating_plan_id}}" value="free_rating_plan_id" />
                        @endif
                        @if(old('redirect_to_shoppingcart'))
                            <input class="d-none-result d-none" ng-show="false"  type="text" name="redirect_to_shoppingcart" value="{{old('redirect_to_shoppingcart')}}" value="redirect_to_shoppingcart" />
                        @elseif(isset($redirect_to_shoppingcart))
                           <input class="d-none-result d-none" ng-show="false" type="text" name="redirect_to_shoppingcart" value="{{$redirect_to_shoppingcart}}" value="redirect_to_shoppingcart" />
                        @endif
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script id="terms" type="text/x-jQuery-tmpl">
   @include('terms-conditions')
</script>
@endsection
@section('js')
<script src="{{asset('/../angular/controller/RegisterController.js')}}"></script>

@endsection