MyApp.controller('navbarController', ['$scope', function($scope) {

		var url = $(location).attr('href');
		
		if(url.includes('/aboutus')){
			$(".nav .nav-item .aboutus").addClass("selected");
		}
		else if(url.includes('/contactus')){
			$(".nav .nav-item .contactus").addClass("selected");
		}
		else  { 
			$(".nav .nav-item .home").addClass("selected");
		}

	  
	  $(".navbar-nav .dropdown").click(function(){
		if($(this).find(".dropdown-menu").hasClass("show")) {
			$(".navbar-nav .dropdown").find(".dropdown-menu").removeClass("show");
		}
		else {
			$(".navbar-nav .dropdown").find(".dropdown-menu").removeClass("show");
			$(this).find(".dropdown-menu").addClass("show");
		}
	  });
	  
	  $("#toggleMenu").click(function(){
		$("#sideMenu").toggleClass("show");
	  });
	  $(".nav-link.dropdown-indicator").click(function(){
		$(".nav-link.dropdown-indicator + div").removeClass("show");
		if($(this).attr("aria-expanded") === "false") {
		   $(".nav-link.dropdown-indicator").attr("aria-expanded","false");
   		   $(this).parent().find("div.collapse").addClass("show");
		   $(this).attr("aria-expanded","true");
		}
		else { 
			$(this).attr("aria-expanded","false");
		}
	  });
  
}]);
