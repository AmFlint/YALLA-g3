var app = angular.module('App' , []);

app.controller('MainCtrl',  ['$scope', '$http', function($scope, $http) {
    $scope.graph = null;

    $scope.modals = null;

    $scope.test = true;

    $scope.posts = posts;

    $scope.type = 'post';

    $scope.localisation = false;

    $scope.deleteModal = function(post) {
        $scope.modals = post;
    };

    $scope.getPost = function()
    {
        $scope.type = 'post';
        $scope.getDataByType($scope.type, $scope.localisation);
    };

    $scope.getTag = function()
    {
        $scope.type = 'tag';
        $scope.getDataByType($scope.type, $scope.localisation);
    };

    $scope.getCategory = function()
    {
        $scope.type = 'category';
        $scope.getDataByType($scope.type, $scope.localisation);
    };

    $scope.getFr = function ()
    {
        if ($scope.localisation == 'fr') {
            $scope.localisation = false;
        } else {
            $scope.localisation = 'fr';
        }
        $scope.getDataByType($scope.type, $scope.localisation);
    };

    $scope.getEn = function ()
    {
        if ($scope.localisation == 'en') {
            $scope.localisation = false;
        } else {
            $scope.localisation = 'en';
        }
        $scope.getDataByType($scope.type, $scope.localisation);
    };

    $scope.getAr = function ()
    {
        if ($scope.localisation == 'ar') {
            $scope.localisation = false;
        } else {
            $scope.localisation = 'ar';
        }
        $scope.getDataByType($scope.type, $scope.localisation);
    };



    $scope.getDataByType = function (type, locale)
    {
        var localisation;
        if (locale) {
            localisation = '&locale=' + locale;
        } else {
            localisation = '';
        }

        $http({
            method: 'get',
            url: root_route + laroute.action('api.views_get_by_type') + '?type=' + type + localisation
        }).then(function successCallback(data)
        {
            $scope.posts = data.data;
        }, function errorCallback(err)
        {
            console.log(err);
        });
    };

    $scope.sort = null;
    $scope.descSort = false;
    $scope.sortById = function ()
    {
        if ($scope.sort === 'id') {
            $scope.descSort = !$scope.descSort;

        } else {
            $scope.sort = 'id';
            $scope.descSort = false;
        }
    };

    $scope.sortByName = function ()
    {
        if (($scope.sort === 'name' && $scope.type != 'post') || ($scope.sort == 'title' && $scope.type == 'post')) {
            $scope.descSort = !$scope.descSort;
        } else if ($scope.type == 'post') {
            $scope.sort = 'title';
            $scope.descSort = false;
        } else {
            $scope.sort = 'name';
            $scope.descSort = false;
        }
    };

    $scope.sortByLocale = function()
    {
        if ($scope.sort === 'locale') {
            $scope.descSort = !$scope.descSort;

        } else {
            $scope.sort = 'locale';
            $scope.descSort = false;
        }
    };

    $scope.sortByView = function ()
    {
        if ($scope.sort === 'view') {
            $scope.descSort = !$scope.descSort;

        } else {
            $scope.sort = 'view';
            $scope.descSort = false;
        }
    };

    $scope.showGraph = function (post)
    {
        if (typeof $scope.posts[0].published == 'undefined') {
            return;
        }

        $http({
            method: 'get',
            url: root_route + laroute.action('api.views_get_by_type') + '?id=' + post.id
        }).then(function successCallback(data)
        {
            $scope.posts = data.data;
        }, function errorCallback(err)
        {
            console.log(err);
        });

        console.log(data.datasets.label)

    }

}]);












