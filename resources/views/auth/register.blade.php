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
                     <form method="POST" action="{{ route('register') }}" autocomplete='off'>
                        <div class="p-4 pl-6 mr-8 col-12 d-flex justify-content-center align-items-center row">
                           @csrf
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nombre') }}</label>
                                 <input autocomplete="off" placeholder="" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Apellido') }}</label>
                                 <input autocomplete="off" placeholder="" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="">
                                 @error('last_name')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('País donde se encuentra') }}</label>
                                 <select id="selectCountry" name="country_id" class="select2_multiple form-control @error('country') is-invalid @enderror">
                                    <option></option>
                                 </select>
                                 @error('country_id')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Ciudad') }}</label>
                                 <div ng-show="showselectCities">
                                    <select id="selectCities" name="city_id" class="select2_group form-control @error('city') is-invalid @enderror">
										<option></option>
									</select>
                                 </div>
                                 <div ng-hide="showselectCities">
                                    <input placeholder="" type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="">
                                 </div>
                                 @error('city')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Correo electrónico') }}</label>
                                 <input placeholder="" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="">
                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <div class="custom-checkbox custom-control">
                                    <input name="agreeToTerms" id="agreeToTerms" type="checkbox" class="custom-control-input">
                                    <label class="custom-control-label" for="agreeToTerms">Acepto  <a href="#!"> términos y condiciones</a></label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <input type="hidden" name="password" id="password" value="password"/>
								 <input type="hidden" name="department_id" id="department_id"  ng-model="departmentId"/>
                                 <button type="submit" class="btn btn-primary w-100" style="font-size:13px;">
                                 {{ __('Guardar registro y continuar') }}
                                 </button>
                              </div>
							  <ul>
								@if ($errors->any())
								@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
								@endif
							  </ul>
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