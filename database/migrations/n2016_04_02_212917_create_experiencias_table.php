<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->increments('id');
            //PK a la tabla cv
            $table->integer('cv_id')->unsigned();
            //Referencia a la tabla cv
            $table->foreign('cv_id')->references('id')->on('cvs');
            $table->string('puesto',50);
            $table->string('empresa',50);
            $table->string('descripcion',500);
            $table->date('ingreso');
            $table->date('salida')->nullable();
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
        Schema::drop('experiencias');
    }
}
