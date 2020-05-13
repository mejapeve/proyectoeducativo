@extends('roles.student.layout')

@section('content')
    <div class="container" ng-controller="profileStudentCtrl" ng-init="initProfile()">
        <div class="content row">
            <div class="col-md-3 text-align">
                <div class="col-12">
                    <h6>{{$student->name}} {{$student->last_name}}</h6>
                    @if(isset($student->url_image)) 
                        <img src="{{asset($student->url_image)}}" width="80px" height="auto"/>
                    @else 
                        <img src="{{asset('images/icons/default-avatar.png')}}" width="80px" height="auto"/>
                    @endif
                </div>
                <div class="col-12">
                    <div class="mt-3 line_up_beatyfull"></div>
                    <div class="ml-7 line row" style="">
                        <div class="other"></div>
                        <div class="other-overwrite"></div>
                        <div class="up"></div>
                        <div class="overwrite"></div>
                    </div>    
                    <span>0</span>
                    <h6>Guías de aprendizajes activas</h6>
                    <div class="mt-3 mb-3 line_down_beatyfull"></div>
                    <div class="ml-7 line row" style="">
                        <div class="down"></div>
                        <div class="overwrite"></div>
                    </div>
                </div>
                <div class="col-12 row">
                    <div class="col-6">
                        <span>07/02/2020</span>
                        <h6>Fecha del primer acceso</h6>
                    </div>
                    <div class="col-6">
                        <span>07/02/2020</span>
                        <h6>Fecha del último acceso</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                 @yield('archievements_layout')
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/profileStudentCtrl.js')}}"></script>
@endsection
