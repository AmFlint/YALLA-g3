var app = angular.module('App' , []);

app.controller('MainCtrl',  ['$scope', '$http', function($scope, $http) {
    $scope.modals = null;

    $scope.test = true;

    $scope.posts = posts;

    $scope.type = 'post';

    $scope.localisation = false;

    $scope.deleteModal = function(post) {
        $scope.modals = post;
        console.log($scope.modals);
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
            console.log(data.data);

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
        if ($scope.sort === 'name') {
            $scope.descSort = !$scope.descSort;

        } else {
            $scope.sort = 'name';
            $scope.descSort = false;
        }
    };

    $scope.sortByView = function ()
    {
        if ($scope.sort === 'views') {
            $scope.descSort = !$scope.descSort;

        } else {
            $scope.sort = 'views';
            $scope.descSort = false;
        }
    }

    $scope.sortByFr = function ()
    {

    }

}]);












