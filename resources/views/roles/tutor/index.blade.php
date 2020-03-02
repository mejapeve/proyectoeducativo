@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="TutorIndexController">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    @include('roles/tutor/sidebar')
                </div>
                <div class="col-md-8">
                    <div class="mb-3 card">
                        <div class="card-header">
							<div class="mb-3">
							<ul class="nav">
							<li class="nav-item nav-item-tutor mb-3">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Inscripciones</small></a>
								 </p>
							  </div>
							</li>
							
							<li class="nav-item nav-item-tutor">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Productos</small></a>
								 </p>
							  </div>
							</li>
							
							
							<li class="nav-item nav-item-tutor">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Calendario</small></a>
								 </p>
							  </div>
							</li>
							
							
							
							
							<li class="nav-item nav-item-tutor">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Calendario</small></a>
								 </p>
							  </div>
							</li>
							
							<li class="nav-item nav-item-tutor">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Historial de pagos</small></a>
								 </p>
							  </div>
							</li>
							
							<li class="nav-item nav-item-tutor">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Lista de deseos</small></a>
								 </p>
							  </div>
							</li>
							<li class="nav-item nav-item-tutor">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Configuración</small></a>
								 </p>
							  </div>
							</li>
							<li class="nav-item nav-item-tutor">
								<div class="avatar avatar-3xl">
								 <a href="/pages/profile">
									<img class="rounded-circle mb-3 shadow-sm" src="http://localhost:8000/images/welcome/thumbnail/2.47d043fe.svg" alt="">
								 </a>
								 <p class="fs--2 mb-1">
									<a class="text-700" href="/pages/people#!"><small class="font-weight-bold"> Salir</small></a>
								 </p>
							  </div>
							</li>
							
							</ul></div>
						
						</div>
                        <div class="bg-light card-body">
                                @yield('content-tutor-index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
