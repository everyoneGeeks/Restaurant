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


//Login 
Route::get('login','chefLoginController@showLoginForm');
Route::post('login','chefLoginController@login')->name('login');
//Table
Route::get('user/dashboard','chefController@home')->name('user.dashboard');
Route::get('user/table/list','chefController@table')->name('user.table');
Route::get('user/table/create','chefController@show_add_table')->name('user.form.table');
Route::get('user/table/edit','chefController@table')->name('user.table');
Route::get('user/table/update','chefController@add_table')->name('user.save.table');

//Food
Route::get('user/food/delete','chefController@table')->name('user.table');
Route::get('user/food/list','chefController@table')->name('user.table');
Route::get('user/food/create','chefController@table')->name('user.table');
Route::get('user/food/save','chefController@table')->name('user.table');
Route::get('user/food/edit','chefController@table')->name('user.table');
Route::get('user/food/update','chefController@table')->name('user.table');
Route::get('user/food/delete','chefController@table')->name('user.table');

//Category
Route::get('user/category/list','chefController@table')->name('user.table');
Route::get('user/category/create','chefController@table')->name('user.table');
Route::get('user/category/save','chefController@table')->name('user.table');
Route::get('user/category/edit','chefController@table')->name('user.table');
Route::get('user/category/update','chefController@table')->name('user.table');
Route::get('user/category/delete','chefController@table')->name('user.table');
//logout 
Route::get('logout',function (){Auth::logout();})->name('logout');