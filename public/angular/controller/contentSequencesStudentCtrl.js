MyApp.controller("contentSequencesStudentCtrl", ["$scope", "$http", function ($scope, $http) {

    $scope.errorMessage = null;
    $scope.sequences = null;
	$scope.questionsOpened = null;

    $scope.init = function (companyId, sequenceId) {
        $('.d-none-result').removeClass('d-none');
        getAvailableSequences(companyId, sequenceId);
    }

    $scope.onClickEvidence = function(sequenceId,momentId,experienceId) {
		$scope.questionsOpened = null;
		$scope.evidenceId = experienceId;
		$('#' + $scope.evidenceId + ' img').addClass('d-none');
		$('#' + $scope.evidenceId + ' span').removeClass('d-none');
		$http({
            url: "/get_questions/"+sequenceId+"/"+momentId+"/"+experienceId,
            method: "GET",
        }).
        then(function (response) {
			$scope.questionsOpened = response.data.data;
			$('#' + $scope.evidenceId + ' img').removeClass('d-none');
			$('#' + $scope.evidenceId + ' span').addClass('d-none');
			
		}).catch(function (e) {
			$scope.errorMessage = 'Error consultando las preguntas, compruebe su conexión a internet';
			swal('Conexiones', $scope.errorMessage, 'error');
			$('#' + $scope.evidenceId + ' img').removeClass('d-none');
			$('#' + $scope.evidenceId + ' span').addClass('d-none');
		});
		
		
    }

	$scope.closeEvidence = function() {
		$scope.questionsOpened = null;
		$scope.evidenceId = experienceId;
	}
	
    function getAvailableSequences(companyId, sequenceId) {
        $http({
            url: "/conexiones/get_available_sequences/" + companyId,
            method: "GET",
        }).
            then(function (response) {
                $scope.sequences = response.data;
				$('.d-result').removeClass('d-none');
                resizeSequenceCard();
                $('#loading').addClass('d-none');
                $('.button-moment-validate[conx-action]').each(function (index, value) {
                    var momentId = Number($(value).attr('conx-action').split('|')[1]);
                    for (var i = 0; i < $scope.sequences.length; i++) {
                        scp = $scope.sequences[i];
                        if (scp.sequence_id === sequenceId) {
                            if (scp.type_product_id === 1) {
                                console.log($(this));
                                $(this).removeClass('cursor-not-allowed');
                                $(this).attr('disabled', false);
                                $(this).prop('disabled', false);
                            }
                            else if (scp.type_product_id === 2 && scp.moment_id === momentId) {
                                console.log($(this));
                                $(this).removeClass('cursor-not-allowed');
                                $(this).attr('disabled', false);
                                $(this).prop('disabled', false);
                            }
                            else if (scp.type_product_id === 3) {
                                console.log($(this));
                                $(this).removeClass('cursor-not-allowed');
                                $(this).attr('disabled', false);
                                $(this).prop('disabled', false);
                            }
                        }
                    }
                })
            }).catch(function (e) {
                $scope.errorMessage = 'Error consultando las secuencias, compruebe su conexión a internet';
                swal('Conexiones', $scope.errorMessage, 'error');
				$('.d-result').removeClass('d-none');
                $('#loading').addClass('d-none');
            });
    }
    $(window).resize(function () {
        resizeSequenceCard();
    });

    var hiddenSideMenu = function () {
        $('#sidemenu-sequences-button').removeClass('fa-caret-square-left');
        $('#sidemenu-sequences-button').addClass('fa-caret-square-right');
        $('#sidemenu-sequences-empty').addClass('show');
        $('#sidemenu-sequences-empty').removeClass('d-none');

        $('#sidemenu-sequences-content').addClass('d-none');
        $('#sidemenu-sequences-content').removeClass("show");
        $('#sidemenu-sequences-content').removeClass("d-md-block");

        $('#sidemenu-tools-content').addClass('d-none');
        $('#sidemenu-tools-content').removeClass("show");
        $('#sidemenu-tools-content').removeClass("d-md-block");

        $('#sidemenu-sequences').addClass("col-md-0_5");
        $('#sidemenu-sequences').removeClass("col-md-3");

        $('#content-section-sequences').removeClass("col-md-9");
        $('#content-section-sequences').addClass("col-md-11_5");

        resizeSequenceCard();
    };
    var showSideMenu = function () {
        $('#sidemenu-sequences-empty').removeClass('show');
        $('#sidemenu-sequences-empty').addClass('d-none');

        $('#sidemenu-sequences-content').removeClass('d-none');
        $('#sidemenu-sequences-content').addClass("show");
        $('#sidemenu-sequences-content').addClass("d-md-block");

        $('#sidemenu-tools-content').removeClass('d-none');
        $('#sidemenu-tools-content').addClass("show");
        $('#sidemenu-tools-content').addClass("d-md-block");

        $('#sidemenu-sequences-button').addClass('fa-caret-square-left');
        $('#sidemenu-sequences-button').removeClass('fa-caret-square-right');

        $('#sidemenu-sequences-hidden-side').removeClass("d-none");
        $('#sidemenu-sequences-content').removeClass("d-none");
        $('#sidemenu-sequences-empty').addClass("d-none");

        $('#sidemenu-tools-content').addClass("show");
        $('#sidemenu-tools-content').removeClass("d-none");

        $('#sidemenu-sequences').removeClass("col-md-0_5");
        $('#sidemenu-sequences').addClass("col-md-3");

        $('#content-section-sequences').addClass("col-md-9");
        $('#content-section-sequences').removeClass("col-md-11_5");

        resizeSequenceCard();
    }
    $scope.toggleSideMenu = function () {

        if ($('#sidemenu-sequences-button').hasClass('fa-caret-square-left')) {
            hiddenSideMenu();
        }
        else if ($('#sidemenu-sequences-button').hasClass('fa-caret-square-right')) {
            showSideMenu();
        }
        resizeSequenceCard();
    };

}]);

