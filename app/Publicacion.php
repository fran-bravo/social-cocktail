<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table='publicaciones';
    protected $fillable=['contenido','usuario_id'];

    //Devuelve el usuario autor
    public function usuario(){
        return $this->belongsTo('socialCocktail\User');
    }

    //Devuelve todos los comentarios
    public function comentarios(){
        return $this->hasMany('socialCocktail\Comentario');
    }
}
