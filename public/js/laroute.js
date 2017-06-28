(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"api\/admin\/tags\/add","name":"api.tags_add","action":"App\Http\Controllers\ApiController@addTag"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/admin\/tags","name":"api.tags_get_by_locale","action":"App\Http\Controllers\ApiController@getTagsByLocale"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/admin\/categories","name":"api.categories_get_by_locale","action":"App\Http\Controllers\ApiController@getCategoriesByLocale"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/admin\/views","name":"api.views_get_by_type","action":"App\Http\Controllers\ApiController@getViewsByType"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/admin\/views\/posts","name":"api.views_get_by_post","action":"App\Http\Controllers\ApiController@getViewsByPost"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/espace-connexion","name":"admin.login","action":"App\Http\Controllers\AdminController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tags","name":"admin.tags","action":"App\Http\Controllers\AdminController@listTags"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.dashboard","action":"App\Http\Controllers\AdminController@dashBoard"},{"host":null,"methods":["POST"],"uri":"admin\/tags","name":"admin.tag_add","action":"App\Http\Controllers\ApiController@addTag"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/history","name":"admin.history","action":"App\Http\Controllers\AdminController@history"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/rollback\/{id}","name":"admin.rollback","action":"App\Http\Controllers\AdminController@rollBackPost"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/migrate","name":"admin.migrate_views","action":"App\Http\Controllers\AdminController@migrateViews"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/posts","name":"admin.posts","action":"App\Http\Controllers\AdminController@listPosts"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/posts\/create","name":"admin.posts_create","action":"App\Http\Controllers\AdminController@createPost"},{"host":null,"methods":["POST"],"uri":"admin\/posts\/create","name":"admin.posts_store","action":"App\Http\Controllers\AdminController@storePost"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/posts\/{id}","name":"admin.post_details","action":"App\Http\Controllers\AdminController@viewPost"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/posts\/delete\/{id}","name":"admin.post_delete","action":"App\Http\Controllers\AdminController@deletePost"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/posts\/edit\/{id}","name":"admin.post_edit","action":"App\Http\Controllers\AdminController@editPost"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/posts\/publish\/{id}","name":"admin.post_publish","action":"App\Http\Controllers\AdminController@publishPost"},{"host":null,"methods":["PUT"],"uri":"admin\/posts\/edit\/{id}","name":"admin.post_update","action":"App\Http\Controllers\AdminController@updatePost"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/posts\/previsualize\/{id}","name":"admin.post_previsualize","action":"App\Http\Controllers\AdminController@previsualizePost"},{"host":null,"methods":["POST"],"uri":"admin\/tags\/create","name":"admin.tag_store","action":"App\Http\Controllers\AdminController@storeTag"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tags\/delete\/{id}","name":"admin.tag_delete","action":"App\Http\Controllers\AdminController@deleteTag"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tags\/edit\/{id}","name":"admin.tag_edit","action":"App\Http\Controllers\AdminController@editTag"},{"host":null,"methods":["PUT"],"uri":"admin\/tags\/edit\/{id}","name":"admin.tag_update","action":"App\Http\Controllers\AdminController@updateTag"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tags\/{id}","name":"admin.tag_details","action":"App\Http\Controllers\AdminController@viewTag"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tags\/{id}\/posts","name":"admin.tags_assoc_posts","action":"App\Http\Controllers\AdminController@viewPostsByTag"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories","name":"admin.categories","action":"App\Http\Controllers\AdminController@listCategories"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories\/delete\/{id}","name":"admin.category_delete","action":"App\Http\Controllers\AdminController@deleteCategory"},{"host":null,"methods":["POST"],"uri":"admin\/categories\/create","name":"admin.category_store","action":"App\Http\Controllers\AdminController@storeCategory"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories\/{id}","name":"admin.category_details","action":"App\Http\Controllers\AdminController@viewCategory"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories\/edit\/{id}","name":"admin.category_edit","action":"App\Http\Controllers\AdminController@editCategory"},{"host":null,"methods":["PUT"],"uri":"admin\/categories\/edit\/{id}","name":"admin.category_update","action":"App\Http\Controllers\AdminController@updateCategory"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories\/{id}\/posts","name":"admin.categories_assoc_posts","action":"App\Http\Controllers\AdminController@viewPostsByCategory"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/messages","name":"admin.messages","action":"App\Http\Controllers\AdminController@listMessages"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/messages\/{id}","name":"admin.message_details","action":"App\Http\Controllers\AdminController@viewMessage"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/messages\/delete\/{id}","name":"admin.message_delete","action":"App\Http\Controllers\AdminController@deleteMessage"},{"host":null,"methods":["GET","HEAD"],"uri":"bienvenue","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/bienvenue","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"fr","name":"home","action":"App\Http\Controllers\MainController@home"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/faire-un-don","name":"donate","action":"App\Http\Controllers\MainController@donate"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/mentions-legales","name":"terms","action":"App\Http\Controllers\MainController@terms"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/contactez-nous","name":"contact","action":"App\Http\Controllers\MainController@contact"},{"host":null,"methods":["POST"],"uri":"fr\/contactez-nous","name":"post_message","action":"App\Http\Controllers\MainController@postMessage"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/qui-sommes-nous","name":"about","action":"App\Http\Controllers\MainController@about"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/notre-quotidien","name":"quotidien","action":"App\Http\Controllers\MainController@quotidien"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/actualites","name":"post_listing","action":"App\Http\Controllers\MainController@listPost"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/partenaires","name":"partners","action":"App\Http\Controllers\MainController@partners"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/actualites\/{slug}","name":"post_single","action":"App\Http\Controllers\MainController@viewPost"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/posts","name":"posts","action":"App\Http\Controllers\MainController@listPosts"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/tags\/{slug}","name":"posts_by_tag","action":"App\Http\Controllers\MainController@viewPostByTag"},{"host":null,"methods":["GET","HEAD"],"uri":"fr\/categories\/{slug}","name":"posts_by_category","action":"App\Http\Controllers\MainController@viewPostByCategory"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

