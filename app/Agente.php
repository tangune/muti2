<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    protected $fillable = ['users_id','celular','comissoes_id'];

    public function comissoes(){

        return	$this->belongsTo(Comissoe::class, 'comissoes_id');
    }

    public function users(){

        return	$this->belongsTo(User::class, 'users_id');
    }
}
