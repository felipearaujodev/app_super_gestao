<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    //Produto tem 1 ProdutoDetalhe (hasOne)
    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
