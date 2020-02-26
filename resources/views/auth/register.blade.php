@extends('layouts.app')
@section('content')
<section class="py-0" ng-controller="registerController">
   <div class="container-fluid">
      <div class="min-vh-100 flex-center no-gutters row">
         <div class="col-xxl-5 col-lg-8">
            <img class="bg-auth-circle-shape" src="/static/media/bg-shape.49213c49.png" alt="" width="250">
			<img class="bg-auth-circle-shape-2" src="/static/media/shape-1.e7c6d73f.png" alt="" width="150">
            <div class="overflow-hidden z-index-1 card">
               <div class="p-0 card-body">
                  <div class="h-100 no-gutters row">
                     <div class="col-md-12">
                        <div class="p-4" style="padding-bottom: 0px!important;">
                           <h6><i class="fa fas fa-arrow-right arrow-icon"></i>Registre sus datos para la creación de su cuenta</h6>
                        </div>
                     </div>
					 <form action="{{ route('register') }}" method="POST" name="registerForm" novalidate>
                        <div class="p-4 pl-6 mr-8 col-12 d-flex justify-content-center align-items-center row">
                           @csrf
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nombre') }}</label>
                                 <input ng-model="name" autofocus required="" autocomplete="off" type="text" name="name" ng-class="{'form-control': true, 'is-invalid': registerForm.name.$dirty && registerForm.name.$invalid}" value="">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
								 <span ng-show="registerForm.name.$dirty && registerForm.name.$invalid" class="invalid-feedback" role="alert">
								   <strong>Campo nombre requerido.</strong>
                                 </span>
                              </div>
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Apellido') }}</label>
                                 <input ng-model="lastName" required="" autocomplete="off" type="text" name="last_name" value=""
								 ng-class="{'form-control': true, 'is-invalid': registerForm.last_name.$dirty && registerForm.last_name.$invalid}">
                                 @error('last_name')
                                 <span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
								 <span ng-show="registerForm.last_name.$dirty && registerForm.last_name.$invalid" class="invalid-feedback" role="alert">
								   <strong>Campo apellido requerido.</strong>
                                 </span>
                              </div>
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('País donde se encuentra') }}</label>
                                 <select id="selectCountry" name="country_id"  ng-model="country_id" required
									ng-class="{'select2_multiple':true, 'form-control': true, 'is-invalid': registerForm.country_id.$dirty && registerForm.country_id.$invalid}"
									>
                                    <option></option>
									<option value="42">Colombia</option>
									<option value="@{{country.id}}" ng-repeat="country in countries">@{{country.text}}</option>
                                 </select>
								 @error('country_id')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
								 <span ng-show="registerForm.country_id.$dirty && registerForm.country_id.$invalid" class="invalid-feedback" role="alert">
								   <strong>Campo país requerido.</strong>
                                 </span>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Ciudad') }}</label>
                                 <div ng-show="showselectCity">
									<select id="selectCity" ng-model="selectCity" name="selectCity"
									ng-class="{'select2_group':true, 'form-control':true, 'is-invalid': registerForm.city.$dirty && registerForm.city.$invalid}"
									class="select2_group form-control @error('city') is-invalid @enderror">
										<option></option>
									</select>
                                 </div>
                                 <div ng-hide="showselectCity">
                                    <input ng-required="!showselectCity" ng-model="city" type="text" id="city" name="city" autocomplete="off"
									ng-class="{'form-control': true, 'is-invalid': registerForm.city.$dirty && registerForm.city.$invalid}"/>
                                 </div>
								 @error('city')
                                 <span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
								 <span ng-show="registerForm.name.$dirty && registerForm.name.$invalid" class="invalid-feedback" role="alert">
								   <strong>Campo cuidad requerido.</strong>
                                 </span>
                              </div>
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Correo electrónico') }}</label>
                                 <input autocomplete="off" requeried ng-model="email" placeholder="" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="">
                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                    <input name="agreeToTerms" type="checkbox" class="" ng-model="agreeToTerms" required="">
                                    <label class="control-label" >Acepto  <a href="#!"> términos y condiciones</a></label>
                              </div>
                              <div class="form-group">
                                 <input type="hidden" name="password" id="password" value="password"/>
								 <input ng-show="false" type="text" name="department_id" id="department_id"  ng-model="departmentId"/>
								 <input ng-show="false" type="text" name="city_id" id="city_id" ng-required="showselectCity" ng-model="city_id"/>
                                 <button type="submit" class="btn btn-primary w-100" style="font-size:13px;" ng-disabled="registerForm.$invalid">
                                 {{ __('Guardar registro y continuar') }}
                                 </button>
                              </div>
							  
								@if ($errors->any())
									<ul>
								@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</ul>
								@endif
							  <div ng-show="messageError" class="col-md-12">
								<span class="invalid-feedback btn-block" role="alert">
									<strong>@{{messageError}}</strong>
								</span>
							   </div>
                           </div>
						</div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('js')
<script src="{{asset('/../angular/controller/RegisterController.js')}}"></script>
@endsection