<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {

    Route::get('tags', 'AdminController@tag');

	Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'AdminController@dashBoard']);

    Route::post('tags', ['as' => 'admin.tag_add', 'uses' => 'ApiController@addTag']);

    Route::get('history', ['as' => 'admin.history', 'uses' => 'AdminController@history']);

    Route::get('rollback/{id}', ['as' => 'admin.rollback', 'uses' => 'AdminController@rollBackPost'])
    ->where('id', '[0-9]+');

    Route::prefix('posts')->group(function() {

        Route::get('/', ['as' => 'admin.posts', 'uses' => 'AdminController@listPosts']);

        Route::get('create', ['as' => 'admin.posts_create', 'uses' => 'AdminController@createPost']);

        Route::post('create', ['as' => 'admin.posts_store', 'uses' => 'AdminController@storePost']);

        Route::get('/{id}', ['as' => 'admin.post_details', 'uses' => 'AdminController@viewPost'])
            ->where('id', '[0-9]+');

        Route::get('/delete/{id}', ['as' => 'admin.post_delete', 'uses' => 'AdminController@deletePost'])
            ->where('id', '[0-9]+');

        Route::get('/edit/{id}', ['as' => 'admin.post_edit', 'uses' => 'AdminController@editPost'])
        ->where('id', '[0-9]+');

        Route::get('/publish/{id}', ['as' => 'admin.post_publish', 'uses' => 'AdminController@publishPost'])
            ->where('id', '[0-9]+');

        Route::put('/edit/{id}', ['as' => 'admin.post_update', 'uses' => 'AdminController@updatePost']);

        Route::get('/previsualize/{id}', ['as' => 'admin.post_previsualize', 'uses' => 'AdminController@previsualizePost'])
            ->where('id', '[0-9]+');
    });

    Route::prefix('tags')->group(function() {

        Route::get('', ['as' => 'admin.tags', 'uses' => 'AdminController@listTags']);

        Route::post('/create', ['as' => 'admin.tag_store', 'uses' => 'AdminController@storeTag']);

        Route::get('/delete/{id}', ['as' => 'admin.tag_delete', 'uses' => 'AdminController@deleteTag'])
        ->where('id', '[0-9]+');

        Route::get('/edit/{id}', ['as' => 'admin.tag_edit', 'uses' => 'AdminController@editTag'])
        ->where('id', '[0-9]+');

        Route::put('/edit/{id}', ['as' => 'admin.tag_update', 'uses' => 'AdminController@updateTag'])
            ->where('id', '[0-9]+');

        Route::get('{id}', ['as' => 'admin.tag_details', 'uses' => 'AdminController@viewTag'])
            ->where('id', '[0-9]+');

        Route::get('{id}/posts', ['as' => 'admin.tags_assoc_posts', 'uses' => 'AdminController@viewPostsByTag'])
            ->where('id', '[0-9]+');
    });

    Route::prefix('categories')->group(function() {
        Route::get('', ['as' => 'admin.categories', 'uses' => 'AdminController@listCategories']);

        Route::get('/delete/{id}', ['as' => 'admin.category_delete', 'uses' => 'AdminController@deleteCategory'])
            ->where('id', '[0-9]+');

        Route::post('/create', ['as' => 'admin.category_store', 'uses' => 'AdminController@storeCategory']);

        Route::get('{id}', ['as' => 'admin.category_details', 'uses' => 'AdminController@viewCategory'])
            ->where('id', '[0-9]+');

        Route::get('edit/{id}', ['as' => 'admin.category_edit', 'uses' => 'AdminController@editCategory'])
            ->where('id', '[0-9]+');

        Route::put('edit/{id}', ['as' => 'admin.category_update', 'uses' => 'AdminController@updateCategory'])
            ->where('id', '[0-9]+');

        Route::get('{id}/posts', ['as' => 'admin.categories_assoc_posts', 'uses' => 'AdminController@viewPostsByCategory'])
            ->where('id', '[0-9]+');
    });

});

Route::get(Lang::get('routes.welcome'), function() {
    return 'yoo';
});

Route::get(App::getLocale() . '/' . Lang::get('routes.welcome'), function() {
   return 'salut';
});

Route::prefix(App::getLocale())->group(function() {
    Route::get('', ['as' => 'home', 'uses' => 'MainController@home']);

    Route::get(Lang::get('routes.about'), ['as' => 'about', 'uses' => 'MainController@about']);

    Route::get(Lang::get('routes.welcome'), function() {
        return 'tu es sur la page' . App::getLocale();
    });

    Route::get(Lang::get('routes.actu'), ['as' => 'post_listing', 'uses' => 'MainController@listPost']);

    Route::get(Lang::get('routes.actu') . '/{slug}', ['as' => 'post_single', 'uses' => 'MainController@viewPost'])
    ->where('slug', '[a-z0-9\-]+');

    Route::get('posts', ['as' => "posts", 'uses' => 'MainController@listPosts']);
});
