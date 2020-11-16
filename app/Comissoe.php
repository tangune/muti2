<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bairro;

class Comissoe extends Model
{
    protected $fillable = ['bairros_id','nome'];

    public function bairros(){

             return	$this->belongsTo(Bairro::class, 'bairros_id');
         }

    public function agentes(){

        return	$this->hasMany(Agente::class, 'comissoes_id');
    }


}
