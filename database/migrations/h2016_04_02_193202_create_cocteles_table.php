<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoctelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocteles', function (Blueprint $table) {
            $table->increments('id');

            //FK a la tabla usuarios
            $table->integer('usuario_id')->unsigned()->nullable();
            //Referencia a la tabla usuarios
            $table->foreign('usuario_id')->references('id')->on('users');
            //

            $table->string('nombre',50);
            $table->string('historia', 500)->nullable();
            $table->string('metodo',50);
            $table->text('preparacion');
            $table->string('path',100)->nullable();
            $table->softDeletes();
            //FK a la tabla cristales
            $table->integer('cristal_id')->unsigned();
            //Referencia a la tabla cristales
            $table->foreign('cristal_id')->references('id')->on('cristales');
            //

            $table->integer('tipococtel_id')->unsigned()->nullable();
            $table->foreign('tipococtel_id')->references('id')->on('tiposcoctel');

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
        //Schema::drop('coctel_ingrediente');
        Schema::drop('cocteles');
    }
}
