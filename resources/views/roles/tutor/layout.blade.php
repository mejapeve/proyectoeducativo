@extends('layouts.app')

@section('content_layout')
	
	@include('roles/tutor/tutor_sidebar')
	<div class="content">

		@include('roles/tutor/tutor_navbar')

		<div class="row p-lg-4 p-md-3 p-sm-2 sticky-margin-top-ie">
			<div class="container">
				<div class="content">
					<div class="row">
						<div class="col-md-4">
							@include('roles/tutor/profile')
						</div>
						<div class="col-md-8">
							<div class="mb-3 card">
								<div class="card-header">
									<ul class="nav">
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" href="{{route('tutor.inscriptions','conexiones')}}">
												<i class="far fa-clipboard icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Inscripciones</small>
											</a>
										</li>
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" href="{{route('tutor.inscriptions','conexiones')}}">
												<i class="far fa-check-circle icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Productos</small>
											</a>
										</li>
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" href="{{route('tutor.inscriptions','conexiones')}}">
												<i class="fas fa-stopwatch icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Calendario</small>
											</a>
										</li>
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" href="{{route('tutor.inscriptions','conexiones')}}">
												<i class="fas fa-eye icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Reportes</small>
											</a>
										</li>
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" href="{{route('tutor.inscriptions','conexiones')}}">
												<i class="fas fa-dollar-sign icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Historial de pagos</small>
											</a>
										</li>
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" href="{{route('tutor.inscriptions','conexiones')}}">
												<i class="far fa-list-alt icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Lista de deseos</small>
											</a>
										</li>
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" href="{{route('tutor.inscriptions','conexiones')}}">
												<i class="fas fa-cog icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Conﬁguración</small>
											</a>
										</li>
										<li class="nav-item nav-item-tutor">
											<a class="avatar avatar-3xl tutor-button-head" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												<i class="fas fa-door-open icon"></i>
												<small class="fs--2 mb-1 text-700 font-weight-bold"> Salir</small>
												<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
												   @csrf
												</form>
											</a>
										</li>
									</ul>
								</div>
								<div class="bg-light card-body min_height_panel">
										@yield('content-tutor-index')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<footer>
			@include('layouts/footer')
		</footer>
	</div>
	
@endsection
