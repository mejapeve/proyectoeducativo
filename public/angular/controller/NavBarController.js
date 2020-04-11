MyApp.controller('navbarController', ['$scope', function ($scope) {
    $("#toggleMenu").click(function () {
        $("#sideMenu").toggleClass("show");
    });

    $(window).resize(function () {
        $("#sideMenu").removeClass("show");
        FixNavbarMenu();
    });
    
    function FixNavbarMenu () {
        var previousScroll = 0;
        $(window).scroll(function () {
            var currentScroll = $(this).scrollTop();
            if(Math.abs(previousScroll-currentScroll) > 5) {
                if (currentScroll < 120) {
                    bigNav();
                } else if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()) {
                    if (currentScroll > previousScroll) {
                        smallNav();
                    } else {
                        smallNav();
                    }
                }
            }
            previousScroll = currentScroll;
            
        });

        function bigNav() {
            $("#topLogo div div").removeClass('fs-lg--2').addClass('fs-lg-0');
            $("#topLogo div img").removeClass('small');
            $("#topLogo div img").css('height','auto');
        }

        function smallNav() {
            $("#topLogo div div").removeClass('fs-lg-0').addClass('fs-lg--2');
            $("#topLogo div img").addClass('small');
            $("#topLogo div img").css('height','auto');
        }
    }
    
    $(document).ready(function () {
        FixNavbarMenu();
    });
}]);
