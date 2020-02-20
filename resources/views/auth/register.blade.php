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
                     <div class="text-white text-center bg-card-gradient col-md-5">
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
                     </div>
                     <div class="d-flex justify-content-center align-items-center col-md-7">
                        <div class="p-4 p-md-5 flex-grow-1">
                           <h3>Registro de usuario</h3>
                           <form method="POST" action="{{ route('register') }}">
							@csrf
							
							
                              <div class="form-group">
								<label class="">{{ __('Name') }}</label>
								<input placeholder="" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="">
								@error('name')
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
                              <div class="custom-checkbox custom-control">
								<input id="customCheckTerms" type="checkbox" class="custom-control-input">
								<label class="custom-control-label" for="customCheckTerms">Acepto <a href="/authentication/card/register#!">términos</a> y <a href="/authentication/card/register#!">condiciones</a></label>
							  </div>
                              
							  <div class="form-row mt-3">
							  
							  <!--button disabled="" class="mt-3 btn btn-primary btn-block disabled">Registar</button-->
							  <button type="submit" class="btn col-12 btn-primary">
                                    {{ __('Registro') }}
                              </button>
							  </div>
                              <div class="w-100 position-relative text-center mt-4">
                                 <hr class="text-300">
                                 <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">o registrate con </div>
                              </div>
                              <div class="mb-0 form-group">
                                 <div class="no-gutters row">
                                    <div class="pr-sm-1 col-sm-6">
                                       <button to="#!" class="mt-2 btn btn-outline-google-plus btn-sm btn-block">
                                          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-plus-g" class="svg-inline--fa fa-google-plus-g fa-w-20 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="transform-origin: 0.625em 0.5em;">
                                             <g transform="translate(320 256)">
                                                <g transform="translate(0, 0)  scale(1.5, 1.5)  rotate(0 0 0)">
                                                   <path fill="currentColor" d="M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599-65.484 0-118.92 54.221-118.92 121.277 0 67.056 53.436 121.277 118.92 121.277 75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z" transform="translate(-320 -256)"></path>
                                                </g>
                                             </g>
                                          </svg>
                                          google
                                       </button>
                                    </div>
                                    <div class="pl-sm-1 col-sm-6">
                                       <button to="#!" class="mt-2 btn btn-outline-facebook btn-sm btn-block">
                                          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class="svg-inline--fa fa-facebook-square fa-w-14 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="transform-origin: 0.4375em 0.5em;">
                                             <g transform="translate(224 256)">
                                                <g transform="translate(0, 0)  scale(1.5, 1.5)  rotate(0 0 0)">
                                                   <path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z" transform="translate(-224 -256)"></path>
                                                </g>
                                             </g>
                                          </svg>
                                          facebook
                                       </button>
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
      </div>
   </div>
</section>
@endsection
