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
            $table->integer('categoria_id')->unsigned();
            $table->integer('subcategoria_id')->unsigned()->nullable();
            $table->integer('marca_id')->unsigned()->nullable();
            //
            //Referencias a las tablas
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->foreign('marca_id')->references('id')->on('marcas');
            //
            $table->string('tipo',50);
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
