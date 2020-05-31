<form novalidate name="myForm">
   <div class="">
      <div class="row">
         <h6><i class="fa fas fa-arrow-right arrow-icon"></i>Registra los datos del estudiante</h6>
         
           <div class="col-12 d-flex mt-3">
               <div class="register-avatar-kid" ng-click="onKidSelected('niño')" ng-class="{'selected':newStudent.kidSelected==='niño'}">
                   <img src="{{asset('images/icons/kid2.png')}}" width="103px;"/>
                   <span>Niño</span>
               </div>
               <div class="register-avatar-kid" ng-click="onKidSelected('niña')" ng-class="{'selected':newStudent.kidSelected==='niña'}">
                   <img src="{{asset('images/icons/kid1.png')}}" width="103px;"/>
                   <span>Niña</span>
               </div>
               <div class="register-avatar-kid" ng-click="onKidSelected('joven')" ng-class="{'selected':newStudent.kidSelected==='joven'}">
                   <img src="{{asset('images/icons/kid3.png')}}" width="103px;"/>
                   <span>Joven</span>
               </div>
           </div>
           <div class="form-group col-lg-4">
              <label class=""><i class="fa fas fa-arrow-right arrow-icon"></i>{{ __('Nombre') }}</label>
              <input placeholder="" type="text" name="name" ng-model="newStudent.name" required 
                    ng-class="{'is-invalid':errorName}" class="form-control" value="">
              <span class="invalid-feedback" role="alert" ng-show="errorName">
                    <strong>@{{ errorName }}</strong>
              </span>
           </div>
           <div class="form-group col-lg-4">
              <label class="">{{ __('Apellido') }}</label>
              <input placeholder="" type="text" name="last_name"  ng-model="newStudent.last_name" required 
                    class="form-control @error('last_name') is-invalid @enderror" value="">
              @error('last_name')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
              @enderror
           </div>
           <div class="form-group col-lg-4">
              <label class="">{{ __('Fecha de nacimiento') }}</label>
              <input placeholder="día/mes/año" type="date" name="birthday"  ng-model="newStudent.birthday"
                    class="form-control @error('birthday') is-invalid @enderror" value="">
              @error('birthday')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
              @enderror
           </div>
           <span class="fs--1 pl-3">La plataforma asignará un usuario y contraseña que será enviada al correo electrónico registrado, esta podrá ser cambiada al validar la información. </span>
           <div class="form-row mt-3 pl-3">
              <button type="submit" class="btn btn-small btn-primary d-flex" ng-click="onRegistry()" ng-disabled="myForm.$invalid || myForm.$pending">
                 <div ng-show="loadingRegistry"><i class="fa fa-spinner fa-spin mr-2"></i></div>
                 {{ __('Finalizar registro') }}
              </button>
              <span ng-show="errorMessageRegister" class="invalid-feedback" role="alert">
                 <strong>@{{errorMessageRegister}}</strong>
              </span>
           </div>
         
      </div>
   </div>
 </form>