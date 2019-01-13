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

Route::resource('account', 'UserController')->middleware('auth');
Route::resource('account/{account}/phone', 'PhoneController');
Route::resource('account/{account}/address', 'AddressController');
Route::resource('account/{account}/group', 'GroupController');
Route::post('account/{account}/group/{group}/invite', 'GroupController@invite')->name('group.invite');
Route::DELETE('/group/{group}/member/{member}', 'GroupController@deleteMember')->name('group.deleteMember');
Route::get('/group/{group}/member/{member}', 'GroupController@joinGroup')->name('group.joinGroup');

Route::get('account/{account}/create/{token}', 'UserController@invitedForm');
Route::post('invited/Register', 'UserController@invitedRegister')->name('invited.register');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
