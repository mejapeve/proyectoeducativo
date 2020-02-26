@extends('layouts.app')

@section('content')
<div class="container" ng-controller="FileUploadController">
    <div class="content">
        <div class="form-group">
            <label for="companyLabel" class="">Compañía</label>
            <select name="companySelect" id="companySelect" class="form-control" ng-model="companyId" ng-change="onChangeCompany()">
                <option value="@{{company.id}}" ng-repeat="company in companies">@{{company.name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sequenceLabel" class="">Secuencia</label>
            <select name="sequenceSelect" id="sequenceSelect" class="form-control" ng-model="sequenceId">
                <option value="@{{sequence.sequences[0].id}}" ng-repeat="sequence in sequences">@{{sequence.sequences[0].name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="teacherLabel" class="">Docente</label>
            <select name="teacherSelect" id="teacherSelect" class="form-control">
                <option>Cristian Jojoa</option>
                <option>Catalina Arbelaez</option>
                <option>Jairo Contreras</option>
            </select>
        </div>
        <div class="form-group">
            <label for="groupLabel" class="">Grupo</label>
            <select name="groupSelect" id="groupSelect" class="form-control" ng-model="groupId">
                <option value="@{{groups.id}}" ng-repeat="group in groups">@{{group.name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fileLabel" class="">Seleccione el archivo</label>
            <input name="fileInput" id="fileInput" type="file" class="form-control-file">
        </div>
        <button class="btn btn-outline-primary">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="transform-origin: 0.4375em 0.5em;">
                <g transform="translate(224 256)">
                    <g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                        <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path>
                    </g>
                </g>
            </svg>Cargar archivo
        </button>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('/../angular/controller/FileUploadController.js')}}"></script>
@endsection