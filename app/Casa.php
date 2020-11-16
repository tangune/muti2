<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartamento;
use App\Bairros;
use App\Proprietario;
use App\Quarteiroe;

class Casa extends Model
{
    protected $fillable = ['bairros_id','quarteiroes_id',
'proprietarios_id','numero_casa','comissoes_id','users_id'];

		public function apartamentos(){

    		return	$this->hasMany(Apartamento::class, 'casa_id');
    	}

    	public function bairros(){

    		return	$this->belongsTo(Bairros::class, 'bairro_id');
    	}

    	public function proprietarios(){

    		return	$this->belongsTo(Proprietario::class, 'prorietario_id');
    	}

    	public function quarteiroes(){

    		return	$this->belongsTo(Quarteiroe::class, 'quarteirao_id');
    	}

    	
}
