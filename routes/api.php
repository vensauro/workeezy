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
Route::post('login', 'ApiTokenController@login');
Route::post('register', 'ApiTokenController@register');

Route::group(['middleware' => ['auth:api'],'namespace' => 'API'], function () {

    Route::apiResources([
        'tasks' => 'TaskController',
        'users' => 'UserController'
    ]);

    Route::get('task/{id}', 'TaskController@userTasks');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
