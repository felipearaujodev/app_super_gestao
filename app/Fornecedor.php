<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = ['nome','site', 'uf', 'email'];

    //inserindo registros com tinker
    /*
        php artisan tinker;

        \App\Fornecedor::create(['nome'=>'Fornecedor ABC', 'site'=>'fornecedorabc.com.br', 'uf'=>'SP', 'email'=>'contato@fornecedorabc.com.br']);

    */
}
