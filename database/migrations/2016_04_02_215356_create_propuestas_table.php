<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->increments('id');
            //PK a tabla usuarios
            $table->integer('usuario_id')->unsigned();
            //Referencia a tabla usuarios
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->string('titulo',50);
            $table->string('puesto',50);
            $table->string('idioma',50);
            $table->string('residencia',50)->nullable();
            $table->integer('edad')->nullable();
            $table->text('contenido');
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
        Schema::drop('propuestas');
    }
}
