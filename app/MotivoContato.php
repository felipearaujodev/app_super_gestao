<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    protected $table = 'tbl_motivo_contatos';
    protected $fillable = ['motivo_contatos'];
}
