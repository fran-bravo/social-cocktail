<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name', 50);
            $table->string('lastName', 50)->nullable();
            $table->string('password', 30);
            $table->string('pais', 50);
            $table->string('provincia', 50);
            $table->string('localidad', 50)->nullable();
            $table->string('codigoPostal', 20)->nullable();
            $table->string('domicilio', 50)->nullable();
            $table->string('genero', 10)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('cuit_cuil', 50)->nullable();
            $table->smallInteger('activo');
            $table->date('nacimiento')->nullable();
            $table->string('tipoUsuario',30);
            //Referencia a la tabla cvs
            $table->integer('cv_id')->unsigned()->nullable();
            $table->foreign('cv_id')->references('id')->on('cvs');
            //
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
