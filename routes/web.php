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
Route::delete('account/delete', 'AccountController@delete')->name('account.delete');
Route::get('account/get', 'AccountController@get')->name('account.get');
Route::put('account/update', 'AccountController@update')->name('account.update');
Route::put('account/updatePassword', 'AccountController@updatePassword')->name('account.update.password');

// Notification
Route::get('notification', 'NotificationController@index')->name('notification.index');
Route::get('notification/list', 'NotificationController@list')->name('notification.list');
Route::get('notification/all', 'NotificationController@all')->name('notification.all');

// Item
Route::get('item', 'ItemController@index')->name('item.index');
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
Route::get('request', 'RequestItemController@index')->name('request.index');
Route::get('request/list', 'RequestItemController@list')->name('request.list');
Route::post('request/create', 'RequestItemController@create')->name('request.create');
Route::put('request/update', 'RequestItemController@update')->name('request.update');

//Borrowed Item
Route::get('borrowed', 'BorrowedItemController@index')->name('borrowed.index');
Route::get('borrowed/list', 'BorrowedItemController@list')->name('borrowed.list');
Route::delete('borrowed/delete', 'BorrowedItemController@delete')->name('borrowed.delete');

// Purchase Request
Route::get('purchase/list', 'PurchaseRequestController@list')->name('purchase.list');
Route::get('purchase/employee/list', 'PurchaseRequestController@borrowedList')->name('purchase.borrowed.list');
Route::put('purchase/update', 'PurchaseRequestController@update')->name('purchase.update');

// Reports
Route::get('dashboard', 'ReportController@index')->name('borrowed.reports');
Route::get('dashboard/requests', 'ReportController@borrowedReports')->name('borrowed.accept');
Route::get('dashboard/members', 'ReportController@memberReports')->name('borrowed.member');
Route::get('dashboard/totalMembers', 'ReportController@totalMembers')->name('borrowed.total');
Route::get('dashboard/totalItems', 'ReportController@totalItems')->name('borrowed.total.items');
Route::get('dashboard/totalRequest', 'ReportController@totalRequest')->name('borrowed.total.request');