function resizeSequenceCard() {
    var card = $('.background-sequence-card');
    var background = $('.background-sequence-image');
    var w = Number(card.attr('w'));
    var h = Number(card.attr('h'));
    var newW = Number(card.css('width').replace('px', ''));
    var newH = newW * h / w;
    var deltaX = 1 + (newW - w) / w;
    card.css('height', newH  );
    var background = $('.background-sequence-image');
        background.css('width', card.css('width'));
        background.css('height', card.css('height'));
        

    $(card).find('[fs]').each(function (value, key) {
        var fs = $(this).attr('fs');
        var newFs = fs * deltaX;
        $(this).css('font-size', newFs + 'px');
    });

    $(card).find('[mt]').each(function (value, key) {
        var mt = $(this).attr('mt');
        var newMt = (mt * deltaX);
        $(this).addClass('position-absolute');
        $(this).css('top', newMt + 'px');
    });

    $(card).find('[ml]').each(function (value, key) {
        var ml = $(this).attr('ml');
        var newMl = (ml * deltaX);
        $(this).addClass('position-absolute');
        $(this).css('left', newMl + 'px');
    });

    $(card).find('[w]').each(function (value, key) {
        if ($(this).attr('w') === 'auto') {
            $(this).css('width', 'auto');
        }
        else {
            var w = Number($(this).attr('w')) * deltaX;
            $(this).addClass('position-absolute');
            $(this).css('width', w + 'px');
        }
    });

    $(card).find('[h]').each(function (value, key) {
        if ($(this).attr('h') === 'auto') {
            $(this).css('height', 'auto');
        }
        else {
            var h = Number($(this).attr('h')) * deltaX;
            $(this).addClass('position-absolute');
            $(this).css('height', h + 'px');
        }
    });
}
