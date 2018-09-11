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

/**
 * Authorization Routes
 */
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    //Route::post('me', 'AuthController@me');
});

/**
 * Articles
 */
Route::resource('articles', 'ArticleController', [
    'except' => ['create', 'edit']
]);

/**
 * Comments
 */
Route::get('comments/by-article/{articleId}', 'CommentController@getByArticle');
Route::post('comments/by-article/{articleId}', 'CommentController@addByArticle');

/**
 * Likes
 */
Route::patch('likes/by-article/{articleId}', 'LikeController@toggle');

/**
 * Rates
 */
Route::post('rates/by-article/{articleId}', 'RateController@set');
Route::delete('rates/by-article/{articleId}', 'RateController@remove');

