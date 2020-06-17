
var csrftoken =  (function() {

    var metas = window.document.getElementsByTagName('meta');

    for(var i=0 ; i < metas.length ; i++) {

        if ( metas[i].name === "csrf-token") {

            return  metas[i].content;
        }
    }

})();

var MyApp = angular.module('MyApp',['ngMessages','ngAnimate','ngSanitize']).constant("CSRF_TOKEN", csrftoken);

/*Script for all navigations*/
window.onload = function() {
     var swiper = new Swiper('.swiper-container', {
         navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
        },
     });
};

MyApp.directive('refreshable', [function () {
    return {
        restrict: 'A',
        scope: {
            refresh: "=refreshable"
        },
        link: function (scope, element, attr) {
            scope.$watch('refresh', function (newVal, oldVal) {
                if (scope.refresh) {
                    element.attr('src', scope.refresh);
                }
            });
        }
    };
}])

