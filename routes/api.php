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

Route::get('forumposts', 'ForumpostAPIController@index');

Route::get('forumposts/{id}', 'ForumpostAPIController@show');

Route::post('forumposts', 'ForumpostAPIController@store');

Route::put('forumposts', 'ForumpostAPIController@store');

Route::delete('forumposts/{id}', 'ForumpostAPIController@destroy');
