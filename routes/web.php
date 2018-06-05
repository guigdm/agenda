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
Auth::routes();

Route::get('/', function () {
    return redirect('/inicio');
});

Route::get('/salvar', function () {
    return view('salvar_contato');
});

Route::get('/salvarUsuario', function () {
    return view('usuarios.salvar_usuario');
});

Route::get('/inicio', function () {
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio','HomeController@index');

Route::get('/mostrar','ContatoController@mostrarContatos');
Route::post('/editarContato','ContatoController@editarContato');
Route::post('/salvarEditarContato','ContatoController@salvarEditarContato');
Route::post('/excluirContato','ContatoController@excluirContato');
Route::post('/salvarContato','ContatoController@salvarContato');



Route::get('/mostrarUsuario','UsuarioController@mostrarUsuario');
Route::post('/editarUsuario','UsuarioController@editarUsuario');
Route::post('/salvarEditarUsuario','UsuarioController@salvarEditarUsuario');
Route::post('/excluirUsuario','UsuarioController@excluirUsuario');
Route::post('/salvarUsuarioNovo','UsuarioController@salvarUsuario');
