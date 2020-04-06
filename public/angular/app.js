var MyApp = angular.module('MyApp',['ngMessages','ngAnimate']);

/*Script for all navigations*/
window.onload = function() {
     var swiper = new Swiper('.swiper-container', {
         navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
        },
     });
};