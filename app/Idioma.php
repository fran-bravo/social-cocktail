<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table='idiomas';
    protected $fillable=['idioma','nivel','dv_id'];

    //Devuelve el cv
    public function cv(){
        return $this->belongsTo('socialCocktail\Cv');
    }
}
