MyApp.controller("sequencesGetCtrl", function ($scope, $http, $timeout) {
    $scope.sequence = null;
    $scope.errorMessageFilter = '';
    $scope.elementsKits = [];
    $scope.ratingPlans = [];

    var params = window.location.href.split('/');
    $scope.sequenceName = window.location.href.split('/')[params.length - 1];
    $scope.sequenceId = window.location.href.split('/')[params.length - 2];

    $scope.init = function () {
        $http({
            url: '/get_rating_plans/',
            method: "GET",
        }).
            then(function (response) {
                $scope.ratingPlans = response.data.data || response.data;
            }).catch(function (e) {
                $('.d-none-result').removeClass('d-none');
                $('#loading').removeClass('show');
                $scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
            });        
        
        $http({
            url: '/get_sequence/' + $scope.sequenceId,
            method: "GET",
        }).
            then(function (response) {

                $scope.sequence = response.data[0];
                $scope.sequence.images = [];
                if ($scope.sequence.url_slider_images) {
                    $scope.sequence.images = $scope.sequence.url_slider_images.split('|');
                }

                $timeout(function () {
                    $('#loading').removeClass('show');
                    $('.d-none-result2').removeClass('d-none');
                    new Swiper('.swiper-container', {
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });
                }, 100);


                function searchElementKit(elementKit) {
                    for (var i = 0; i < $scope.elementsKits.length; i++) {
                        if ($scope.elementsKits[i].type === elementKit.type && $scope.elementsKits[i].id === elementKit.id)
                            return true;
                    }
                    return false;
                }


                var kit = moment = element = null;
                $scope.elementsKits = [];
                if ($scope.sequence.moments) {
                    for (var i = 0; i < $scope.sequence.moments.length; i++) {

                        moment = $scope.sequence.moments[i];
                        if (moment.moment_kit) {
                            for (var j = 0; j < moment.moment_kit.length; j++) {
                                kit = moment.moment_kit[i].kit;
                                if (kit) {
                                    kit.type = "kit";
                                    kit.name_url_value = kit.name.replace(/\s/g, '_').toLowerCase();
                                    if (!searchElementKit(kit)) {
                                        $scope.elementsKits.push(kit);
                                    }
                                    if (kit.elementsKits && kit.elementsKits[0]) {
                                        element = kit.elementsKits[0].element;
                                        element.type = "element";
                                        element.name_url_value = element.name.replace(/\s/g, '_').toLowerCase();
                                        if (!searchElementKit(element)) {
                                            $scope.elementsKits.push(element);
                                        }
                                    }
                                }
                                else {
                                    element = moment.moment_kit[i].element;
                                    if (element) {
                                        element.type = "element";
                                        element.name_url_value = element.name.replace(/\s/g, '_').toLowerCase();
                                        if (!searchElementKit(element)) {
                                            $scope.elementsKits.push(element);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

            }).catch(function (e) {
                $('.d-none-result2').removeClass('d-none');
                $('#loading').removeClass('show');
                $scope.errorMessageFilter = 'Error consultando las secuencias, compruebe su conexión a internet';
            });
    };
    
    $scope.showMash = function (sequence) {
        
        var width = $( window ).width() * 492 / 1280;
        var html = '<img src="/'+sequence.mesh+'" width="'+width+'px" height="auto">';
        swal({
            html: html,
            width: '50%',
            showConfirmButton: false, showCancelButton: false
        }).catch(swal.noop);
    }

    $scope.onSequenceBuy = function (sequence) {
        var ratingPlans = '';
        for(var i = 0; i < $scope.ratingPlans.length; i++) {
            var rt = $scope.ratingPlans[i];
            if(!rt.is_free) {
                var listItem = rt.description_items.split('|');
                var items = '';
                for(var j=0;j<listItem.length;j++) {
                    items += '<li class="card-rating-plan-id-'+ i +'"><span class="color-gray-dark fs--1">' + listItem[j] + '</span></li>';
                }
               var href = '/plan_de_acceso/' + rt.id + '/' + rt.name + '/' + $scope.sequence.id;
               var button = '<a href="'+href+'" class="ml-auto mr-auto btn btn-sm btn-outline-primary w-50">Adquirir</a>';    
               ratingPlans += '<div class="mt-3 col-12 col-md-4 "><div class="p-2 card" style="border-radius: 13px;">'+
			   '<h6 class="font-weight-bold card-rating-plan-id-'+ i +'">'+rt.name+'</h6>' + 
			   '<ul class=" text-left fs-2">' + items + '</ul>'+button+'</div></div>';
            }
        }
        var html = '<div class="row justify-content-center">' + ratingPlans + '</div>';
        swal({
            title: '<small class="p-2 rounded" style="background-color: white;padding: 7px;">Debes seleccionar un plan de acceso para adquirir esta guía</small>',
            html: html,
            width: '75%',
            showConfirmButton: false, showCancelButton: false
        }).catch(swal.noop);
		$('.swal2-show').css('background-color','transparent');
    }

});
