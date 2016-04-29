<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formaciones', function (Blueprint $table) {
            $table->increments('id');
            //PK a la tabla cvs
            $table->integer('cv_id')->unsigned();
            //Referencia a la tabla CVs
            $table->foreign('cv_id')->references('id')->on('cvs');
            $table->string('titulo',50);
            $table->string('institucion',50);
            $table->date('inicio');
            $table->date('finalizo')->nullable();
            $table->enum('estado',['completo','en curso','abandonado']);
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
        Schema::drop('formaciones');
    }
}
