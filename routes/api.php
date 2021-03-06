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

Route::post('login','Api\loginController@login');
Route::post('table','Api\TableController@Tables');
Route::post('home','Api\HomeController@Home');
Route::post('food','Api\foodsController@food');
Route::post('offers','Api\OffersController@offers');