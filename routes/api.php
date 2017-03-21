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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/signin', 'API\AuthController@authLogin');
Route::get('/signup', 'API\AuthController@authRegister');
Route::get('/logout', 'API\AuthController@authLogout');

// Route::post('/article-store', 'API\ArticleController@storeData');
// Route::get('/article', 'API\ArticleController@getAllByUser');

Route::group(['prefix' => 'article'], function() {
	Route::get('/', 'API\ArticleController@getListData');
	Route::get('/', 'API\ArticleController@getListData');
	Route::get('/store', 'API\ArticleController@storeData');
});
