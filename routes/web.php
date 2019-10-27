<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//nome, apelido,controller, metodo
Route::get('/',['as'=>'home', 'uses'=>'HomeController@index']);
Route::get('/sistema/buscar',['as'=>'sistema.buscar', 'uses'=>'SistemaController@buscar']);
Route::get('/sistema/adicionar',['as'=>'sistema.adicionar','uses'=>'SistemaController@adicionar']);
Route::post('/sistema/salvar',['as'=>'sistema.salvar','uses'=>'SistemaController@salvar']);
Route::get('/sistema/editar/{id}',['as'=>'sistema.editar', 'uses'=>'SistemaController@editar']);
Route::put('/sistema/atualizar/{id}',['as'=>'sistema.atualizar', 'uses'=>'SistemaController@atualizar']);
