<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartamento;

class Designacoe extends Model
{
    protected $fillable = ['descricao','numero_apartamento'];

    public function apartamentos(){

    		return	$this->hasMany(Apartamento::class, 'designacoes_id');
    	}
}
