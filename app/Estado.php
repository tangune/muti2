<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartamento;

class Estado extends Model
{
    protected $fillable = ['estado'];

    public function apartamentos(){

        return	$this->hasMany(Apartamento::class, 'estado_id');
    }
}
