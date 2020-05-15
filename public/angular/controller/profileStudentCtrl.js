MyApp.controller("profileStudentCtrl", function ($scope, $http) {
    $scope.customImage = null;
    $scope.urlImage = null;
    $scope.validateUserName = true;
   
    $scope.initProfile = function() {
        $('.d-none-result').removeClass('d-none');        
    }

    $scope.onEditStudent = function() {
       
      $scope.errorName = null;
      $scope.errorLastName = null;
      $scope.errorBirthday = null;
      $scope.errorPassword = null;
      $scope.mbInvalidate = null;
      $scope.errorMessageRegister = null;
      
      var name  = $('input[name=name]').val(); if(name.length === 0 ) { $scope.errorName = 'Este campo debe ser poblado'; return;}
      var last_name = $('input[name=last_name]').val(); if(last_name.length === 0 ) { $scope.errorLastName = 'Este campo debe ser poblado'; return;}
      var birthday = $('input[name=birthday]').val(); //if(birthday.length === 0 ) { $scope.errorBirthday = 'Este campo debe ser poblado'; return;}
      var user_name = $('input[name=user_name]').val(); if(user_name.length === 0 ) { $scope.mbInvalidate = 'Este campo debe ser poblado'; return;}
      var password = $('input[name=password]').val(); //if(password.length === 0 ) { $scope.mbInvalidate = 'Este campo debe ser poblado'; return;}
      if(password.length>0 && password.length<8)  { $scope.errorPassword = 'La contraseña debe tener mínimo 8 caracteres'; return;}
      
      $scope.loadingRegistry = true;
      var data = {
          "name": name,
          "last_name": last_name,
          "user_name": user_name,
          "birthday": birthday,
          "password": password
      }
      $http({
         url:"/edit_user_student/",
         method: "POST",
         data: data
      }).
      then(function (response) {
         $scope.loadingRegistry = false;
         if(response.status === 200) {
            swal({
               text: "Estudiante editado exitosamente",
               type: "success",
               showCancelButton: false,
               showConfirmButton: false
            }).catch(swal.noop);
            $scope.initInscriptions();
         }
      }).catch(function (e) {
         $scope.errorMessageRegister = 'Error editando el estudiante';
         $scope.loadingRegistry = false;
      });
    }

    $scope.setAvatar = function (urlImage) {
        $scope.urlImage = urlImage;
    }
    
    $scope.onSaveAvatar = function() {
        var canvas = document.getElementById('canvas');
        if($scope.customImage) {
            document.getElementById('custom_image').value = canvas.toDataURL("image/png");
        }
        
        document.getElementById('save-avatar-form').submit();    
    }
    
    $scope.init = function() {

        $('.d-none-result').removeClass('d-none');
        $('#avatar').Cubexy();
        $(".avatar-default").click(function(){
            $("#avatar-selected").attr("src",$(this).attr('src'));
            $("#canvas").hide();
            $("#colors").hide();
            $("#avatar-selected").addClass("d-block");
        });
        $("#colors").parent().addClass("card");
        $("#colors").hide();
        $("#colors").addClass("mb-0");
        $("#avatar div img").click(function(){
            $("#canvas").show();
            $scope.urlImage = null;
            $scope.customImage = true;
            $scope.$apply();
            $("#avatar-selected").hide();
            $("#avatar-selected").removeClass("d-block").addClass("d-none");
        });
        $(".tab-avatar").click(function(){
            $("#avatar").find("div").addClass("d-none");
            $("#canvas").show();
            $scope.urlImage = null;
            $scope.customImage = true;
            $scope.$apply();
            $("#colors").hide();
            $("#avatar-selected").removeClass("d-block").addClass("d-none");
            $("#avatar").find("div").removeClass("d-block");
            $("#" + $(this).attr("data-tab")).addClass("d-block");
        });

        $("#avatar div img").click(function(){
            $("#colors").show();
        });
    }
    
});
