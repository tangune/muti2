<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detalhes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->foreign('apartamentos_id')->references('id')->on('apartamentos');
            $table->string('descricao', 25);
            $table->string('face_casa', 25);
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
        Schema::dropIfExists('detalhes');
    }
}
