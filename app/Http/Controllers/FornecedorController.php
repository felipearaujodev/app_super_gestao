<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index () {
        return view('app.fornecedor.index');
    }

    public function listar (Request $request) {

        //with faz o carregamento ancioso do relacionamento, a view já recebe os dados de produtos relacionados
        $fornecedores = Fornecedor::with('produtos')->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(3);

        return view('app.fornecedor.listar', ['fornecedores'=>$fornecedores, "request"=>$request->all() ]);
    }

    public function adicionar (Request $request) {

        $status=["error"=>true, "mensagem"=>""];
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '')
        {
            $regras =[
                "nome"=>"required|min:3|max:40",
                "site"=>"required",
                "uf"=>"required|min:2|max:2",
                "email"=>"email"
            ];

            $feedback=[
                "required"=>"O campo: :attribute deve ser preenchido!",
                "nome.min"=>"O campo nome deve ter no minimo de 3 caracteres",
                "nome.max"=>"O campo nome deve ter no máximo de 40 caracteres",
                "uf.min"=>"O campo uf deve ter no minimo de 2 caracteres",
                "uf.max"=>"O campo uf deve ter no máximo de 2 caracteres",
                "email.email"=>"O campo email é inválido"
                
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $nome = $request->input("nome");
            $status = ["error"=>false, "mensagem"=>"Cadastro de $nome realizado com sucesso!"];
        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != '')
        {
            $fornecedor = Fornecedor::find($request->input('id'));

            $update = $fornecedor->update($request->all());

            if($update){
                $status['mensagem'] = 'Update realizado com sucesso!';
            }
            else{
                $status['mensagem'] = 'Update apresentou problema!';
            }

            return redirect()->route('app.fornecedor.editar', ["id"=>$request->input('id'), "status"=>$status["mensagem"]]);
            
        }
        return view('app.fornecedor.adicionar', ["status"=>$status]);
    }

    public function editar(int $id, $status=""){

        $fornecedor = Fornecedor::find($id);

        $status=["error"=>false, "mensagem"=>$status];

        return view('app.fornecedor.adicionar', ['fornecedor'=>$fornecedor, "status"=>$status]);
    }

    public function excluir(int $id){
        $fornecedor = Fornecedor::find($id);

        $fornecedor->delete();

        return redirect()->route('app.fornecedor');
    }
}
