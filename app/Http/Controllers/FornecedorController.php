<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){

        $fornecedores = array(
            array(
                "nome"=>"Frutas Ltda",
                "status"=>'N',
                "cnpj"=>'',
                "ddd"=>"11",
                "telefone"=>"0000-0000"
            ),
            array(
                "nome"=>"Hospedagem Ltda",
                "status"=>'N',
                "cnpj"=>'',
                "ddd"=>"85",
                "telefone"=>"0000-0000"
            ),
            array(
                "nome"=>"Internet Ltda",
                "status"=>'N',
                "cnpj"=>'',
                "ddd"=>"32",
                "telefone"=>"0000-0000"
            ),
        );
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
