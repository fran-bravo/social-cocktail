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
            $table->string('name', 50);
            $table->string('lastName', 50);
            $table->string('email', 60)->unique();
            $table->string('password', 30);
            $table->string('pais', 50);
            $table->string('provincia', 50);
            $table->string('localidad', 50);
            $table->string('codigoPostal' 20);
            $table->string('domicilio', 50);
            $table->string('genero', 10);
            $table->string('telefono', 50);
            $table->string('cuit_cuil' 50);
            $table->smallInteger('activo');
            $table->date('nacimiento');
            $table->smallInteger('tipoUsuario');
            //$table-> referencia a la tabla cv
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
