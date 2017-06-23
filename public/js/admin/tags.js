/**
 * Created by NicolasLEROY on 22/06/2017.
 */

var app = angular.module('tagApp', []);

app.controller('TacosCtrl', function ($scope, $http)
{
    $scope.locales = [
        {
            locale: 'fr_FR',
            language: 'Français'
        },
        {
            locale: 'en_EN',
            language: 'English'
        },
        {
            locale: 'ar_AR',
            language: 'Arabic'
        }
    ];

    $scope.published = 0;
    $scope.publishMessage = "Publier";
    
    $scope.publish = function() {
        
        if ($scope.published) {
            $scope.published = 0;
            $scope.publishMessage = "Publier";
        }
        else{
            $scope.published = 1;
            $scope.publishMessage = "Dépublier";
        }
    };

    $scope.getLocale = function (post)
    {
        for (var i = 0; i < $scope.locales.length; i++) {
            if ($scope.locales[i].locale == post.locale) {
                return i;
            }
        }
    };

    $scope.languages = $scope.locales[$scope.getLocale(post)];

    $scope.addTag = function ()
    {
        var location;
        if (typeof $scope.languages == 'string') {
            location = $scope.languages;
        } else {
            location = $scope.languages.locale;
        }
        event.preventDefault();
        if (this.inputTag.trim() == '') {
            return;
        }
        var req = {
            method: 'post',
            url: root_route + laroute.action('api.tags_add'),
            data: {
                locale: location,
                name: this.inputTag
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

    };
    $scope.tags = tags;
    $scope.tags_selected = [];
    if (typeof taggs_selected != "undefined") {
        $scope.tags_selected = taggs_selected;
        $scope.tags = tags;

    }
    $scope.selectTag = function(tag)
    {
        for (var i = 0; i < $scope.tags_selected.length; i++)
        {
            if ($scope.tags_selected[i].id == tag.id) {
                $scope.tags_selected.splice(i, 1);
                return;
            }
        }
        $scope.tags_selected.push(tag);
    };

    $scope.getTags = function(locale)
    {
        var req = {
            method: 'get',
            url: root_route + laroute.action('api.tags_get_by_locale', {locale: locale})
        };
        $http(req)
            .then(function successCallback(data) {
                $scope.tags = data.data;
                $scope.tags_selected = [];
            }, function errorCallback(err) {
               console.log(err);
            });
    };

    $scope.checkSelection = function(tag)
    {
        for (var i = 0; i < $scope.tags_selected.length; i++)
        {
            if ($scope.tags_selected[i].id == tag.id) {
                return true;
            }
        }
        return false;
    };
});