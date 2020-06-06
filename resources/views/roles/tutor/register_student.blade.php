<div class="">
  <div class="row">
     <h6><i class="fa fas fa-arrow-right arrow-icon"></i>Registra los datos del estudiante</h6>
      
       <div class="col-12 d-flex mt-3">
           <div class="register-avatar-kid" ng-click="onKidSelected('niño')" ng-class="{'selected':newStudent.kidSelected==='niño'}">
               <img src="{{asset('images/icons/kid2.png')}}" width="93px;" height="auto"/>
               <span>Niño</span>
           </div>
           <div class="register-avatar-kid" ng-click="onKidSelected('niña')" ng-class="{'selected':newStudent.kidSelected==='niña'}">
               <img src="{{asset('images/icons/kid1.png')}}" width="93px;" height="auto"/>
               <span>Niña</span>
           </div>
           <div class="register-avatar-kid" ng-click="onKidSelected('joven')" ng-class="{'selected':newStudent.kidSelected==='joven'}" style="width: 218px;">
               <img src="{{asset('images/icons/kid3.png')}}" width="186px;" height="auto"/>
               <span>Joven</span>
           </div>
       </div>
       <div class="form-group col-lg-4">
          <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nombre') }}</label>
          <input placeholder="" type="text" name="name" ng-model="newStudent.name"
                ng-class="{'is-invalid':errorName}" class="form-control" value="">
          <span class="invalid-feedback" role="alert" ng-show="errorName">
               <strong>Campo requerido</strong>
          </span>
       </div>
       <div class="form-group col-lg-4">
          <label class="">{{ __('Apellido') }}</label>
          <input placeholder="" type="text" name="last_name"  ng-model="newStudent.last_name"
                class="form-control" value="">
          <span class="invalid-feedback" role="alert">
             <strong>Campo requerido</strong>
          </span>
       </div>
       <div class="form-group col-lg-4">
          <label class="">{{ __('Fecha de nacimiento') }}</label>
          <input placeholder="día/mes/año" type="date" name="birthday"  ng-model="newStudent.birthday"
                class="form-control @error('birthday') is-invalid @enderror" value="">
       </div>
       <span class="fs--1 pl-3">La plataforma asignará un usuario y contraseña que será enviada al correo electrónico registrado, esta podrá ser cambiada al validar la información. </span>
       <div class="form-row mt-3 pl-3">
          <button type="submit" class="btn btn-small btn-primary d-flex" ng-click="onRegistry()" ng-disabled="!newStudent.name || !newStudent.last_name || newStudent.name.length === 0 || newStudent.last_name.length === 0 ">
             <div ng-show="loadingRegistry"><i class="fa fa-spinner fa-spin mr-2"></i></div>
             {{ __('Finalizar registro') }}
          </button>
          <span ng-show="errorMessageRegister" class="invalid-feedback" role="alert">
             <strong>@{{errorMessageRegister}}</strong>
          </span>
       </div>
     
  </div>
</div>