<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';
    protected $fillable=['nombre','descripcion',];
    
    //Devuelve todos los ingredientes que posean esta marca.
    public function ingredientes(){
        return $this->hasMany('socialCocktail\Ingrediente');
    }
    //Devuelve todas las SubCategorias
    public function subCategorias(){
        return $this->hasMany('socialCocktail\SubCategoria');
    }
    public function marcas(){
        request($this->hasMany('socialCocktail\Marca'));
    }
}
