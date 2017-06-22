/**
 * Created by NicolasLEROY on 22/06/2017.
 */

var app = angular.module('tagApp', []);

app.controller('TacosCtrl', function ($scope, $http)
{
    $scope.addTag = function ()
    {
        event.preventDefault();
        if (this.inputTag.trim() == '') {
            return;
        }
        var req = {
            method: 'post',
            url: 'http://localhost:8888/YALLA/public' + laroute.action('api.tags_add'),
            data: {
                locale: 'fr_FR',
                name: this.inputTag,
            }
        };
        $http(req)
            .then(function successCallback (data)
            {
                $scope.tags.push(data.data);
                $scope.inputTag = '';
            }, function errorCallback (err) {
                console.log(err);
            });

        console.log(req);
    };
    $scope.tags = tags;
    $scope.tags_selected = [];
    $scope.selectTag = function(tag)
    {
        for (var i = 0; i < $scope.tags_selected.length; i++)
        {
            if ($scope.tags_selected[i] == tag) {
                $scope.tags_selected.splice(i, 1);
                return;
            }
        }
        $scope.tags_selected.push(tag);
    };

    $scope.checkSelection = function(tag)
    {
        for (var i = 0; i < $scope.tags_selected.length; i++)
        {
            if ($scope.tags_selected[i] == tag) {
                return true;
            }
        }
        return false;
    }
});