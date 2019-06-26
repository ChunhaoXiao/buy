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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->namespace('Admin')->middleware('auth:admin')->group(function(){
	Route::resource('cards', 'CardController');
	Route::get('/download', 'DownloadController@index')->name('download.index');
	Route::post('/logout', 'AuthController@logout')->name('admin.logout');
});

Route::get('/admin/login', 'Admin\AuthController@showLogin')->name('showlogin');
Route::post('/admin/login', 'Admin\AuthController@login')->name('admin.login');

Route::redirect('/', '/member');
Route::get('/member', 'BuyController@create')->name('member.create');
Route::post('/member', 'BuyController@store')->name('member.store');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');