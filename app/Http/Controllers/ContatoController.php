<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $paramsPage = [
            "titulo"=>"Contato"
        ];

        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação' 
        ];

        return view('site.contato', compact('paramsPage', 'motivo_contatos'));
    }

    public function salvar(Request $request){
        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->ddd = $request->input('ddd');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        //print_r($contato->getAttributes());
        $contato->save();*/

        $request->validate([
            "nome"=>"required|min:3|max:100",
            "ddd"=>"required",
            "telefone"=>"required",
            "email"=>"required",
            "motivo_contato"=>"required",
            "mensagem"=>"required|min:10|max:2000"
        ]);

        //dd($request);
    }
}
