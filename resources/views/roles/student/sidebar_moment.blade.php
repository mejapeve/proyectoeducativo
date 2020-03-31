<div class="pr-2 bg-light d-flex justify-content-between card-header">
	@isset($moment)
	<h5 class="w-100 mb-0 inline-block">Momento {{$moment->id}}</h5>
	<p>
	<h6 class="w-100 mb-0">{{$moment->name}}</h6>
	@endif
</div>
<div class="card-body">
@if(isset($moment))
	<div class="mb-3 fs--1 text-justify">
		<span><strong>Los invitamos a:</strong></span>
		@if ($moment->description != "")
		<ul class="navbar-nav flex-column">
		  @foreach(explode('|', $moment->description) as $obj) 
			<li class="nav-item list-style-inside">
				<span>{{$obj}}</span>
			</li>
		  @endforeach
		</ul> 
		@endif
	</div>
	<nav class="pr-sm-6 pl-sm-6 pr-md-2 pl-md-2 pr-lg-3 pl-lg-3 fs--2 font-weight-semi-bold row navbar text-center">
		<a class="cursor-pointer" href="{{route('student.sequences_section_1',['empresa'=>auth('afiliadoempresa')->user()->company_name(), 'sequence_id' => $sequence_id])}}">
			<img src="{{asset('/images/icons/situacionGeneradora_Mesa de trabajo 1.png')}}" height= "auto" width="50px">
			<span class="d-flex" style="top: 69px;width: 45px;">Situación Generadora</span>
		</a>
		<a class="cursor-pointer" href="{{route('student.sequences_section_2',['empresa'=>auth('afiliadoempresa')->user()->company_name(), 'sequence_id' => $sequence_id])}}">
			<img src="{{asset('/images/icons/rutaViaje_Mesa de trabajo 1.png')}}" height= "auto" width="50px">
			<span class="d-flex" style="top: 69px;width: 45px;">Mapa de ruta</span>
		</a>
		<div class="cursor-pointer mt-md-2">
			<img src="{{asset('/images/icons/iconoGuiaSaberes_Mesa de trabajo 1.png')}}" height= "auto" width="50px">
			<span class="d-flex" style="top: 69px;width: 45px;">Guía de saberes</span>
		</div>
		<div class="cursor-pointer mt-md-2">
			<img src="{{asset('/images/icons/puntoEncuentro_Mesa de trabajo 1.png')}}" height= "auto" width="50px">
			<span class="d-flex" style="top: 69px;width: 45px;">Punto de encuentro</span>
		</div>
	</nav>

	<div class="fs--2 font-weight-semi-bold">
		<a class="cursor-pointer d-flex" href="{{route('student.sequences_section_1',['empresa'=>auth('afiliadoempresa')->user()->company_name(), 'sequence_id' => $sequence_id])}}">
			<img src="{{asset('/images/icons/iconoPreguntaCentral.png')}}" height= "auto" width="50px">
			<h6 class="ml-3 mb-auto mt-auto">Pregunta central:<small>&nbsp;{{$title}}</small></h6>
		</a>
		<a class="cursor-pointer d-flex" href="{{route('student.sequences_section_2',['empresa'=>auth('afiliadoempresa')->user()->company_name(), 'sequence_id' => $sequence_id])}}">
			<img src="{{asset('/images/icons/iconoCienciasCotidiana.png')}}" height= "auto" width="50px">
			<h6 class="ml-3 mb-auto mt-auto">Ciencia en contexto:<small>&nbsp;Un vistazo a diversas creaciones </small></h6>
		</a>
		<div class="cursor-pointer mt-md-2">
			<img src="{{asset('/images/icons/iconoGuiaSaberes_Mesa de trabajo 1.png')}}" height= "auto" width="50px">
			<span class="d-flex" style="top: 69px;width: 45px;">Guía de saberes</span>
		</div>
		<div class="cursor-pointer mt-md-2">
			<img src="{{asset('/images/icons/puntoEncuentro_Mesa de trabajo 1.png')}}" height= "auto" width="50px">
			<span class="d-flex" style="top: 69px;width: 45px;">Punto de encuentro</span>
		</div>
	</div>

@endif
</div>
