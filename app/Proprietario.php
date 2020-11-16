<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Casa;

class Proprietario extends Model
{
    protected $fillable = ['nome','contacto'];

    public function casas(){

    		return	$this->hasMany(Casa::class, 'proprietario_id');
    	}
}
