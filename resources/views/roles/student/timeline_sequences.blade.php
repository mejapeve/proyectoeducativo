<style>
	.svgelem{
		position: relative;
		left: 0%;
		-webkit-transform: translateX(30%);
		-ms-transform: translateX(30%);
		transform: translateX(20%);
		transform: translateY(20%);
	}
	.svgelem2{
		position: relative;
		left: 0%;
		-webkit-transform: translateX(-100%);
		-ms-transform: translateX(-100%);
		transform: translateX(-100%);
		transform: translateY(80%);
	}
</style>
<div ng-controller="contentSequencesStudentCtrl" ng-init="init(1)">
	<div ng-show="errorMessage" class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
	 <span class="col">@{{ errorMessage }}</span>
	 <span class="col-auto"><a ng-click="errorMessage = null"><i class="far fa-times-circle"></i></a></span>
	</div>
	<div class="mb-3 card">
		<div class="card-body row">
			<div class="col-md-1 col-sm-12" >
				<img style="width:70px" class="shadow-sm avatar-default rounded-circle" src="{{ asset('images/avatars/avatar-default/avatar1.png') }}" alt="Chania">
			</div>

			<div ng-controller="timelineSequencesStudentCtrl" ng-init="init()" class="col-md-11 col-sm-12">
				@for($j = 1; $j < 9 ; $j++)
					@for($i = 1; $i < 5 ; $i++)
						<svg class="svgelem2" width="12" height="40px" style="margin-right: -22px">
							<rect width="12" height="1" style="fill:rgb(0,0,255);stroke-width:0.5;stroke:rgb(0,0,0)" />
						</svg>
						<svg class="svgelem"  width="100px" height="40px" style="margin-right:-73px" xmlns="http://www.w3.org/2000/svg">
							<circle id="circle{{$j}}{{$i+4}}" cx="25" cy="25" r="7" fill="#f1f1f1" stroke="green"
									stroke-width="2%"/>
						</svg>
					@endfor
					<svg class="svgelem2" width="12px" height="40px" style="margin-right: -22px">
						<rect width="35" height="1" style="fill:rgb(0,0,255);stroke-width:0.5;stroke:rgb(0,0,0)" />
					</svg>
					<svg class="svgelem" width="100px" height="45px"  xmlns="http://www.w3.org/2000/svg" style="margin-right: -68px;">
						<polygon id="star{{$j}}" points="25,2.5 10,45 47.2,15 2.5,15 40,45" fill="#f1f1f1"/>
						<text x="50%" y="50%" text-anchor="middle" stroke="#51c5cf" stroke-width="1.5px" dy=".5em" dx="-1.6em" style="text-anchor: middle;">{{$j}}</text>
					</svg>
				@endfor
			</div>
		</div>   
	</div>
</div>
@section('js')
    <script src="{{ asset('angular/controller/timelineSequencesStudentCtrl.js') }}" defer></script>
@endsection