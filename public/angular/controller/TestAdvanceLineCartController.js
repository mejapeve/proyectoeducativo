MyApp.controller('testAdvanceLineCartController', function ($scope, $http, $timeout) {

    $scope.init = function (data) {
        $(data).each(function (key, value) {
            $(`#circle${value.number_moment}${value.struct_content_id}`).attr('fill', 'yellow');
        });
    };

});

