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

Route::get('/', function () {
    return redirect()->route('/login');
});

Auth::routes();
/**Route::get('/home', 'HomeController@index')->name('home');

Route::post('expedicao/', '') */
Route::get('/desmembramento/filial/{filial}/pedido/{pedido}', 'ExpedicaoController@getPedidosFilial')->name('get.pedido');
Route::post('/desmembramento/updatePedido', 'ExpedicaoController@updatePedido')->name('post.pedido');

// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Auth\Login')->group(function () {
    Route::get('login', 'EmpregadoController@showLoginForm')->name('login');
    Route::post('login', 'EmpregadoController@login')->name('login');
    Route::post('logout', 'EmpregadoController@logout')->name('logout');
});
Route::get('home', 'Home\EmpregadoHomeController@index')->name('home');
// Route::prefix('empregado')
//     ->as('empregado.')
//     ->group(function() {
// });
