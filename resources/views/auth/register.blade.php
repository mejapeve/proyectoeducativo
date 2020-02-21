@extends('layouts.app')

@section('content')
<section class="py-0">
   <div class="container-fluid">
      <div class="min-vh-100 flex-center no-gutters row">
         <div class="col-xxl-5 py-3 col-lg-8">
            <img class="bg-auth-circle-shape" src="/static/media/bg-shape.49213c49.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="/static/media/shape-1.e7c6d73f.png" alt="" width="150">
            <div class="overflow-hidden z-index-1 card">
               <div class="p-0 card-body">
                  <div class="h-100 no-gutters row">
                     <!--div class="text-white text-center bg-card-gradient col-md-5">
                        <div class="position-relative p-4 pt-md-5 pb-md-7">
                           <div class="bg-holder bg-auth-card-shape" style="background-image: url(&quot;/static/media/half-circle.e3156472.png&quot;);"></div>
                           <div class="z-index-1 position-relative">
                              <a class="text-white mb-4 text-sans-serif font-weight-extra-bold fs-4 d-inline-block" href="/">Conexiones</a>
                              <p class="text-100">Experiencias cientificas para conocer el mundo natural!</p>
                           </div>
                        </div>
                        <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                           <p class="pt-3">Ya tienes una cuenta?<br>
						   <a class="mt-2 px-4 btn btn-outline-light" href="{{ route('user.login') }}">Iniciar Sesión</a>
						   </p>
                        </div>
                     </div-->
					 <div class="col-md-12">
						<div class="p-4" >
                           <h6><i class="fa fas fa-arrow-right arrow-icon"></i>Registre sus datos para la creación de su cuenta</h6>
						</div>
					</div>
					<form method="POST" action="{{ route('register') }}">
						<div class="d-flex justify-content-center align-items-center col-md-12 row">
							@csrf
							<div class="col-md-4">
                           
							<!--
							
                              <div class="form-group">
								<label class="">{{ __('Usuario') }}</label>
								<input placeholder="" type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="">
								@error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
							  -->
                              <div class="form-group">
                                   <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nombre') }}</label>
                                   <input placeholder="" type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="">
                                   @error('user_name')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                              </div>
                              <div class="form-group">
                                   <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Apellido') }}</label>
                                   <input placeholder="" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="">
                                   @error('last_name')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                              </div>
							  <div class="form-group">
                                   <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('País donde se encuentra') }}</label>
                                   <input placeholder="" type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="">
                                   @error('country')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                              </div>
                              <div class="form-group">
								<label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('E-Mail Address') }}</label>
								<input placeholder="" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
                              <div class="form-row">
                                  <div class="col-12 form-group">
									<label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Password') }}</label>
									<input placeholder="" type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="">
									@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								  </div>
                                 <div class="col-12 form-group">
									<label class="">{{ __('Confirm Password') }}</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								 </div>
                              </div>
							</div>
							<div class="col-md-6">
                           
							<!--
							
                              <div class="form-group">
								<label class="">{{ __('Usuario') }}</label>
								<input placeholder="" type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="">
								@error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
							  -->
                              <div class="form-group">
                                   <label class="">{{ __('Nombre') }}</label>
                                   <input placeholder="" type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="">
                                   @error('user_name')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                              <div class="form-group">
								<label class="">{{ __('E-Mail Address') }}</label>
								<input placeholder="" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
                              <div class="form-row">
                                  <div class="col-12 form-group">
									<label class="">{{ __('Password') }}</label>
									<input placeholder="" type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="">
									@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								  </div>
                                 <div class="col-12 form-group">
									<label class="">{{ __('Confirm Password') }}</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								 </div>
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
