<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $table = 'produtos_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'altura', 'largura', 'unidade_id'];

    //ProdutoDetalhe pertence à Produto (belongsTo)
    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
