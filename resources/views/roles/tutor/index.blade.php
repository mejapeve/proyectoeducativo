@extends('roles.tutor.layout')

@section('content-tutor-index')
    <div class="" ng-controller="TutorProfileCtrl" ng-init="init({{$tutor}})">
        <h5 class="mt-3">Mi perfíl</h5>
		<div class="row pl-4 pb-4 pt-4 pr-4">
			<div class="col-3">Imagen de peril</div>
			<div class="col-6"><img class="rounded-pill" src="{{asset(auth('afiliadoempresa')->user()->url_image)}}" width="60px" style="margin:-15px;"></div>
			<div class="col-3"><button class="btn btn-sm btn-primary" ng-click="registerUserForm()">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Nombre</div>
			<div class="col-6" id="div_name">@{{tutor.name}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary" ng-click="registerUserForm(1)">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Apellido</div>
			<div class="col-6" id="div_last">@{{tutor.last_name}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary" ng-click="registerUserForm(2)">Cambiar</button></div>
		</div>
		<div class="row pl-4 pb-4 pt-1 pr-4">
			<div class="col-3">Telefono</div>
			<div class="col-6" id="div_phone">@{{tutor.phone}}</div>
			<div class="col-3"><button class="btn btn-sm btn-primary" ng-click="registerUserForm(3)">Cambiar</button></div>
		</div>
		<h5 class="mt-3">Cuenta</h5>
		<form class="" ng-submit="changePassword(changePasswordForm)" name="changePasswordForm" id="changePasswordForm" novalidate>
			<div class="row pl-4 pb-4 pt-1 pr-4">
				<div class="col-6">
					<label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Contraseña actual') }}</label>
					<div class="input-group">
						<input id="txtPassword1" type="Password" name="password1"  ng-model="tutor.password1"
							   class="form-control" value="">
						<div class="input-group-append">
							<button id="show_password1" class="btn btn-primary" type="button" ng-click="viewPassword('txtPassword1')"> <span class="fa fa-eye-slash icon txtPassword1"></span> </button>
						</div>
					</div>
				</div>
				<div class="col-6">
					<label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nueva contraseña') }}</label>
					<div class="input-group">
						<input id="txtPassword2" type="password" name="password2"  ng-model="tutor.password2"
							   class="form-control" value="">
						<div class="input-group-append">
							<button id="show_password2" class="btn btn-primary" type="button" ng-click="viewPassword('txtPassword2')"> <span class="fa fa-eye-slash icon txtPassword2"></span> </button>
						</div>
					</div>
				</div>
			</div>
			<div class="row pl-4 pb-4 pt-1 pr-4">
				<div class="col-5"><button class="btn btn-sm btn-primary" ng-click="onChangePassword()">Cambiar contraseña</button></div>
			</div>
		</form>
		<div ng-show="newRegisterForm" class="d-none-result d-none dropdown-menu-card" id="elementkitsModal" style="">
			<div class="modal-backdrop fade show"></div>
			<div class="position-absolute modal-menu card-notification shadow-none card" style="top: 0px;width: 100%;margin-left: -15px;">
				<div ng-click="newRegisterForm=false" class="position_absolute fs-2 cursor-pointer" style="top: 3px;right: 16px;left: 35px;text-align: right;position: absolute;"> <svg class="svg-inline--fa fa-times-circle fa-w-16" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg><!-- <i class="far fa-times-circle"></i> --> </div>
				<div class="p-lg-6 p-sm-4">
					<div class="">
						<div class="row">
							<div class="form-group col-lg-4">
								<label id="label_name" class=""><svg class="svg-inline--fa fa-arrow-right fa-w-14 arrow-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
									</svg>@{{labelName}}</label>
								<input placeholder="" type="text" name="varChange" ng-model="varChange" class="form-control ng-pristine ng-untouched ng-valid ng-empty" value="">
							</div>
							<div class="form-row mt-4 pl-5" style="margin-block-end: auto;">
								<button type="submit" class="btn btn-small btn-primary d-flex" ng-click="onEdit(inputToEdit)">
									<div ng-show="loagingRegistry" class="ng-hide"><svg class="svg-inline--fa fa-spinner fa-w-16 fa-spin mr-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa fa-spinner fa-spin mr-2"></i> --></div>
									Editar campo
								</button>
								<span ng-show="errorMessageRegister" class="invalid-feedback ng-hide" role="alert">
                 					<strong class="ng-binding"></strong>
              					</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

	<script src="{{ asset('angular/controller/TutorProfileCtrl.js') }}" defer></script>
@endsection
