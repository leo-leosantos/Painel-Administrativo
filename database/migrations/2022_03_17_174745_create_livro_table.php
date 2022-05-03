<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->string('slug')->nullable();
            $table->string('autor',100);
            $table->string('serie',100)->nullable();
            $table->string('volume',50)->nullable();
            $table->integer('numero_pagina');
            $table->string('editora',50);
            $table->date('data_inicio_leitura');
            $table->date('data_fim_leitura')->nullable();
            $table->text('sinopse');
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
        Schema::dropIfExists('livros');
    }
}
