MyApp.controller("contentSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {
    
    $scope.errorMessage = null;
	
	$scope.init = function() {
		resizeSequenceCard();		
	}

    var hiddenSideMenu = function() {
        $('#sidemenu-sequences-button').removeClass('fa-caret-square-left');
        $('#sidemenu-sequences-button').addClass('fa-caret-square-right');
        $('#sidemenu-sequences-empty').addClass('show');
        $('#sidemenu-sequences-empty').removeClass('d-none');
        
        $('#sidemenu-sequences-content').addClass('d-none');
		$('#sidemenu-sequences-content').removeClass("show");
		$('#sidemenu-sequences-content').removeClass("d-lg-block");
		 
		$('#sidemenu-tools-content').addClass('d-none');
		$('#sidemenu-tools-content').removeClass("show");
		$('#sidemenu-tools-content').removeClass("d-lg-block");
        
        $('#sidemenu-sequences').addClass("col-lg-0_5");
        $('#sidemenu-sequences').removeClass("col-lg-3");
        
        $('#content-section-sequences').removeClass("col-lg-9");
        $('#content-section-sequences').addClass("col-lg-11_5");
		
		//$('#background-sequence-card').attr('w')
    };
    var showSideMenu = function() {
        $('#sidemenu-sequences-empty').removeClass('show');
        $('#sidemenu-sequences-empty').addClass('d-none');
        
        $('#sidemenu-sequences-content').removeClass('d-none');
        $('#sidemenu-sequences-content').addClass("show");
		$('#sidemenu-sequences-content').addClass("d-lg-block");
		
		$('#sidemenu-tools-content').removeClass('d-none');
        $('#sidemenu-tools-content').addClass("show");
		$('#sidemenu-tools-content').addClass("d-lg-block");
        
        $('#sidemenu-sequences-button').addClass('fa-caret-square-left');
        $('#sidemenu-sequences-button').removeClass('fa-caret-square-right');
        
        $('#sidemenu-sequences-hidden-side').removeClass("d-none");
        $('#sidemenu-sequences-content').removeClass("d-none");
        $('#sidemenu-sequences-empty').addClass("d-none");
		
		$('#sidemenu-tools-content').addClass("show");
		$('#sidemenu-tools-content').removeClass("d-none");
        
        $('#sidemenu-sequences').removeClass("col-lg-0_5");
        $('#sidemenu-sequences').addClass("col-lg-3");
        
        $('#content-section-sequences').addClass("col-lg-9");
        $('#content-section-sequences').removeClass("col-lg-11_5");
    }
    $scope.toggleSideMenu = function() {
        
        if( $('#sidemenu-sequences-button').hasClass('fa-caret-square-left')) {
            hiddenSideMenu();
        }
        else if( $('#sidemenu-sequences-button').hasClass('fa-caret-square-right')) {
            showSideMenu();
        }        
        resizeSequenceCard();
    };
    
}]);


    function resizeSequenceCard () {
        var card = $('.background-sequence-card');
		$('.background-sequence-image').css('height','auto');
		$('.background-sequence-image').css('width',card.css('width'));
        if($('.background-sequence-image').css('height')) {
            card.css('height',$('.background-sequence-image').css('height'));
        }
        var w = card.attr('w');
        var h = card.attr('h');
        var newW = card.css('width').replace('px','');
        var newH = card.css('height').replace('px','');
        $(card).find('[fs]').each(function(value,key){
            var fs = $(this).attr('fs');
            var newFs = ( fs * newW / w);
            $(this).css('font-size',newFs+'px');    
        });
        
        $(card).find('[mt]').each(function(value,key){
            var mt = $(this).attr('mt');
            var newMt = ( mt * newH / h);
            $(this).addClass('position-absolute');
            $(this).css('top',newMt+'px');
        });
        
        $(card).find('[ml]').each(function(value,key){
            var ml = $(this).attr('ml');
            var newMl = ( ml * newW / w);
            $(this).addClass('position-absolute');
            $(this).css('left',newMl+'px');
        });
        
        $(card).find('[w]').each(function(value,key){
            if($(this).attr('w')==='auto') {
                $(this).css('width','auto');    
            }
            else {
                var objW = ( $(this).attr('w') * newW / w);
                $(this).addClass('position-absolute');
                $(this).css('width',objW+'px');    
            }
        });
        
        $(card).find('[h]').each(function(value,key){
			if($(this).attr('h')==='auto') {
                $(this).css('height','auto');    
            }
            else {
				var objH = ( $(this).attr('h') * newH / h);
				$(this).addClass('position-absolute');
				$(this).css('height',objH+'px');
			}
        });
        
        $('.d-none-result').removeClass('d-none');
        
    }
    
    $( window ).resize(function() {
        resizeSequenceCard();
    });

    resizeSequenceCard();

