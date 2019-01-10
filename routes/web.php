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

Route::get('/phone', 'PhoneController@index');

Route::resource('account', 'AccountController')->middleware('auth');
Route::resource('account/{account}/phone', 'PhoneController');
Route::resource('account/{account}/address', 'AddressController');
Route::resource('account/{account}/group', 'GroupController');
Route::post('account/{account}/group/{group}/invite', 'GroupController@invite')->name('group.invite');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
