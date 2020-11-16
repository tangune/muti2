<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cidade;
use App\Casa;
use App\Comissoe;
use App\Quarteiroe;

class bairro extends Model
{
    protected $fillable = ['nome','cidades_id'];

    public function cidade(){

    return	$this->belongsTo(Cidade::class, 'cidades_id');
    }

    public function casas(){

    		return	$this->hasMany(Casa::class, 'casa_id');
    	}

    	public function comissoes(){

    		return	$this->hasMany(Comissoe::class, 'bairros_id');
    	}

    public function quarteiroes(){

        return	$this->hasMany(Quarteiroe::class, 'bairros_id');
    }


}
