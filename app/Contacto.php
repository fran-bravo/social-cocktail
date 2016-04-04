<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table='contactos';
    protected $hidden=['usuario_id','seguimiento_id',];

    //              Revisar relacion con usuario
}
