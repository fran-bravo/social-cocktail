<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $table='cvs';
    protected $fillable=['carta','anexo',];

    //Devuele los idiomas
    public function idiomas(){
        return $this->hasMany('socialCocktail\Idioma');
    }

    //Devuelve las experiencias laborales
    public function experiencias(){
        return $this->hasMany('socialCocktail\Experiencia');
    }

    //Devuelve todas las formaciones
    public function formaciones(){
        return $this->hasMany('socialCocktail\Formacion');
    }
}
