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
    return view('welcome');
});

Route::prefix('admin')->namespace('Admin')->group(function(){
	Route::resource('cards', 'CardController');
});

Route::redirect('/', '/member');
Route::get('/member', 'BuyController@create')->name('member.create');
Route::post('/member', 'BuyController@store')->name('member.store');
