MyApp.controller("avatarStudentCtrl", function ($scope, $http) {
    $scope.customImage = null;
    $scope.urlImage = null;
    
    $scope.setAvatar = function (urlImage) {
        $scope.urlImage = urlImage;
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
