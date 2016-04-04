<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table='ingredientes';
    protected $fillable=['tipo','categoria_id','subcategoria_id','marca_id',];

    //Devuelve la categoria del ingrediente
    public function categoria(){
        return $this->belongsTo('socialCocktail\Categoria');
    }

    //Devuelve la subCategoria del ingrediente
    public function subCategoria(){
        return $this->belongsTo('socialCocktail\SubCategoria');
    }

    //Devuelve la marca del ingrediente
    public function marca(){
        return $this->belongsTo('socialCocktail\Marca');
    }

    //Devuelve los cocteles que se preparan con este ingrediente
    public function ingredientes(){
        return $this->belongsToMany('socialCocktail\Coctel');
    }
}
