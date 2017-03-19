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

Route::get('/', function(){
    return redirect('entrada');
});

Route::get('entrada', 'EntradaSaidaController@entradaView');
Route::post('entrada', 'EntradaSaidaController@entrada');
Route::get('saida', 'EntradaSaidaController@saidaView');
Route::post('saida', 'EntradaSaidaController@saida');
