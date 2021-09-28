<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha inválido.';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessario realizar login para acessar a página.';
        }

        return view('site.login', [
                        "paramsPage"=>[
                            "titulo"=>"Login"
                        ],
                        'erro'=>$erro
                    ]);
    }

    public function autenticacao(Request $request){
        $regras = [
            "email"=>"email",
            "senha"=>"required"
        ];

        $feedback = [
            "email.email"=>"E-mail é inválido",
            "senha.required"=>"Senha é obrigatório"
        ];

        $request->validate($regras,$feedback);

        $email = $request->get('email');
        $senha = $request->get('senha');

        $user = new User();
        $validaUsuario = $user->where('email', $email)->where('password', $senha)->get()->first();

        if(isset($validaUsuario->email)){
            
            session_start();
            $_SESSION["name"] = $validaUsuario->name;
            $_SESSION["email"] = $validaUsuario->email;

            return redirect()->route('app.home');

        } else {
            return redirect()->route('site.login', ['erro'=>1]);
        }

    }


    public function sair (){
        session_destroy();
        return redirect()->route('site.index');
        
    }
}
