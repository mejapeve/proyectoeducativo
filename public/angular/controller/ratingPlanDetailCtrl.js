MyApp.controller("ratingPlanDetailCtrl", ["$scope", "$http", "$timeout", function ($scope, $http, $timeout) {
    $scope.ratingPlan = null;
    $scope.sequences = [];
    $scope.sequenceForAdd = null;
    $scope.elementsKits = [];
    $scope.meshDirectory = null;
    
    var type_sequence = 1;
    var type_moment = 2;
    var type_experience = 3;
    var type_kit = 4;
    var type_element = 5;
    
    $scope.selectComplete = false;
    $scope.requiredMoment = false;
    $scope.errorMessageFilter = '';
    $("#toast-name-1").fadeOut();
    
    var scrollOrig = $("#toast-name-1").offset().top;
    var scrollOrig = $("#toast-name-1").offset().left;
    
    function clickSelected(totalSequences, ratingPlanCount) {
      $scope.messageToast = 'Has seleccionado ' + totalSequences + ' de ' + ratingPlanCount + '  secuencias.';
      $("#toast-name-1").fadeIn(400).delay(1000).fadeOut(400);
      $("#toast-name-1").css('top',scrollOrig + $(window).scrollTop());
    };

    $scope.init = function(company_id, ratingPlanId, sequence_id) {
        $scope.defaultCompanySequences = company_id;
        $('.d-none-result').removeClass('d-none');
        
        $http({
            url:"/get_rating_plan/" + ratingPlanId,
            method: "GET",
        }).
        then(function (response) {
            $scope.ratingPlan = response.data ? response.data.data || response.data : response;
            $scope.ratingPlan = ( $scope.ratingPlan && $scope.ratingPlan.length ) ? $scope.ratingPlan[0] : $scope.ratingPlan;
            $scope.requiredMoment = $scope.ratingPlan.type_rating_plan_id === 2;
            $scope.requiredExperience = $scope.ratingPlan.type_rating_plan_id === 3;
            
            if($scope.requiredMoment && sequence_id) { 
                $('#moment_div_responsive_ForAdd').addClass('show');
            }

            
        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error consultando los planes de acceso, compruebe su conexión a internet';
        });
        
        $http({
            url:"/get_company_sequences/" + company_id,
            method: "GET",
        }).
        then(function (response) {
            $scope.sequences = response.data.companySequences;
            var listTemp = [];
            
            for(var i=0;i<$scope.sequences.length;i++) {
                if(Number($scope.sequences[i].id) ===  Number(sequence_id) ) {
                    $scope.sequenceForAdd = Object.assign({},$scope.sequences[i]) ;
                    $scope.sequenceForAdd.isSelected = true;
                    clickSelected(1, $scope.ratingPlan.count);
                    
                    $scope.selectComplete =  Number($scope.ratingPlan.count) === 1;
                    if($scope.selectComplete) {
                        $('.confirm_rating').addClass("btn-primary");
                        $('.confirm_rating').removeClass("btn-outline-primary");
                    }
                    else {
                        $('.confirm_rating').removeClass("btn-primary");
                        $('.confirm_rating').addClass("btn-outline-primary");
                    }
                    
                }
                else {
                    listTemp.push($scope.sequences[i]);
                }
            }
            $scope.sequences = listTemp;
            
        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error consultando las guías de aprendizaje, compruebe su conexión a internet';
        });
    }
    
    $scope.onCheckChange = function(sequence,moment,sequenceForAdd) {
        
        if(!$scope.ratingPlan) return;
        
        //Rating plan for sequence
        if( $scope.ratingPlan.type_rating_plan_id === type_sequence) {
            var totalSequences = 0;
            
            if($scope.sequenceForAdd && $scope.sequenceForAdd.isSelected ) {
                totalSequences++;
            }
            
            angular.forEach($scope.sequences, function(sequenceTmp, key) {
              if(sequenceTmp.isSelected) totalSequences++;
            });
            
            if(totalSequences > $scope.ratingPlan.count) {
                sequence.isSelected = false;
                swal({
                  title: "Número máximo de secuencias permitidas",
                  buttons: true,
                  dangerMode: true,
                })
            }
            else {
                $scope.selectComplete = totalSequences === $scope.ratingPlan.count;
                if($scope.selectComplete) {
                    $('.confirm_rating').addClass("btn-primary");
                    $('.confirm_rating').removeClass("btn-outline-primary");
                }
                else {
                    $('.confirm_rating').removeClass("btn-primary");
                    $('.confirm_rating').addClass("btn-outline-primary");
                }
                
                clickSelected(totalSequences, $scope.ratingPlan.count);
            }
        }
        //Rating plan for moment or experience
        else if($scope.ratingPlan.type_rating_plan_id === type_moment || $scope.ratingPlan.type_rating_plan_id === type_experience) {

            var totalMoments = 0;
            
            $('#moment_div_responsive_ForAdd').removeClass('show');
            
            if(sequenceForAdd) {
                $('#moment_div_responsive_ForAdd').addClass('show');
            }
            else {
                if(sequence.isSelected) {
                    $('#moment_div_responsive_'+sequence.id).addClass('show');
                }
                else {
                    $('#moment_div_responsive_'+sequence.id).removeClass('show');            
                }
            }
            
            angular.forEach($scope.sequences, function(sequenceTmp, key) {
              if(sequenceTmp.isSelected) {
                angular.forEach(sequenceTmp.moments, function(momentTmp, key) {
                    if(momentTmp.isSelected) totalMoments++;
                });
              }
            });
            
            if($scope.sequenceForAdd) {
                angular.forEach($scope.sequenceForAdd.moments, function(momentTmp, key) {
                    if(momentTmp.isSelected) totalMoments++;
                });
            }
            
            if(totalMoments > $scope.ratingPlan.count && $scope.ratingPlan.count > 0) {
                moment.isSelected = false;
                swal({
                  title: "Número máximo de momentos permitidos",
                  type: "error",
                  buttons: true,
                  dangerMode: true,
                })
            }
            else { 
                $scope.selectComplete = ( totalMoments === $scope.ratingPlan.count || $scope.ratingPlan.count === 0) && totalMoments > 0;
                if($scope.selectComplete) {
                    $('.confirm_rating').addClass("btn-primary");
                    $('.confirm_rating').removeClass("btn-outline-primary");
                }
                else {
                    $('.confirm_rating').removeClass("btn-primary");
                    $('.confirm_rating').addClass("btn-outline-primary");
                }
            }
        }
    
    }
    
    $scope.onContinueElements = function() {
        
        window.scrollTo( 0, 0 );
        
        function searchElementKit(elementKit) {
            for(var i=0;i<$scope.elementsKits.length;i++) {
                if($scope.elementsKits[i].type === elementKit.type && $scope.elementsKits[i].id === elementKit.id)
                return true;
            }
            return false;
        }

        $scope.elementsKits = [];
        for(var s=0;s<$scope.sequences.length;s++) {
            var sequenceTmp = $scope.sequences[s];
            if(sequenceTmp.isSelected && sequenceTmp.moments ) {
                var mbAdd = true;
                var kit,moment,element = null;
                
                for(var i=0;i<sequenceTmp.moments.length;i++) {
                    moment = sequenceTmp.moments[i];
                    for(var j=0;j<moment.moment_kit.length;i++) {
                        kit = moment.moment_kit[i].kit;
                        if(kit) {
                            kit.type = 'kit';
                            if(!searchElementKit(kit)) {
                                $scope.elementsKits.push(kit);
                            }
                            for(var j=0;j<kit.kit_elements.length;j++) {
                                element = kit.kit_elements[j].element;
                                element.type = 'element';
                                if(!searchElementKit(element)) {
                                    $scope.elementsKits.push(element);
                                }
                            }
                        }
                        else {
                            element = moment.moment_kit[i].element;
                            if(element) {
                                element.type = 'element';
                                if(!searchElementKit(element)) {
                                    $scope.elementsKits.push(element);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    
    $scope.onContinuePayment = function() {
        
        //retrive products to add shoppingCart
        var products = [];
        var moment = null;
        for(var s = 0; s < $scope.sequences.length; s++) {
            var sequenceTmp = $scope.sequences[s];
            if(sequenceTmp.isSelected) {
                if($scope.ratingPlan.type_rating_plan_id === type_sequence) {
                    products.push({id:sequenceTmp.id});
                }
                if($scope.ratingPlan.type_rating_plan_id === type_moment || $scope.ratingPlan.type_rating_plan_id === type_experience) {
                    
                    for(var i=0; i < sequenceTmp.moments.length; i++ ) {
                        var moment = sequenceTmp.moments[i];
                        if(moment.isSelected) {
                            products.push({id:moment.id});        
                        }
                    }
                }
            }
        }
        
        var ratingPlanData = { 'type_product_id': $scope.ratingPlan.type_rating_plan_id,'rating_plan_id': $scope.ratingPlan.id, 'products': products};
        var kitsData =     { 'type_product_id': 4, products: [] };
        var elementsData =     { 'type_product_id': 5, products: [] };
        
        if($scope.elementsKits.length>0) {
            for(var i=0; i < $scope.elementsKits.length; i++) {
                if($scope.elementsKits[i].isSelected) {
                    if($scope.elementsKits[i].type === 'kit') {
                        kitsData.products.push($scope.elementsKits[i]);
                    }
                    else if($scope.elementsKits[i].type === 'element') {
                        elementsData.products.push($scope.elementsKits[i]);
                    }
                }
            }
        }
        
        var data = [ratingPlanData];
        
        if(kitsData.products.length > 0) {
            data.push(kitsData);
        }
        if(elementsData.products.length > 0) {
            data.push(elementsData);
        }
        
        $('#move').addClass('fa fa-spinner fa-spin');
        $('#move').next().addClass('d-none');
        
        $http({
            url:"/create_shopping_cart",
            method: "POST",
            data: data
        }).
        then(function (response) {
            if(response && response.data && typeof response.data === 'object') {
                $('#move').removeClass('fa fa-spinner fa-spin');
                var message = response.data.message || 'Se ha registrado el producto correctamente';
                swal('Conexiones',message,'success');
                $('#move').next().removeClass('d-none');
               window.location = '/carrito_de_compras';
            }
            else {
                $scope.errorMessageFilter = 'Error agregando el pedido al carrito de compras, por favor intenta nuevamente';
                swal('Conexiones',$scope.errorMessageFilter,'error');
                $('#move').removeClass('fa fa-spinner fa-spin');
                $('#move').next().removeClass('d-none');
            }
            
        }).catch(function (e) {
            $scope.errorMessageFilter = 'Error agregando el pedido al carrito de compras, comprueba tu conexión a internet';
            swal('Conexiones',$scope.errorMessageFilter,'error');
            $('#move').removeClass('fa fa-spinner fa-spin');
            $('#move').next().removeClass('d-none');
        });
    }
    
    
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

}]);

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
