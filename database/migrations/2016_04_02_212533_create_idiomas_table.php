<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->increments('id');
            //Pk a la tabla CVs
            $table->integer('cv_id')->unsigned();
            //Referencia a la tabla CVs
            $table->foreign('cv_id')->references('id')->on('cvs');
            $table->string('idioma',50);
            $table->enum('nivel',['basico','intermedio','avansado','nativo']);
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
        Schema::drop('idiomas');
    }
}
