<?php

namespace socialCocktail;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    

    protected $fillable = [
        'name','lastName', 'email','pais','provincia','localidad','codigoPostal','domicilio','genero','telefono','cuit_cuil',
        'activo','nacimiento','tipoUsuario','cv_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activo',
    ];
}
