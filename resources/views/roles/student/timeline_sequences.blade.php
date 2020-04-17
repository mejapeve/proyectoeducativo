<style>
	.svgelem{
		position: relative;
		left: 0%;
		-webkit-transform: translateX(30%);
		-ms-transform: translateX(30%);
		/*transform: translateX(20%);*/
		transform: translateY(-20%);
	}
	.svgelem2{
		position: relative;
		left: 0%;
		-webkit-transform: translateX(-100%);
		-ms-transform: translateX(-100%);
		/*transform: translateX(-100%);*/
		transform: translateY(40%);
	}
	
	.avatarTimeLine {
		position: absolute;
			top: 22px;
			left: 79px;
			background-color: black;
			color: white;
			width: 126px;
			height: 23px;
			padding-top: 2px;
			padding-left: 10px;
			border-radius: 0 12px 12px;
			z-index: 1;

	}
</style>
<div ng-controller="contentSequencesStudentCtrl" ng-init="init(1)">
	<div ng-show="errorMessage" class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
	 <span class="col">@{{ errorMessage }}</span>
	 <span class="col-auto"><a ng-click="errorMessage = null"><i class="far fa-times-circle"></i></a></span>
	</div>
	<div class="mb-3 card">
		<div class="card-body row">
			<span style="top: 10px" class="avatarTimeLine fs--1">{{auth('afiliadoempresa')->user()->name}}</span>
			<div class="col-md-1 col-sm-12" style="z-index: 2">
				<img width="70px" class="shadow-sm avatar-default rounded-circle" src="{{ asset('images/avatars/avatar-default/avatar1.png') }}" alt="Chania">
			</div>
			<div ng-controller="timelineSequencesStudentCtrl" ng-init="init()" class="col-md-11 col-sm-12">
				@for($j = 1; $j < 9 ; $j++)
					@for($i = 1; $i < 5 ; $i++)
						@if($i ===1)
							<svg class="svgelem2" width="16" height="20px" style="margin-right: -23px; margin-left: -18px;">
								<rect width="35" height="1" style="fill:rgb(0,0,255);stroke-width:0.5;stroke:rgb(0,0,0)" />
							</svg>
						@else
							<svg class="svgelem2" width="12" height="20px" style="margin-right: -26px;">
								<rect width="9" height="1" style="fill:rgb(0,0,255);stroke-width:0.5;stroke:rgb(0,0,0)" />
							</svg>
						@endif
						<svg class="svgelem"  width="38px" height="40px" style="margin-right:-10px" xmlns="http://www.w3.org/2000/svg">
							<circle id="circle{{$j}}{{$i+4}}" cx="25" cy="25" r="7" fill="#f1f1f1" stroke="green"
									stroke-width="2%"/>
						</svg>
					@endfor
					<svg class="svgelem2" width="16px" height="20px" style="margin-right: -21px">
						<rect width="35" height="1" style="fill:rgb(0,0,255);stroke-width:0.5;stroke:rgb(0,0,0)" />
					</svg>
					<svg width="50" height="80" xmlns="http://www.w3.org/2000/svg">
							<path  id="star{{$j}}" fill="#f1f1f1"  style="transform:translate(12px, 22px) scale(.22,.22) rotate(-1deg);" stroke="black" stroke-width="6"
								  d="m135.78 50.46c0-2.01-1.52-3.259-4.564-3.748l-40.897-5.947-18.331-37.07c-1.031-2.227-2.363-3.34-3.992-3.34-1.629
								  0-2.96 1.113-3.992 3.34l-18.332 37.07-40.899 5.947c-3.041.489-4.562 1.738-4.562 3.748 0 1.141.679 2.445 2.037
								  3.911l29.656 28.841-7.01 40.736c-.109.761-.163 1.305-.163 1.63 0 1.141.285 2.104.855 2.893.57.788 1.425 1.181
								  2.566 1.181.978 0 2.064-.324 3.259-.977l36.58-19.229 36.583 19.229c1.142.652 2.228.977 3.258.977 1.089 0
								  1.916-.392 2.486-1.181.569-.788.854-1.752.854-2.893 0-.706-.027-1.249-.082-1.63l-7.01-40.736 29.574-28.841c1.414-1.412
								  2.119-2.716 2.119-3.911"/>
							<text x="50%" y="50%" text-anchor="middle" stroke="#51c5cf" stroke-width="1.5px" dy=".18em" dx=".15em" style="text-anchor: middle;">{{$j}}</text>
					</svg>
				@endfor
			</div>
		</div>   
	</div>
</div>
@section('js')
    <script src="{{ asset('angular/controller/timelineSequencesStudentCtrl.js') }}" defer></script>
@endsection