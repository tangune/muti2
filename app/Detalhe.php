<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartamento;

class Detalhe extends Model
{
     protected $fillable = ['apartamentos_id','descricao','face_casa'];

     public function apartamentos(){

    		return	$this->hasMany(Apartamento::class, 'apartamentos_id');
    	}
    	
}
