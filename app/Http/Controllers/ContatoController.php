<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $paramsPage = [
            "titulo"=>"Contato"
        ];

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', compact('paramsPage', 'motivo_contatos'));
    }

    public function salvar(Request $request){

        $regras = [
            "nome"=>"required|min:3|max:100|unique:site_contatos",
            "ddd"=>"required",
            "telefone"=>"required",
            "email"=>"email",
            "motivo_contatos_id"=>"required",
            "mensagem"=>"required|min:5|max:2000"
        ];

        $feedback = [
            "nome.min"=>"Campo nome precisa ter no mínimo 3 caracteres",
            "nome.max"=>"Campo nome aceita no máximo 100 caracteres",
            "nome.unique"=>"Campo nome já está cadastrado em outro contato",
            "email.email"=>"E-mail informado não é válido",
            "mensagem.min"=>"Campo mensagem precisa ter no mínimo 5 caracteres",
            "mensagem.max"=>"Campo mensagem aceita no máximo 2000 caracteres",
            "required"=>"Campo :attribute deve ser preenchido"

        ];

        $request->validate(
            $regras,
            $feedback
            
        );

        SiteContato::create($request->all());
        return redirect()->route('site.sucesso');
    }

}
