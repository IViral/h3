<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('setor');
            $table->string('endereco');
            $table->string('like');
            $table->string('dislike');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('cortes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salao_id')->unsigned();
            $table->foreign('salao_id')->references('id')->on('salaos')->onDelete('cascade');

            $table->string('nome');
            $table->string('preco');
            $table->string('img');
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
        Schema::dropIfExists('cortes');
        Schema::dropIfExists('salaos');
    }
}
