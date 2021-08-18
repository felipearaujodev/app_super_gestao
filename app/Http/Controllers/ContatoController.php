<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){
        
        $paramsPage = [
            "titulo"=>"Contato"
        ];

        return view('site.contato', compact('paramsPage'));
    }
}
