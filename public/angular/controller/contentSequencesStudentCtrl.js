MyApp.controller("contentSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {
    
    $scope.errorMessage = null;

	var hiddenSideMenu = function() {
		$('#sidemenu-sequences-button').removeClass('fa-caret-square-left');
		$('#sidemenu-sequences-button').addClass('fa-caret-square-right');
		$('#sidemenu-sequences-empty').addClass('show');
		$('#sidemenu-sequences-empty').removeClass('d-none');
		
		$('#sidemenu-sequences-content').addClass('d-none');
		$('#sidemenu-sequences-content').removeClass("show");
		
		$('#sidemenu-sequences').addClass("col-md-0_5");
		$('#sidemenu-sequences').removeClass("col-md-3");
		
		$('#content-section-sequences').removeClass("col-md-9");
		$('#content-section-sequences').addClass("col-md-11_5");
	};
	var showSideMenu = function() {
		$('#sidemenu-sequences-empty').removeClass('show');
		$('#sidemenu-sequences-empty').addClass('d-none');
		
		$('#sidemenu-sequences-content').removeClass('d-none');
		$('#sidemenu-sequences-content').addClass("show");
		
		$('#sidemenu-sequences-button').addClass('fa-caret-square-left');
		$('#sidemenu-sequences-button').removeClass('fa-caret-square-right');
		
		$('#sidemenu-sequences-hidden-side').removeClass("d-none");
		$('#sidemenu-sequences-content').removeClass("d-none");
		$('#sidemenu-sequences-empty').addClass("d-none");
		
		$('#sidemenu-sequences').removeClass("col-md-0_5");
		$('#sidemenu-sequences').addClass("col-md-3");
		
		$('#content-section-sequences').addClass("col-md-9");
		$('#content-section-sequences').removeClass("col-md-11_5");
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
	
	function resizeSequenceCard () {
		var card = $('.background-sequence-card');
		card.css('height',$('.background-sequence-image').css('height'));
		
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
			var objW = ( $(this).attr('w') * newW / w);
			$(this).addClass('position-absolute');
			$(this).css('width',objW+'px');
		});
		
		$(card).find('[h]').each(function(value,key){
			var objH = ( $(this).attr('h') * newH / h);
			$(this).addClass('position-absolute');
			$(this).css('height',objH+'px');
		});
		
	}
	
	$( window ).resize(function() {
		resizeSequenceCard();
	});

	resizeSequenceCard();
    
}]);
