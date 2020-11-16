<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bairro;

class Cidade extends Model
{
    protected $fillable = ['nome'];

    public function bairros(){

    return	$this->hasMany(Bairro::class, 'cidades_id');
    }
}
