<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table='ingredientes';
    protected $fillable=['tipo','categoria_id','subcategoria_id','marca_id','coctel_id'];

    //Devuelve la categoria del ingrediente
    public function categoria(){
        return $this->belongsTo('socialCocktail\Categoria','categoria_id');
    }

    //Devuelve la subCategoria del ingrediente
    public function subCategoria(){
        return $this->belongsTo('socialCocktail\SubCategoria','subcategoria_id');
    }

    //Devuelve la marca del ingrediente
    public function marca(){
        return $this->belongsTo('socialCocktail\Marca','marca_id');
    }

    //Devuelve los cocteles que se preparan con este ingrediente
    public function coctel(){
        return $this->belongsTo('socialCocktail\Coctel','coctel_id');
    }
}
