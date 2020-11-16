<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Apartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartamentos', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->foreign('casas_id')->references('id')->on('casas');
            $table->foreign('designacoes_id')->references('id')->on('designacoes');
            $table->string('tipo', 25);
            $table->string('preco', 25);
            $table->string('estado', 25);
            $table->string('imagem', 25);
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
        Schema::dropIfExists('apartamentos');
    }
}
