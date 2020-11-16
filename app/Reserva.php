<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserva extends Model
{
    protected $fillable = ['users_id','apartamentos_id','celular'];


    public function apartamentos(){

        return	$this->belongsTo(Apartamento::class, 'apartamento_id');
    }

    public function users(){

        return	$this->belongsTo(User::class, 'users_id');
    }

}


