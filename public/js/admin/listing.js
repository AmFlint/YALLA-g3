var app = angular.module('App', []);

app.controller('MainCtrl', ['$scope', function($scope) {
    $scope.modals = null;

    $scope.test = true;

    $scope.posts = posts;

    $scope.deleteModal = function(post) {
        $scope.modals = post;
        console.log($scope.modals);
    };
}]);



