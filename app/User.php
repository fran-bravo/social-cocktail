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

    protected $table='users';

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

    //Devuelve los cocteles de su autoria
    public function cocteles(){
        return $this->hasMany('socialCocktail\Cocteles');
    }

    //Devuelve todas las propinas que dejo
    public function propinas(){
        return $this->hasMany('socialCocktail\Propina');
    }

    //Devuelve todas las publicacines
    public function publicaciones(){
        return $this->hasMany('socialCocktail\Publicacion');
    }

    //Devuelve todos los comentarios
    public function comentarios(){
        return $this->hasMany('socialCocktail\Comentario');
    }

    //              Revisar relaciones con mensajes!
    //              Revisar relaciones con contactos!
}
