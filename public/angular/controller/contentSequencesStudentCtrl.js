MyApp.controller("contentSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {
    
    $scope.errorMessage = null;
    $scope.sequences = null;
    
    $scope.init = function(companyId,sequenceId) {
        initializeSize();
        getAvailableSequences(companyId,sequenceId);
    }
    
    function getAvailableSequences(companyId,sequenceId) {
        
        $http({
            url:"/conexiones/get_available_sequences/" + companyId,
            method: "GET",
        }).
        then(function (response) {
            $scope.sequences = response.data;
            var spc = null;
            $('.button-moment-validate[conx-action]').each(function(index, value){
                var momentId = Number($(value).attr('conx-action').split('|')[1]);
                for(var i=0;i<$scope.sequences.length;i++) {
                    scp = $scope.sequences[i];
                    if(scp.sequence_id === sequenceId) {
                        if(scp.type_product_id===1)  {
                            $(this).removeClass('cursor-not-allowed');
                        }
                        else if(scp.type_product_id===2 && scp.moment_id === momentId) {
                            $(this).removeClass('cursor-not-allowed');
                            $(this).attr('disabled',false);
                            $(this).prop('disabled', false);
                        }
                        else if(scp.type_product_id===3 ) {
                            $(this).removeClass('cursor-not-allowed');
                        }
                    }
                }
            })
        }).catch(function (e) {
            $scope.errorMessage = 'Error consultando las secuencias, compruebe su conexión a internet';
            swal('Conexiones',$scope.errorMessage,'error');
        });
    }
    
    function initializeSize() {
        var background = $('.background-sequence-image');
        var card = $('.background-sequence-card');
        var w = Number(card.attr('w'));
        var h = Number(card.attr('h'));
        var newW = Number(card.css('width').replace('px',''));
        var newH = newW * h / w;
        card.css('height',newH);
        background.css('height',card.css('height').replace('px',''));
        originalW = Number(card.css('width').replace('px',''));
        originalH = Number(card.css('height').replace('px',''));
        resizeSequenceCard();
    }
    
    resizeSequenceCard();
    
    $( window ).resize(function() {
        initializeSize();
    });

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
        
        initializeSize();
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
        
        initializeSize();
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


var originalW = originalH = null;

function resizeSequenceCard () {
    var card = $('.background-sequence-card');
    
    var w = Number(card.attr('w'));
    var h = Number(card.attr('h'));
    var newW = Number(card.css('width').replace('px',''));
    var newH = Number(card.css('height').replace('px',''));
    
    var deltaW = originalW - newW;
    var deltaH = originalH - newH;
    
    originalW = Number(card.css('width').replace('px',''));
    originalH = Number(card.css('height').replace('px',''));
    
    $(card).find('[fs]').each(function(value,key){
        var fs = $(this).attr('fs');
        var newFs = fs;//( fs * newW / w);
        $(this).css('font-size',newFs+'px');
    });
    
    $(card).find('[mt]').each(function(value,key){
        var mt = $(this).attr('mt');
        var newMt = mt;//( mt * newH / h);
        $(this).addClass('position-absolute');
        $(this).css('top',newMt+'px');
    });
    
    $(card).find('[ml]').each(function(value,key){
        var ml = $(this).attr('ml');
        var newMl = ml;//( ml * newW / w);
        $(this).addClass('position-absolute');
        $(this).css('left',newMl+'px');
    });
    
    $(card).find('[w]').each(function(value,key){
        if($(this).attr('w')==='auto') {
            $(this).css('width','auto');    
        }
        else {
            var objH = Number($(this).attr('h'));
            var objW = Number($(this).attr('w'));
            $(this).addClass('position-absolute');
            $(this).css('width',objW+'px');
        }
    });
    
    $(card).find('[h]').each(function(value,key){
        if($(this).attr('h')==='auto') {
            $(this).css('height','auto');    
        }
        else {
            var objH = Number($(this).attr('h'));
            var objW = Number($(this).attr('w'));
            $(this).addClass('position-absolute');
            $(this).css('height',objH+'px');
        }
    });
    
    $('.d-none-result').removeClass('d-none');
    
}
