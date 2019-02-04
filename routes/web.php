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
Route::get('/user/table/list','TablesController@table')->name('tables');
Route::get('/user/table/create','TablesController@create_table')->name('add.table');
Route::post('/user/table/save','TablesController@save_table')->name('save.table');
Route::get('/user/table/edit/{id}','TablesController@edit_table')->name('edit.table');
Route::post('/user/table/update/{id}','TablesController@update_table')->name('update.table');
Route::get('/user/table/delete/{id}','TablesController@delete_table')->name('delete.table');


//Category
Route::get('/user/category/list','CategoriesController@categories')->name('categories');
Route::get('/user/category/create','CategoriesController@create_category')->name('add.category');
Route::post('/user/category/save','CategoriesController@save_category')->name('save.category');
Route::get('/user/category/edit/{id}','CategoriesController@edit_category')->name('edit.category');
Route::post('/user/category/update/{id}','CategoriesController@update_category')->name('update.category');
Route::get('/user/category/delete/{id}','CategoriesController@delete_category')->name('delete.category');

//Food
Route::get('/user/food/list','FoodsController@foods')->name('foods');
Route::get('/user/food/create','FoodsController@create_food')->name('add.food');
Route::post('/user/food/save','FoodsController@save_food')->name('save.food');
Route::get('/user/food/edit/{id}','FoodsController@edit_food')->name('edit.food');
Route::post('/user/food/update/{id}','FoodsController@update_food')->name('update.food');
Route::get('/user/food/delete/{id}','FoodsController@delete_food')->name('delete.food');


//logout 
Route::get('logout',function (){Auth::logout();})->name('logout');