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

Route::get('/', 'ProdutoController@index');

Route::resource('usuario','UsuarioController');
Route::resource('venda','VendaController');
Route::resource('produto','ProdutoController');

Route::get('/relatorio', [
  'uses' => 'VendaController@pdf'
]);
