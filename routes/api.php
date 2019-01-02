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


Route::group(['prefix' => 'game', 'namespace' => 'Api'], function () {
    Route::apiResource('scenes', 'SceneController');
    Route::get('player/{id}', 'GameController@getGame');
    Route::get('scene/{scene_id}/{player_id}/{prev_scene_id}', 'GameController@getScene');
    Route::apiResource('games', 'GameController');
});

