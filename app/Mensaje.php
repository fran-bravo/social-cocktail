<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table='mensajes';
    protected $fillable=['asunto','contenido','visto','remitente_id','destinatario_id',];


    //          Revisar estas relaciones.
    // Devuelve el usuario remitente
    public function remitente(){
        return $this->belongsTo('socialCocktail\User');
    }

    //Devuelve el usuario destinatario
    public function destinatario(){
        return $this->belongsTo('socialCocktail\User');
    }
}
