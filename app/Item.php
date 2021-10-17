<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemDetalhe;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    //Item tem 1 ItemDetalhe (hasOne)
    public function itemDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }
}
