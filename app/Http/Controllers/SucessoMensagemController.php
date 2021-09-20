<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SucessoMensagemController extends Controller
{
    public function sucesso(){

        $paramsPage = [
            "titulo"=>"Sucesso!"
        ];

        return view('site.sucesso', compact('paramsPage'));
    }
}
