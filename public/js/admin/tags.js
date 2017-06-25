/**
 * Created by NicolasLEROY on 22/06/2017.
 */

var app = angular.module('tagApp', []);

app.controller('TacosCtrl', function ($scope, $http)
{
    // Locales used to generate select options in form for post language
    $scope.locales = [
        {
            locale: 'fr',
            language: 'Français'
        },
        {
            locale: 'en',
            language: 'English'
        },
        {
            locale: 'ar',
            language: 'Arabic'
        }
    ];

    $scope.tagColors = [
        {
            color: 'red'
        },
        {
            color: 'pink'
        },
        {
            color: 'blue'
        },
        {
            color: 'yellow'
        }
    ];

    $scope.getColor = function(color)
    {
        $scope.colorTag = color;
    };

    // At the start, post's published property initiated to 0
    $scope.inputTag = '';
    $scope.post = post;
    $scope.published = $scope.post.published;
    // publishMessage will change depending on post's published property state
    if ($scope.published == 1) {
        $scope.publishMessage = "Dépublier";
    } else {
        $scope.publishMessage = "Publier";
    }
    // Get categories from back end for category_id select
    $scope.categories = categories;
    // Change publishMessage depending on publish state, triggered on ng-click
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

    // getting locale from post --> initiate selected option in language selection (fr by default otherwise post's locale if edit)
    $scope.getLocale = function (post)
    {
        for (var i = 0; i < $scope.locales.length; i++) {
            if ($scope.locales[i].locale == post.locale) {
                return i;
            }
        }
    };
    // getting category from post --> initiate selected option in category selection (only in edit)
    $scope.getCategoryFromCategories = function (post)
    {
        for (var i = 0; i < $scope.categories.length; i++) {
            if ($scope.categories[i].id == post.category_id) {
                return i;
            }
        }
    };
    // initiating language selected option
    $scope.languages = $scope.locales[$scope.getLocale(post)];
    // intiating category selected option in admin/posts/create.blade.php
    $scope.category_id = $scope.categories[0];
    // add a tag in DataBase based on language selected --> AJAX call to admin api
    $scope.addTag = function ()
    {
        var location;
        // verification --> typeof languages differs from create to edit
        if (typeof $scope.languages == 'string') {
            location = $scope.languages;
        } else {
            location = $scope.languages.locale;
        }
        // Prevent submission
        event.preventDefault();
        // if a value is inserted into tag input (in Modal)
        if (this.inputTag.trim() == '' || $scope.colorTag == '') {
            return;
        }
        var req = {
            method: 'post',
            url: root_route + laroute.action('api.tags_add'),
            data: {
                locale: location,
                name: this.inputTag,
                color: $scope.colorTag
            }
        };
        // AJAX call, api returns the recently added tag
        $http(req)
            .then(function successCallback (data)
            {
                // push tag to tigger ng-repeat
                $scope.tags.push(data.data);
                // empty tag input (in Modal)
                $scope.inputTag = '';
                $scope.colorTag = '';
            }, function errorCallback (err) {
                console.log(err);
            });

    };
    // getting tags from backend once the page is loaded (will get fr by default in create, otherwise depending on post's locale)
    $scope.tags = tags;
    // in create, no tags are selected by default
    $scope.tags_selected = [];
    if (typeof taggs_selected != "undefined") {
        // on edit, we are getting the post's synchronised tags --> select them in edit to trigger ng-class
        $scope.tags_selected = taggs_selected;
        $scope.tags = tags;
    }
    // on edit, auto select post's current category in form
    if (typeof post.category_id != "undefined") {
        $scope.category_id = $scope.categories[$scope.getCategoryFromCategories(post)];
    }
    // select/unselect a tag triggered on ng-click on a tag (in Modal)
    $scope.selectTag = function(tag)
    {
        for (var i = 0; i < $scope.tags_selected.length; i++)
        {
            // if already selected, unselect tag
            if ($scope.tags_selected[i].id == tag.id) {
                $scope.tags_selected.splice(i, 1);
                return;
            }
        }
        // otherwise select it and trigger ng-repeat in select multiple for tag_lists[] (display none)
        $scope.tags_selected.push(tag);
    };
    // triggered on ng-change for language select --> refresh tags/categories according to selected locale / language
    $scope.getTagsAndCategories = function(locale)
    {
        $scope.getTags(locale);
        $scope.getCategories(locale);
    };
    // AJAX call to refresh available tags (in Modal)
    $scope.getTags = function(locale)
    {
        var req = {
            method: 'get',
            url: root_route + laroute.action('api.tags_get_by_locale', {locale: locale})
        };
        $http(req)
            .then(function successCallback(data) {
                $scope.tags = data.data;
                // empty selected tags
                // forbids post from a locale to synchronise tags from another locale
                $scope.tags_selected = [];
            }, function errorCallback(err) {
                console.log(err);
            });
    };
    // AJAX Call to admin api --> get categories on language select ng-change
    $scope.getCategories = function(locale)
    {
        var req = {
            method: 'get',
            url: root_route + laroute.action('api.categories_get_by_locale', {locale: locale})
        };
        $http(req)
            .then(function successCallback(data) {
                $scope.categories = data.data;
                // select default category
                $scope.category_id = $scope.categories[0];
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