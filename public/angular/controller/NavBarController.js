MyApp.controller('navbarController', ['$scope', function ($scope) {
    $("#toggleMenu").click(function () {
        $("#sideMenu").toggleClass("show");
    });

    $(window).resize(function () {
        $("#sideMenu").removeClass("show");
    });
}]);
