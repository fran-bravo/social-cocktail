<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Coctel extends Model
{
    protected $table='cocteles';
    protected $fillable=['nombre','historia','metodo','preparacion','cristal_id','usuario_id',];

    //Devuelve la cristaleria con la que se prepara el coctel
    public function cristal(){
        return $this->belongsTo('socialCocktail\Cristal');
    }

    //Devuelve el usuario creador
    public function usuario(){
        return $this->belongsTo('socialCocktail\User');
    }

    //Devuelve los ingredientes que lo componen
    public function ingredientes(){
        return $this->belongsToMany('socialCocktail\Ingrediente');
    }

    //Devuelve todas las propinas que se le dejaron
    public function propinas(){
        return $this->hasMany('socialCocktail\Propina');
    }

    //Devuelve todos los comentarios
    public function publicaciones(){
        return $this->hasMany('socialCocktail\Comentario');
    }
}
