<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            //PK tabla cocteles, usuarios y publicacion
            $table->integer('usuario_id')->unsigned();
            $table->integer('coctel_id')->unsigned()->nullable();
            $table->integer('publicacion_id')->unsigned()->nullable();
            //Referencias a las tablas cocteles, usuarios y publicacion
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('coctel_id')->references('id')->on('cocteles');
            $table->foreign('publicacion_id')->references('id')->on('publicaciones');
            $table->string('contenido',500);
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
        Schema::drop('comentarios');
    }
}
