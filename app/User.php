<?php

namespace socialCocktail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $table='users';

    protected $fillable = [
        'name','lastName', 'email','pais_id','provincia','localidad','codigoPostal','domicilio','genero','telefono','cuit_cuil',
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

    public function pais(){
        return $this->belongsTo('socialCocktail\Pais','pais_id');
    }

    //              Revisar relaciones con mensajes!
    //              Revisar relaciones con contactos!
}
