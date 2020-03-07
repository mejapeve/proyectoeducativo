<div class="col-md-4">
	<div class="mb-3 card">
		<div class="card-header"><h5 class="mb-0">VISTA ADMINISTRADOR {{auth('afiliadoempresa')->user()->name}} @{{ userInformation.variable }}</h5></div>
		<div class="bg-light card-body">
			
			<div class="mb-3">
				<ul class="list-group">
					<li class="list-group-item btn"><a href="{{route('fileupload')}}">Carga masiva</a></li>
					<li class="list-group-item btn"><a href="{{route('fileuploadlogs')}}">Lista carga masiva</a></li>
					<li class="list-group-item btn">Lista carga masiva</li>
					<li class="list-group-item btn">Morbi leo risus</li>
					<li class="list-group-item btn">Porta ac consectetur ac</li>
					<li class="list-group-item btn">Vestibulum at eros</li>
					<li class="list-group-item btn">Odio at morbi</li>
				</ul>
			</div>
		</div>
	</div>
</div>
