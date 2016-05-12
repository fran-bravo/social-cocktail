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
            $table->string('preparacion', 500);
            $table->softDeletes();
            //FK a la tabla cristales
            $table->integer('cristal_id')->unsigned();
            //Referencia a la tabla cristales
            $table->foreign('cristal_id')->references('id')->on('cristales');
            //

            $table->timestamps();
        });
        //Tabla pivot relacion Contel e Ingrediente (many to many)
        Schema::create('coctel_ingrediente', function(Blueprint $table){
            $table->increments('id');
            //PKs a las tablas cocteles e ingredientes
            $table->integer('coctel_id')->unsigned();
            $table->integer('ingrediente_id')->unsigned();
            //Referencias a las tablas
            $table->foreign('coctel_id')->references('id')->on('cocteles');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
            //
            $table->double('cantidad');
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
        Schema::drop('coctel_ingrediente');
        Schema::drop('cocteles');
    }
}
