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

    Route::prefix('posts')->group(function() {

        Route::get('/', ['as' => 'admin.posts', 'uses' => 'AdminController@listPosts']);

        Route::get('create', ['as' => 'admin.posts_create', 'uses' => 'AdminController@createPost']);

        Route::post('create', ['as' => 'admin.posts_store', 'uses' => 'AdminController@storePost']);

        Route::get('/{id}', ['as' => 'admin.posts_details', 'uses' => 'AdminController@viewPost'])
            ->where('id', '[0-9]+');

        Route::get('/delete/{id}', ['as' => 'admin.post_delete', 'uses' => 'AdminController@deletePost'])
            ->where('id', '[0-9]+');
    });

});

Route::get(Lang::get('routes.welcome'), function() {
    return 'yoo';
});