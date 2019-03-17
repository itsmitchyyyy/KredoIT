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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Account
Route::get('account', 'AccountController@index')->name('account.index');
Route::get('account/list', 'AccountController@list')->name('account.list');
Route::post('account/create', 'AccountController@create')->name('account.create');

// Item
Route::get('/home', 'ItemController@index')->name('home');
Route::post('item/create', 'ItemController@create')->name('item.create');
Route::get('item/list', 'ItemController@list')->name('item.list');

//Category
Route::get('category', 'CategoryController@index')->name('category.index');
Route::post('category/create', 'CategoryController@create')->name('category.create');

//Model
Route::get('model', 'ModelController@index')->name('model.index');
Route::post('model/create', 'ModelController@create')->name('model.create');

//Brand
Route::get('brand', 'BrandController@index')->name('brand.index');
Route::post('brand/create', 'BrandController@create')->name('brand.create');

//Request Item
Route::post('request/create', 'RequestItemController@create')->name('request.create');

//Borrowed Item
Route::get('borrowed', 'BorrowedItemController@index')->name('borrowed.index');
Route::get('borrowed/list', 'BorrowedItemController@list')->name('borrowed.list');
Route::delete('borrowed/delete', 'BorrowedItemController@delete')->name('borrowed.delete');