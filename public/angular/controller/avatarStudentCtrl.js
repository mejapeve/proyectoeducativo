MyApp.controller("avatarStudentCtrl", function ($scope, $http) {
    $scope.customImage = null;
    $scope.urlImage = null;
    $scope.avatar = null;

    $scope.avatars = [
        {"urlImage":"/images/avatars/avatar-default/avatar1.png","name":"Leonardo da Vinci","job":"Polímata"},
        {"urlImage":"/images/avatars/avatar-default/avatar2.png","name":"Marie Curie","job":"Química"},
        {"urlImage":"/images/avatars/avatar-default/avatar3.png","name":"Albert Einstein","job":"Físico"},
        {"urlImage":"/images/avatars/avatar-default/avatar4.png","name":"Samantha Cristoforetti","job":"Astronauta"},
        {"urlImage":"/images/avatars/avatar-default/avatar5.png","name":"Katia Krafft","job":"Vulcanólaga"},
        {"urlImage":"/images/avatars/avatar-default/avatar6.png","name":"Isaac Newton","job":"Físico"},
        {"urlImage":"/images/avatars/avatar-default/avatar7.png","name":"Galileo Galilei","job":"Físico"},
        {"urlImage":"/images/avatars/avatar-default/avatar8.png","name":"Rosalind Franklin","job":"Química"},
        {"urlImage":"/images/avatars/avatar-default/avatar9.png","name":"Stephen Hawking","job":"Astrofísico"},
        {"urlImage":"/images/avatars/avatar-default/avatar10.png","name":"Valerie Thomas","job":"Astrofísico"},]
    
    $scope.setAvatar = function (avatar) {
        $scope.avatar = avatar;
        $scope.customImage = null;
    }
    
    $scope.onSaveAvatar = function() {
        var canvas = document.getElementById('canvas');
        if($scope.customImage) {
            document.getElementById('custom_image').value = canvas.toDataURL("image/jpeg");
			
        }
        
        document.getElementById('save-avatar-form').submit();    
    }
    
    $scope.init = function() {
        $('#avatar').Cubexy();
        $(".avatar-default").click(function(){
            //$("#avatar-selected").attr("src",$(this).attr('src'));
            $("#colors").hide();
        });
        $("#colors").parent().addClass("card");
        $("#colors").hide();
        $("#colors").addClass("mb-0");
        $("#avatar div img").click(function(){
            $("#canvas").show();
            $scope.urlImage = null;
            $scope.customImage = true;
            $scope.$apply();
            $scope.avatar = null;
        });
        $(".tab-avatar").click(function(){
            $("#avatar").find("div").addClass("d-none");
            $("#canvas").show();
            $scope.urlImage = null;
            $scope.customImage = true;
            $scope.avatar = null;
            $scope.$apply();
            $("#colors").hide();
            
            $("#avatar").find("div").removeClass("d-block");
            $("#" + $(this).attr("data-tab")).addClass("d-block");
        });

        $("#avatar div img").click(function(){
            //$("#colors").show();
            $scope.avatar = null;
            $scope.$apply();
        });

        $("#avatar").find('.img-thumbnail').click(function(){
            $scope.avatar = null;
            $scope.$apply();
        });

        $('.d-result').removeClass('d-none');
        $('.loading').addClass('d-none');
    }
    
});
