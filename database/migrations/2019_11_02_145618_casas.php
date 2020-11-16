<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Casas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->foreign('bairros_id')->references('id')->on('bairros');
            $table->foreign('quarteiroes_id')->references('id')->on('quarteiroes');
            $table->foreign('proprietarios_id')->references('id')->on('proprietarios');
            $table->integer('numero_casa', 25);
            $table->foreign('comissoes_id')->references('id')->on('comissoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casas');
    }
}
