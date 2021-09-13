<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{

    //trait PHP
    use SoftDeletes;//mantém os dados deletados na tabela usando a coluna deleted_at, deve criar um migration adicionando a nova coluna

    protected $table = 'fornecedores';
    protected $fillable = ['nome','site', 'uf', 'email'];//campos que podem ser preenchidos

    //inserindo registros com tinker
    /*
        php artisan tinker;

        \App\Fornecedor::create(['nome'=>'Fornecedor ABC', 'site'=>'fornecedorabc.com.br', 'uf'=>'SP', 'email'=>'contato@fornecedorabc.com.br']);

    */
}
