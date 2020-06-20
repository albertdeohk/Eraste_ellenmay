<?php

use Illuminate\Support\Facades\Route;

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



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','checkRole'])
    ->group( function () {
        Route::resource('product', 'ProductController');
        Route::get('product/datatable', 'ProductController@datatable')->name('product.datatable');
        Route::resource('user', 'UserController');
        Route::get('user/datatable', 'UserController@datatable')->name('user.datatable');
        Route::resource('order', 'OrderController');
        Route::get('order/datatable', 'OrderController@datatable')->name('order.datatable');
});
Route::get('order/product/{product}/detail', 'OrderController@detail')->name('_order.detail');
Route::post('order/product/{product}', 'OrderController@create')->name('_order.create');
Route::get('order/success/{order}', 'OrderController@success')->name('_order.success');

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
