/**
 * Created by joao on 18/10/15.
 */
angular.module('PBAapp',['ngRoute'])
    .controller('SearchController',['$scope', function ($scope) {
        $scope.search = function(query) {
            console.log(query.term);
        };
    }]);