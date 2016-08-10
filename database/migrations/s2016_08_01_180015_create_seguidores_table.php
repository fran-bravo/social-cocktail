<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidores', function (Blueprint $table) {

            $table->integer('seguidor_id')->unsigned();
            $table->foreign('seguidor_id')->references('id')->on('users');

            $table->integer('seguido_id')->unsigned();
            $table->foreign('seguido_id')->references('id')->on('users');

            $table->primary(['seguidor_id', 'seguido_id']);

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
        Schema::drop('seguidores');
    }
}
