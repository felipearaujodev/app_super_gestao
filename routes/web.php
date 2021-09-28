<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::get('/', 'PrincipalController@principal')
    ->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')
    ->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')
    ->name('site.contato');

Route::post('/contato', 'ContatoController@salvar')
    ->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticacao')->name('site.login');

Route::get('/sucesso', 'SucessoMensagemController@sucesso')
    ->name('site.sucesso');

Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/home', 'homeController@index')
        ->name('app.home');
    
    Route::get('/sair', 'LoginController@sair')
        ->name('app.sair');

    Route::get('/cliente', 'ClienteController@index')
        ->name('app.cliente');

    Route::get('/produto', 'ProdutoController@index')
        ->name('app.produto');

    Route::get('/fornecedor', 'FornecedorController@index')
        ->name('app.fornecedor');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@show')->name('teste');



Route::fallback(function(){
    return 'Não foi possível encontrar a rota, <a href="'.route("site.index").'">clique aqui</a> para voltar ao início!';
});

