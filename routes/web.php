<?php

Route::group(['middleware' => ['chef:chef']], function () {

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
Route::get('/user/food/info/{id}','FoodsController@info_food')->name('info.food');
Route::get('/user/food/kitchen/delete/{id}','FoodsController@delete_kitchen_food')->name('delete.food.kitchen');
Route::get('/user/food/kitchen/add/{id}','FoodsController@add_form_kitchen_food')->name('add.food.kitchen.form');
Route::post('/user/food/kitchen/add/{id}','FoodsController@add_kitchen_food')->name('add.food.kitchen');

//kitchen
Route::get('/user/kitchen/list','FoodsController@show_Food_content')->name('kitchen');
Route::get('/user/kitchen/create','FoodsController@form_Food_content')->name('add.kitchen');
Route::post('/user/kitchen/save','FoodsController@add_Food_content')->name('save.kitchen');
Route::get('/user/kitchen/edit/{id}','FoodsController@form_edit_Food_content')->name('edit.kitchen');
Route::post('/user/kitchen/update/{id}','FoodsController@edit_Food_content')->name('update.kitchen');
Route::get('/user/kitchen/delete/{id}','FoodsController@delete_Food_content')->name('delete.kitchen');

//Update chef Info
Route::get('/user/show','AdminLoginController@edit')->name('chef.edit');
Route::post('/user/update','AdminLoginController@update')->name('chef.update');

});
//Login
// login system chef





Route::get('login','chefLoginController@showLoginForm')->middleware('guest:chef');
Route::post('login','chefLoginController@login')->name('login');

Route::get('/',function(){
    return view('welcome');
});

Route::post('logout',function (){
    Auth::guard('chef')->logout();
    return redirect(route('login'));
})->name('logout');