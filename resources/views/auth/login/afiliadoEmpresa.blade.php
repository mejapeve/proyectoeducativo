@extends('layouts.app')

@section('content')
	<div class="row">
		<div style="margin-top: 15px" class="border-top-4 col-md-6 col-sm-12 justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">{{ __('Inicio de sesion como ') }}<strong>alumno</strong></div>
					<div class="card-body">
						<form method="POST" action="{{ route('user.login','1') }}">
							@csrf

							<div class="form-group">
								<input autocomplete='off' placeholder="Usuario" name="user_name" id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required autocomplete="name" autofocus>

								@error('user_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-group">
								
								<input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-check form-group">
								<input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
								<label for="exampleCheck" class="form-check-label">Recordar datos</label>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<input type="hidden" name="company" value="{{$company->id}}"/>
									<button type="submit" class="btn btn-primary">
										{{ __('Entrar') }}
									</button>
								</div>
							</div>
							
							<div class="mt-2 custom-control">
								<label class="label"><a href="{{route('password.reset',$company->nick_name)}}">¿ Olvidó sus datos ?</a></label>
							</div>
							
						</form>
						<br>
						
					</div>
				</div>
			</div>
		</div>	
		<div style="margin-top: 15px" class="border-top-4 col-md-6 col-sm-12 justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">{{ __('Inicio de sesion como') }} <strong>tutor</strong> </div>
					<div class="card-body">
						<form method="POST" action="{{ route('user.login','3') }}">
							@csrf
							
							<div class="form-group">
								<input autocomplete='off' placeholder="Usuario" name="user_name" id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required autocomplete="name" autofocus>
								@error('correo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							
							<div class="form-check form-group">
								<input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
								<label for="exampleCheck" class="form-check-label">Recordar datos</label>
							</div>
							
							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<input type="hidden" name="company" value="{{$company->id}}"/>
									<button type="submit" class="btn btn-primary">
										{{ __('Entrar') }}
									</button>
								</div>
								
								<div class="mt-2 custom-control">
									<label class="label"><a href="{{route('password.reset',$company->nick_name)}}">¿ Olvidó sus datos ?</a></label>
								</div>

							</div>
						</form>
						<br>
						<div class="row">
							<div class="col-md-12 col-lg-12 col-sm-12 social-button-margin">
								<a href="{{ route('user.redirectfacebook',encrypt(2)) }}" class="btn btn-primary btn-block" style="margin-top: 2px">
								<div class="row">
									<div class="col-2">
										<i class="fa fa-facebook"></i> 
									</div>	
									<div class="col-10 text-left">	
									  <span>Entrar con Facebook</span>
									</div> 
								</div>
								</a>
							</div>
							<div class="col-md-12 col-lg-12 col-sm-12 social-button-margin">
								<a href="{{ route('user.redirectgmail',encrypt(2)) }}" class="btn btn-primary btn-block" style="margin-top: 2px; background-color: #dd4b39;border-color: rgb(221, 75, 57);">
								<div class="row">
									<div class="col-2">
										<i class="fa fa-google"></i>
									</div>	
									<div class="col-10 text-left">	
									  <span>Entrar con Gmail</span>
									</div> 
								</div>
								</a>
								
								 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
