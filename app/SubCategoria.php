<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table='subcategorias';
    protected $fillable=['nombre',];

    //Devuelve todos los ingredientes que posean esta marca.
    public function ingredientes(){
        return $this->hasMany('socialCocktail\Ingrediente');
    }
}
