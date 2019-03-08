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

// ITEM CONTROLLER
Route::get('/home', 'ItemController@index')->name('home');

//Category
Route::get('category', 'CategoryController@index')->name('category.index');
Route::post('category/create', 'CategoryController@create')->name('category.create');
