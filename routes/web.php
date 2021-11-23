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

    Route::get('/fornecedor', 'FornecedorController@index')
        ->name('app.fornecedor');

    Route::get('/fornecedor/listar', 'FornecedorController@listar')
        ->name('app.fornecedor.listar');

    Route::post('/fornecedor/listar', 'FornecedorController@listar')
        ->name('app.fornecedor.listar');

    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')
        ->name('app.fornecedor.adicionar');

    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')
        ->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{status?}', 'FornecedorController@editar')
        ->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')
        ->name('app.fornecedor.excluir');

    //produtos
    Route::resource('produto', 'ProdutoController');

    //produtos detalhes
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    //clientes
    Route::resource('cliente', 'ClienteController');

    //pedidos
    Route::resource('pedido', 'PedidoController');

    //pedidos produtos
    //Route::resource('pedido-produto', 'PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')
        ->name('pedido-produto.create');

    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')
        ->name('pedido-produto.store');
    
    Route::delete('pedido-produto/detroy/{pedidoProduto}', 'PedidoProdutoController@destroy')
        ->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@show')->name('teste');



Route::fallback(function(){
    return 'Não foi possível encontrar a rota, <a href="'.route("site.index").'">clique aqui</a> para voltar ao início!';
});

