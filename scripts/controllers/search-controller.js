/**
 * Created by joao on 18/10/15.
 */
angular.module('PBAapp',['ngRoute'])

    .controller('SearchController',['$scope', function ($scope) {
        $scope.search = function(query) {
            $.ajax({
            	url: getData.ajaxDir,
            	type: "GET",
            	dataType: "html",
            	data: {
            		action: "pba_search_form",
            		keyword: query
            	},
            	success: function(data) {
            		$('.the-results').html(data);
            	}
            });
        };
    }]);

