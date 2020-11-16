<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Casa;
use App\Bairro;

class Quarteiroe extends Model
{
    protected $fillable = ['bairros_id','numero'];

    public function casas(){

    		return	$this->hasMany(Casa::class, 'quarteirao_id');

    	}

    public function bairros(){

        return	$this->belongsTo(Bairro::class, 'bairros_id');
    }
}
