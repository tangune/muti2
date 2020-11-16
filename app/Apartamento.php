<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Casa;
use App\Detalhe;
use App\Designacoe;
use App\Reserva;
use App\Estado;

class Apartamento extends Model
{
    protected $fillable = ['casas_id','designacoes_id','users_id',
'tipo','numero_apartamento','preco','estado_id','imagem'];

       public function casas(){

             return	$this->belongsTo(Casa::class, 'casa_id');
         }

    public function reservas(){

        return	$this->hasMany(Reserva::class, 'apartamento_id');
    }

    public function estados(){

        return	$this->belongsTo(Estado::class, 'estado_id');
    }

        public function detalhes(){

             return	$this->belongsTo(Detalhe::class, 'detalhes_id');
         }

         public function designacoes(){

             return	$this->belongsTo(Designacoe::class, 'designacoes_id');
         }
}
