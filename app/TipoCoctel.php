<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class TipoCoctel extends Model
{
    protected $table='tiposcoctel';

    protected $fillable = ['nombre','descripcion'];

    public function cocteles(){
        return $this->hasMany('socialCocktail\Coctel');
    }
}
