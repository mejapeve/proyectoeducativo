@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    @include('roles/student/sidebar')
                </div>
                <div class="col-md-9">
                    @yield('section-student')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/HomePageController.js')}}"></script>
@endsection