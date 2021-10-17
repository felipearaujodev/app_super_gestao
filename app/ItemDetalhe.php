<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produtos_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'altura', 'largura', 'unidade_id'];

    //ItemDetalhe pertence à Item (belongsTo)
    public function item(){
        return $this->belongsTo('App\Item', 'produto_id', 'id');
    }
}
