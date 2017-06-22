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

	Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'AdminController@dashBoard']);

	Route::get('/posts', ['as' => 'admin.posts', 'uses' => 'AdminController@listPosts']);

    Route::get('/posts/create', ['as' => 'admin.posts_create', 'uses' => 'AdminController@createPost']);

    Route::post('/posts/create', ['as' => 'admin.posts_store', 'uses' => 'AdminController@storePost']);

});

Route::get(Lang::get('routes.welcome'), function() {
    return 'yoo';
});