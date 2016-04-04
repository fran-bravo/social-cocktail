<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marcas';
    protected $fillable=['nombre',];

    //Devuelve todos los ingredientes que posean esta marca.
    public function ingredientes(){
        return $this->hasMany('socialCocktail\Ingrediente');
    }
}
