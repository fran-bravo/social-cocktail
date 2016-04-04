<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Cristal extends Model
{
    protected $table='cristales';
    protected $fillable=['nombre',];

    //Devuelve los cocteles que utilizan esta cristaleria
    public function cocteles(){
        return $this->hasMany('socialCocktail\Coctel');
    }
}
