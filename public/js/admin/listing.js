var app = angular.module('App', []);

app.controller('MainCtrl', ['$scope', '$http', function($scope, $http) {
    $scope.modals = null;

    $scope.test = true;

    $scope.posts = posts;

    $scope.deleteModal = function(post) {
        $scope.modals = post;
        console.log($scope.modals);
    };

    $scope.getPost = function()
    {
        var type = document.querySelector('#postCat').innerText;
        $scope.getDataByType(type);
    };

    $scope.getTag = function()
    {
        var type = document.querySelector('#tagCat').innerText;
        $scope.getDataByType(type);
    };

    $scope.getCategory = function()
    {
        var type = document.querySelector('#categoryCat').innerText;
        $scope.getDataByType(type);
    };

    $scope.getDataByType = function (type)
    {
        $http({
            method: 'get',
            url: root_route + laroute.action('api.views_get_by_type') + '?type=' + type
        }).then(function successCallback(data)
        {
            $scope.posts = data.data;
        }, function errorCallback(err)
        {
            console.log(err);
        });
    }
}]);





