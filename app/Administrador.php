<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    protected $fillable = ['nome','preco','imagem','estado','lojas_id'];
}
