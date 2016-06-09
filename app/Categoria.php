<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';
    protected $fillable=['nombre','descripcion','comparable',];
    
    //Devuelve todos los ingredientes que posean esta marca.
    public function ingredientes(){
        return $this->hasMany('socialCocktail\Ingrediente');
    }
    //Devuelve todas las SubCategorias
    public function subCategorias(){
        return $this->hasMany('socialCocktail\SubCategoria');
    }
    public function marcas(){
        return $this->hasMany('socialCocktail\Marca');
    }

    public function isComparable(){
        if ($this->comparable){
            return true;
        }
        return false;
    }
}
