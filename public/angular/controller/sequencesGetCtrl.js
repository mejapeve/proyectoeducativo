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
                var data = response.data.data || response.data;
                $scope.ratingPlans = data.filter(function(value){
                    return !value.is_free && ( (value.type_plan.id === 1 && value.count === 1) || value.type_plan.id === 2 || value.type_plan.id === 3    );
                })
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
        if(sequence.mesh) {
            $http.post('/conexiones/admin/get_folder_image', { 'dir': sequence.mesh }).then(function (response) {
                $scope.meshDirectory = [];
                //Javascript control image index
                _mbControl = 0;
                
                var i = 0;
                var htmlImg = '';
                for(var dir in response.data.scanned_directory) {
                    
                    if(response.data.scanned_directory[dir]!=='..') {
                        if(response.data.directory.substr(response.data.directory.length-1,1) === '/') {
                            response.data.directory = response.data.directory.substr(0,response.data.directory.length-1);
                        }
                        var src = response.data.directory + '/' + response.data.scanned_directory[dir];
                        $scope.meshDirectory.push(src);
                        htmlImg += '<div id="id-image-'+i+'"><img src="/'+src+'" width="'+width+'px" height="auto"></div>';    
                        i++;
                    }
                    
                    
                }
                
                var html = '<div ng-init="idElement=0;">' + 
                            '<div class="row mt-2 mb-3">'+
                                '<div class="ml-auto mr-auto">'+
                                '<button id="btnOnPrevius" onclick="onPrevius(\''+i+'\');"  class="btn btn-sm btn-primary">Previo</button>'+
                                '<button id="btnOnNext" onclick="onNext(\''+i+'\');" class="btn btn-sm btn-primary ml-2">Siguiente</button>'+
                                '</div>'+
                            '</div>' + htmlImg + '</div>';
                swal({
                    html: html,
                    width: '50%',
                    showConfirmButton: false, showCancelButton: false
                }).catch(swal.noop);
                
                $timeout(function () {
                    _mbControl = 0;
                    $('#btnOnPrevius').click(function() {onPrevius(i);});
                    $('#btnOnNext').click(function() {onNext(i);});
                    $('#btnOnPrevius').attr('disabled', true);

                    $('div[id^="id-image-"]').hide();
                    $('#id-image-' + _mbControl).show();
                }, 300);
                
            },function(e){
                var message = 'Error consultando el directorio';
                if(e.message) {
                    message += e.message;
                }
                $scope.errorMessage = angular.toJson(message);
                $scope.meshDirectory = null;
            });
        } else {
            var html = '<img src="/images/icons/NoImageAvailable.jpeg" width="'+width+'px" height="auto">';
            swal({
                html: html,
                width: '50%',
                showConfirmButton: false, showCancelButton: false
            }).catch(swal.noop);
        }
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
            html: html,
            width: '75%',
            showConfirmButton: false, showCancelButton: false
        }).catch(swal.noop);
        $('.swal2-show').css('background-color','transparent');
    }

});


//Javascript control image index
var _mbControl = 0;
$('div[id^="id-image-"]').hide();
$('#id-image-' + _mbControl).show();

function onNext(arrayLenght){
    if(_mbControl + 1 < arrayLenght ) {
        _mbControl ++;
        $('div[id^="id-image-"]').hide();
        $('#id-image-' + _mbControl).show();
        if(_mbControl + 1 >= arrayLenght ) {
           $('#btnOnNext').attr('disabled', true);
        }
        else {
            $('#btnOnNext').attr('disabled', false);
        }
        
        $('#btnOnPrevius').attr('disabled', false);
    }
}


function onPrevius(arrayLenght){
    if(_mbControl > 0 ) {
        _mbControl --;
        $('div[id^="id-image-"]').hide();
        $('#id-image-' + _mbControl).show();

        if(_mbControl - 1 > 0 ) {
            $('#btnOnPrevius').attr('disabled', false);
        }
        else {
            $('#btnOnPrevius').attr('disabled', true);
        }
        
        $('#btnOnNext').attr('disabled', false);
    }
}
