<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    protected $table = 'site_contatos';
    protected $fillable = ['nome','ddd', 'telefone', 'email', 'motivo_contato', 'mensagem'];

    //inserindo registros com tinker
    /*
        php artisan tinker;

        \App\SiteContato::create(['nome'=>'Contato1', 'ddd'=>'11', 'telefone'=>'954998084', 'email'=>'contato1@contato1.com.br', 'motivo_contato'=>1, 'mensagem'=>'olá, preciso de suporte']);

    */
}
