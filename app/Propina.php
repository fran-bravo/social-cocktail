<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Propina extends Model
{
    protected $table='propinas';
    protected $fillable=['dinero','usuario_id','coctel_id',];

    //Devuelve el usuario que deja propina
    public function usuario(){
        return $this->belongsTo('socialCocktail\User');
    }

    //Devuelve el coctel al que se le dejo propina
    public function coctel(){
        return $this->belongsTo('socialCocktail\Coctel');
    }
}
