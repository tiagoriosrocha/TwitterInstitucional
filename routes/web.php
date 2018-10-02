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

//rota que exibe a tela de abertura do Laravel
Route::get('/', function () {
    return view('welcome');
});

//rotas de autenticação - login - esqueceu senha - registro - etc
Auth::routes();

//exibe a home para usuários logados
Route::get('/home', 'HomeController@index')->name('home');



//Editor -> formulário de criar mensagem
Route::get('/criarmensagem','MessageController@create');

//Editor -> listar seguidores
Route::get('/listarseguidores/{id}', 'EditorController@seguidores');

//Editor -> listar mensagens enviadas
Route::get('/listarmensagensenviadas/{id}', 'EditorController@mensagens');

//Editor -> salvar dados da mensgem
Route::post('/message','MessageController@store');

//Editor -> visualizar msg
Route::get('/message/{id}','MessageController@show');

//Editor -> formulário de enviar mensagem (enviar para todos os seguidores)
Route::get('/publicarmensagem','MessageController@createpublicar');

//Editor
Route::post('/post','MessageController@post');



//Usuário -> listar editores
Route::get('/listareditores','EditorController@index');

//Usuário -> seguir editor
Route::get('/seguir/{id}','UserController@seguir');

//Usuário -> parar de seguir editor
Route::get('/pararseguir/{id}','UserController@pararseguir');

//Usuário -> ver mensagens recebidas
Route::get('/listarmensagensrecebidas/{id}','UserController@vermensagens');

