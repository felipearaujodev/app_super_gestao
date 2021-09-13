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

        return view('site.contato', compact('paramsPage'));
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
            "nome"=>"required",
            "ddd"=>"required",
            "telefone"=>"required",
            "email"=>"required",
            "motivo_contato"=>"required",
            "mensagem"=>"required"
        ]);

        //dd($request);
    }
}
