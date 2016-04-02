<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('contenido');
            $table->string('asunto',50);
            $table->integer('viste');

            //Pks a tabla usuario
            $table->integer('remitente_id')->unsigned();
            $table->integer('destinatario_id')->unsigned();
            //Referencias a la tabla usuario
            $table->foreign('remitente_id')->references('id')->on('users');
            $table->foreign('destinatario_id')->references('id')->on('users');

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
        Schema::drop('mensajes');
    }
}
