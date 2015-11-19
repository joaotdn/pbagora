/**
 * Created by joao on 18/10/15.
 */
angular.module('PBAapp',['ngRoute'])

    .controller('SearchController',['$scope', function ($scope) {
        var timer = null;
        if(timer) {
            clearTimeout(timer);
        }

        function searchKeyword(query) {
            $.ajax({
                url: getData.ajaxDir,
                type: "GET",
                dataType: "html",
                data: {
                    action: "pba_search_form",
                    keyword: query
                },
                beforeSend: function() {
                    $('.the-results').html('<i class="small-12 left text-center">Aguarde...</i>');
                },
                success: function(data) {
                    $('.the-results').html(data);
                }
            });
        };

        $scope.search = function(query) {
            timer = setTimeout(searchKeyword(query), 300);
        };
    }]);

