<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    //Item tem 1 ItemDetalhe (hasOne)
    public function itemDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    //Item pertence a um fornecedor
    public function fornecedor() {
        return $this->belongsTo('App\Fornecedor');
    }
}
