@extends('roles.student.layout')

@section('content')
    <div class="container" ng-controller="profileStudentCtrl">
        <div class="content row">
            <div class="col-8 mt-4 ml-auto mr-auto">
                <div class="border border-light rounded-radius-1 card card-body border-dark_opacity"  style="min-width: 12rem;">
                    <div class="position-relative card-body border border-dark_opacity rounded-radius-1 row h-75 m-1">
                        <div class="col-md-5 p-0">
                        <img src="{{asset($student->url_image)}}" width="264px" height="auto"/>
                        </div>   
                        <div class="col-md-7 mt-3 mb-auto">
                            <h5> Nombres </h5>
                            <h5 class="mt-2 mb-4 border-bottom border-dark_opacity"><small> {{$student->name}} <small></h5>
                            <h5> Apellidos </h5>
                            <h5 class="mt-2 mb-4 border-bottom border-dark_opacity"><small> {{$student->last_name}} <small></h5>
                            <h5> Edad </h5>
                            <h5 class="mt-2 mb-4 border-bottom border-dark_opacity"><small> @if($age) {{$age}} años @endif<small></h5>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/profileStudentCtrl.js')}}"></script>
@endsection
