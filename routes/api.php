<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/users', function (Request $request) {
//    return $request->user();
//
//});

Route::namespace('Api')->prefix('v1')->middleware('cors')->group(function () {
    Route::get('/users', 'UserController@index')->name('users.index');

    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
    Route::post('login', 'UserController@login')->name('users.login');
    Route::get('/kuaishou_monitor','KwaiController@monitor')->name('kwai.monitor');
});
