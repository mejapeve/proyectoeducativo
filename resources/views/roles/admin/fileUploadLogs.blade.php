@extends('layouts.app')

@section('content')
<div class="container" ng-controller="FileUploadLogsController">
    <div class="content">
        <div class="mb-3 card">
            <div class="bg-holder bg-card" style="background-image: url(&quot;/static/media/corner-4.e9bba510.png&quot;); border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem;"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="mb-0">Carga masiva de usuarios</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="bg-light card-header">
                <div class="align-items-center row">
                    <div class="col">
                        <h5 class="mb-0">Mis cargas</h5>
                    </div>
                    <div class="text-right col-auto">
                        <div class="fs--1">
                            <a class="text-sans-serif" href="/pages/notifications#!">Mark all as read</a>
                            <a class="text-sans-serif ml-2 ml-sm-3" href="/pages/notifications#!">Notification settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-0 card-body">
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
                        @{{lines}}
                        <span class="notification-time">
                            <span class="mr-1" role="img" aria-label="Emoji">📄</span>Just Now</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('/../angular/controller/FileUploadController.js')}}"></script>
@endsection