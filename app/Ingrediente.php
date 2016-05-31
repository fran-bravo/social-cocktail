<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table='ingredientes';
    protected $fillable=['marca_id','coctel_id','cantidad','unidad_medida'];

    //Devuelve la marca del ingrediente
    public function marca(){
        return $this->belongsTo('socialCocktail\Marca','marca_id');
    }

    //Devuelve los cocteles que se preparan con este ingrediente
    public function coctel(){
        return $this->belongsTo('socialCocktail\Coctel','coctel_id');
    }
}
