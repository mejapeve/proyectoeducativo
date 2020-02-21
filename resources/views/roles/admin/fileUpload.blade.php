@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="FileUploadController">
        <div class="content">

        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/FileUploadController.js')}}"></script>
@endsection