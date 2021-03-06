<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table='paises';
    protected $fillable=['id','nombre','ISO'];

    public function users(){
        return $this->hasMany('socialCocktail\User');
    }
}
