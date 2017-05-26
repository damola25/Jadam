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

Route::get('/', 'CartController@displayProducts');
Route::post('/add', 'CartController@store');
Route::get('/cart', 'CartController@index');
Route::get('/clear', 'CartController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminController@showLoginForm')->name('admin.login');
	route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});