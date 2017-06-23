<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function() {
    Route::post('tags/add', ['as' => 'api.tags_add', 'uses' => 'ApiController@addTag']);

    Route::get('tags', ['as' => 'api.tags_get_by_locale', 'uses' => 'ApiController@getTagsByLocale'])
        ->where('locale', '[a-zA-Z\_]+');

    Route::prefix('views')->group(function() {

        Route::get('/', ['as' => 'api.views_get_by_type', 'uses' => 'ApiController@getViewsByType']);

    });

});

