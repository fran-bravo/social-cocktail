<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->increments('id');
            //PKs tablas categorias, subCategorias, marcas
            $table->integer('coctel_id')->unsigned();

            $table->integer('marca_id')->unsigned();
            //
            //Referencias a las tablas
            $table->foreign('coctel_id')->references('id')->on('cocteles');

            $table->foreign('marca_id')->references('id')->on('marcas');
            //
            $table->float('cantidad');
            $table->string('unidad_medida',20);
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
        Schema::drop('ingredientes');
    }
}
