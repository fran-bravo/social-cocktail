<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    protected $table='formaciones';
    protected $fillable=['titulo','institucion','inicio','finalizo','estado','cv_id'];

    //Devuelve el cv
    public function cv(){
        return $this->belongsTo('socialCocktail\Cv');
    }
}
