<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table='subcategorias';
    protected $fillable=['nombre','categoria_id',];

    //Devuelve todos los ingredientes que posean esta marca.
    public function ingredientes(){
        return $this->hasMany('socialCocktail\Ingrediente');
    }

    //Devuelve la categoria padre
    public function categoria(){
        return $this->belongsTo('socialCocktail\Categoria');
    }

    public function marcas(){
        return $this->hasMany('socialCocktail\Marca');
    }
}
