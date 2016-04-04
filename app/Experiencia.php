<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table=['puesto','empresa','descripcion','ingreso','salida','cv_id'];

    //Devuelve el cv
    public function cv(){
        return $this->belongsTo('socialCocktail\Cv');
    }
}
