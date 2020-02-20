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
								<input placeholder="Usuario" name="email" id="email" type="email" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" required autocomplete="correo" autofocus>

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
									<button type="submit" class="btn btn-primary">
										{{ __('Entrar') }}
									</button>
								</div>
							</div>
							
							<div class="mt-2 custom-control">
								<label class="label">¿ Olvidó sus datos ?</label>
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
						<form method="POST" action="{{ route('user.login','2') }}">
							@csrf
							
							<div class="form-group">
								<input name="name" placeholder="Usuario" type="text" class="form-control">
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
									<button type="submit" class="btn btn-primary">
										{{ __('Entrar') }}
									</button>
								</div>
								
								<div class="mt-2 custom-control">
									<label class="label">¿ Olvidó sus datos ?</label>
								</div>

							</div>
						</form>
						<br>
						<div class="row">
							<div class="col-md-12 col-lg-12 col-sm-12">
								<a href="{{ route('user.redirectfacebook',encrypt(2)) }}" class="btn btn-primary btn-block" style="margin-top: 2px">
								<div class="row">
									<div class="col-2">
										<i class="fa fa-facebook"></i> 
									</div>	
									<div class="col-10 text-left">	
									  <span>Entra con Facebook</span>
									</div> 
								</div>
								</a>
							</div>
							<div class="col-md-12 col-lg-12 col-sm-12">
								<a href="{{ route('user.redirectgmail',encrypt(2)) }}" class="btn btn-primary btn-block" style="margin-top: 2px; background-color: #dd4b39;border-color: rgb(221, 75, 57);">
								<div class="row">
									<div class="col-2">
										<i class="fa fa-google"></i>
									</div>	
									<div class="col-10 text-left">	
									  <span>Entra con Gmail</span>
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
