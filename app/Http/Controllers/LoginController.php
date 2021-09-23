<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', [
                        "paramsPage"=>[
                            "titulo"=>"Login"
                        ]
                    ]);
    }

    public function autenticacao(){
        return "Chegamos até autenticação.";
    }
}
