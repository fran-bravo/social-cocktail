<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    protected $table='seguidores';
    protected $fillable=['seguido_id','seguidor_id','created_at',];

    //TESTEAR ESTO, no se si funciona

    public function seguidor(){
        return $this->belongsTo('socialCocktail\User','seguidor_id');
    }

    public function seguido(){
        return $this->belongsTo('socialCocktail\User','seguido_id');
    }
}
