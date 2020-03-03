@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content">
        <div class="row">
            @include('layouts/sidebarAdmin')
            <div class="col-md-8">
                <div class="mb-3 card">
                    <div class="card-header">
                        <h5 class="mb-0">Carga Masiva</h5>
                    </div>
                    <div class="bg-light card-body">

<div class="container" ng-controller="FileUploadLogsController">
    <div class="content">
        <div class="card">
            <div class="bg-light card-header">
                <div class="align-items-center row">
                    <div class="col">
                        <h5 class="mb-0">Mis cargas</h5>
                    </div>
                    <div class="text-right col-auto">
                        <div class="fs--1">
                            <a class="text-sans-serif" href="{{route('fileuploadlogs')}}">Ver Todos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-0 card-body">
                @if(!empty($showResult)) <!-- cuando se envia por parametro el resultado del proceso de carga -->
                    <a class="notification rounded-0 border-x-0 border-300 border-bottom-0" href="/pages/notifications#!">
                        <div class="notification-avatar">
                            <div class="avatar avatar-xl mr-3"><img class="rounded-circle " src="/static/media/1.38f0341f.jpg" alt=""></div>
                        </div>
                        <div class="notification-body">
                            <p class="mb-1">Fecha de carga: <strong>{{$initProcess}}</strong></p>
                            <p class="mb-1">Nombre de la compañia: <strong>{{$companyName}}</strong></p>
                            <p class="mb-1">Nombre de la secuencia: <strong>{{$sequenceName}}</strong></p>
                            <p class="mb-1">Nombre del tutor: <strong>{{$teacherName}}</strong></p>
                            <p class="mb-1">Nombre del grupo: <strong>{{$gradeName}}</strong></p>
                            <p class="mb-1">Cantidad de registros: <strong>{{$successfullRecords}}</strong></p>
                            <p class="mb-1">Registros exitosos: <strong>{{$successfullRecords}}</strong></p>
                            
                            <span class="notification-time">
                                <span class="mr-1" role="img" aria-label="Emoji">📄</span>Just Now</span>
                        </div>
                    </a>
                @else 
                    <a class="notification rounded-0 border-x-0 border-300 border-bottom-0" href="/pages/notifications#!">
                    <div class="notification-avatar">
                        <div class="avatar avatar-xl mr-3"><img class="rounded-circle " src="/static/media/1.38f0341f.jpg" alt=""></div>
                    </div>
                    <div class="notification-body">
                        <p class="mb-1">Fecha de carga: <strong>24-Feb-2020 08:00 a.m.</strong></p>
                        <p class="mb-1">Nombre de la compañia: <strong>Ecopetrol</strong></p>
                        <p class="mb-1">Nombre de la secuencia: <strong>Los peligros del fraking</strong></p>
                        <p class="mb-1">Nombre del tutor: <strong>Catalina Arbelaez</strong></p>
                        <p class="mb-1">Nombre del grupo: <strong>Grupo 1</strong></p>
                        <p class="mb-1">Cantidad de registros: <strong>500</strong></p>
                        <p class="mb-1">Registros exitosos: <strong>490</strong></p>
                        <p class="mb-1">Registros erroneos: <strong>10</strong></p>
                        <span class="notification-time">
                            <span class="mr-1" role="img" aria-label="Emoji">📄</span>Just Now</span>
                    </div>
                    </a>

                    <a class="notification bg-200 rounded-0 border-x-0 border-300 border-bottom-0" href="/pages/notifications#!">
                        <div class="notification-avatar">
                            <div class="avatar avatar-xl mr-3"><img class="rounded-circle " src="/static/media/1.38f0341f.jpg" alt=""></div>
                        </div>
                        <div class="notification-body">
                        <p class="mb-1">Fecha de carga: <strong>24-Feb-2020 08:00 a.m.</strong></p>
                        <p class="mb-1">Fecha de carga: <strong>24-Feb-2020 08:00 a.m.</strong></p>
                            <span class="notification-time">
                                <span class="mr-1" role="img" aria-label="Emoji">📄</span>Just Now</span>
                        </div>
                    </a>

                @endif   
            </div>
        </div>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('/../angular/controller/FileUploadController.js')}}"></script>
@endsection