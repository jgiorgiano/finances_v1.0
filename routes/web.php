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

Route::middleware(['auth', 'user'])->group(function(){
    Route::resource('account', 'UserController');
    Route::resource('account/{account}/phone', 'PhoneController');
    Route::resource('account/{account}/address', 'AddressController');
});

Route::middleware(['auth',  'user', 'groupMember'])->group(function(){
    Route::resource('account/{account}/group', 'GroupController');
    Route::post('account/{account}/group/{group}/invite', 'GroupController@invite')->name('group.invite');
    Route::DELETE('account/{account}/group/{group}/delete/{member}', 'GroupController@deleteMember')->name('group.deleteMember');
    Route::DELETE('account/{account}/group/{group}/leave', 'GroupController@leaveGroup')->name('group.leave');
    Route::get('account/{account}/group/{group}/join', 'GroupController@joinGroup')->name('group.joinGroup');

    Route::DELETE('account/{account}/group/{group}/cancelInvitation/{id}', 'InvitationController@cancelInvitation')->name('group.cancelInvitation');

/* ROUTES FOR FINANCE MODULE */

    Route::get('account/{account}/group/{group}/home', function(){
        return view('finance.home');
    });

    Route::resource('account/{account}/group/{group}/categorias',       '\App\ModuleFinance\Controllers\CategoriaController');
    Route::resource('account/{account}/group/{group}/situacao',         '\App\ModuleFinance\Controllers\SituacaoController');
    Route::resource('account/{account}/group/{group}/formapagamento',   '\App\ModuleFinance\Controllers\FormaPagamentoController');
    Route::resource('account/{account}/group/{group}/contacorrente',    '\App\ModuleFinance\Controllers\ContaCorrenteController');
    Route::resource('account/{account}/group/{group}/pagamentos',       '\App\ModuleFinance\Controllers\PagamentoController');
    Route::resource('account/{account}/group/{group}/grupofinanceiro',  '\App\ModuleFinance\Controllers\GrupoFinanceiroController');


});

Route::get('account/{account}/create/{token}', 'UserController@invitedForm');
Route::post('invited/Register', 'UserController@invitedRegister')->name('invited.register');


Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
