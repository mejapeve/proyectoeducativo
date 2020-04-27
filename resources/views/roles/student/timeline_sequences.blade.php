<div ng-controller="timelineSequencesStudentCtrl" ng-init=init(1,"{{$account_service_id}}","{{$sequence_id}}") class="row">
    <div class="col-5 pr-0" style="height: 106px;">
        <img class="mr-2 avatar-logo-sequence" src="{{ asset('images/icons/iconosoloConexiones-01.png') }}" alt="Logo" width="40">
        <img width="70px" class="avatar-default rounded-circle" src="{{ asset('images/avatars/avatar-default/avatar1.png') }}" alt="Chania">
        <span class="nameTimeLine fs--1">{{auth('afiliadoempresa')->user()->name}}</span>
        <div class="position-absolute d-flex" style="top: 12px;left: 213px;">
            <a class="ml-8 btn btn-sm btn-secondary cursor-pointer" href="{{route('student.available_sequences','conexiones')}}"><i class="fas fa-home fs-1"></i></a>
            <a class="ml-1 btn btn-sm btn-secondary cursor-pointer" href="{{route('student','conexiones')}}"><i class="fas fa-arrow-left fs-1"></i></a>
            <a class="ml-1 btn btn-sm btn-secondary cursor-pointer" href="{{route('student','conexiones')}}"><i class="fas fa-arrow-right fs-1"></i></a>
            <a class="ml-1 btn btn-sm btn-secondary cursor-pointer" href="{{route('student','conexiones')}}"><i class="fas fa-book-open fs-1"></i></a>
            <a class="ml-1 btn btn-sm btn-secondary cursor-pointer" href="{{route('student','conexiones')}}"><i class="fas fa-star fs-1"></i></a>
            <a class="ml-1 btn btn-sm btn-secondary cursor-pointer" href="{{route('student','conexiones')}}"><i class="fas fa-calendar-alt fs-1"></i></a>
            <a class="ml-1 btn btn-sm btn-secondary cursor-pointer" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-door-open fs-1"></i></a>
			<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
           @csrf
        </form>
        </div>
    </div>
    <div class="col-auto d-none d-lg-block lineTimeLine">
        <div>
            @for($j = 1; $j < 9 ; $j++)
                @for($i = 1; $i < 5 ; $i++)
                    @if($i ===1)
                        <svg class="svgelem2" width="10" height="20px" style="margin-right: -23px; margin-left: -18px;">
                            <rect width="35" fill="#007AFF" stroke="#007AFF" height="1" style="stroke-width:0.5;" />
                        </svg>
                    @else
                        <svg class="svgelem2" width="10" height="20px" style="margin-right: -26px;">
                            <rect width="12" fill="#007AFF" stroke="#007AFF" height="1" style="stroke-width:0.5;" />
                        </svg>
                    @endif
                    <svg class="svgelem"  width="35px" height="40px" style="margin-right:-10px" xmlns="http://www.w3.org/2000/svg">
                        <circle class="circle{{$j}}{{$i}}" cx="25" cy="25" r="5" fill="#FFFFFF" stroke="#007AFF"
                                stroke-width="2%"/>
                    </svg>
                @endfor
                <svg class="svgelem2" width="14px" height="20px" style="margin-right: -21px">
                    <rect width="35" height="1" fill="#007AFF" stroke="#007AFF" style="stroke-width:0.5;" />
                </svg>
                <svg width="50" height="80" xmlns="http://www.w3.org/2000/svg">
                        <path  class="star{{$j}}" fill="#FFFFFF"  style="transform:translate(12px, 22px) scale(.22,.22) rotate(-1deg);" stroke="#007AFF" stroke-width="6"
                              d="m135.78 50.46c0-2.01-1.52-3.259-4.564-3.748l-40.897-5.947-18.331-37.07c-1.031-2.227-2.363-3.34-3.992-3.34-1.629
                              0-2.96 1.113-3.992 3.34l-18.332 37.07-40.899 5.947c-3.041.489-4.562 1.738-4.562 3.748 0 1.141.679 2.445 2.037
                              3.911l29.656 28.841-7.01 40.736c-.109.761-.163 1.305-.163 1.63 0 1.141.285 2.104.855 2.893.57.788 1.425 1.181
                              2.566 1.181.978 0 2.064-.324 3.259-.977l36.58-19.229 36.583 19.229c1.142.652 2.228.977 3.258.977 1.089 0
                              1.916-.392 2.486-1.181.569-.788.854-1.752.854-2.893 0-.706-.027-1.249-.082-1.63l-7.01-40.736 29.574-28.841c1.414-1.412
                              2.119-2.716 2.119-3.911"/>
                        <text class="number{{$j}}" x="50%" y="50%" text-anchor="middle" stroke="#007AFF" stroke-width="1.5px" dy=".18em" dx=".15em" style="text-anchor: middle;">{{$j}}</text>
                </svg>
            @endfor
        </div>
    </div>
	<div class="col-auto d-md-block d-lg-none lineTimeLine small">
        <div>
            @for($j = 1; $j < 9 ; $j++)
                @for($i = 1; $i < 5 ; $i++)
                    @if($i ===1)
                        <svg class="svgelem2" width="10px" height="20px" style="margin-right: -20px; margin-left: -18px;">
                            <rect width="25" height="1"  fill="#007AFF" stroke="#007AFF" style="stroke-width:0.5;" />
                        </svg>
                    @else
                        <svg class="svgelem2" width="10px" height="20px" style="margin-right: -26px;">
                            <rect width="44" height="1" fill="#007AFF" stroke="#007AFF" style="stroke-width:0.5;" />
                        </svg>
                    @endif
                    <svg class="svgelem"  width="30px" height="40px" style="margin-right:-10px" xmlns="http://www.w3.org/2000/svg">
                        <circle class="circle{{$j}}{{$i}}" cx="21" cy="25" r="4" fill="#FFFFFF" stroke="#007AFF"
                                stroke-width="2%"/>
                    </svg>
                @endfor
                <svg class="svgelem2" width="10px" height="20px" style="margin-right: -10px">
                    <rect width="16" height="1" fill="#007AFF" stroke="#007AFF" style="stroke-width:0.5;" />
                </svg>
                <svg width="50" height="80" xmlns="http://www.w3.org/2000/svg"  style="margin-left: -9px;">
                    <path  class="star{{$j}}" fill="#FFFFFF"  style="transform:translate(12px, 22px) scale(.22,.22) rotate(-1deg);" stroke="#007AFF" stroke-width="6"
                           d="m135.78 50.46c0-2.01-1.52-3.259-4.564-3.748l-40.897-5.947-18.331-37.07c-1.031-2.227-2.363-3.34-3.992-3.34-1.629
                              0-2.96 1.113-3.992 3.34l-18.332 37.07-40.899 5.947c-3.041.489-4.562 1.738-4.562 3.748 0 1.141.679 2.445 2.037
                              3.911l29.656 28.841-7.01 40.736c-.109.761-.163 1.305-.163 1.63 0 1.141.285 2.104.855 2.893.57.788 1.425 1.181
                              2.566 1.181.978 0 2.064-.324 3.259-.977l36.58-19.229 36.583 19.229c1.142.652 2.228.977 3.258.977 1.089 0
                              1.916-.392 2.486-1.181.569-.788.854-1.752.854-2.893 0-.706-.027-1.249-.082-1.63l-7.01-40.736 29.574-28.841c1.414-1.412
                              2.119-2.716 2.119-3.911"/>
                    <text class="number{{$j}}" x="50%" y="53%" text-anchor="middle" stroke="#007AFF" stroke-width="1px" dy=".08em" dx=".05em" style="text-anchor: middle;">{{$j}}</text>
                </svg>
            @endfor
        </div>
    </div>

</div>
@section('js')
    <script src="{{ asset('angular/controller/timelineSequencesStudentCtrl.js') }}" defer></script>
@endsection