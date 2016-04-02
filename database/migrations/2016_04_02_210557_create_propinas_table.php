<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propinas', function (Blueprint $table) {
            $table->increments('id');

            //Pks a las tablas usuarios y cocteles
            $table->integer('usuario_id')->unsigned();
            $table->integer('coctel_id')->unsigned();

            //Referencias a las tablas usuario y cocteles
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('coctel_id')->references('id')->on('cocteles');

            $table->integer('dinero');

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
        Schema::drop('propinas');
    }
}
