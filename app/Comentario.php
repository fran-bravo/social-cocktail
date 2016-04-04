<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table=['comentarios'];
    protected $fillable=['contenido','usuario_id','coctel_id','publicacion_id'];

    //Devuelve el usuario creador
    public function usuario(){
        return $this->belongsTo('socialCocktail\User');
    }

    //Devuelve el coctel al cual comento
    public function coctel(){
        return $this->belongsTo('socialCocktail\Coctel');
    }

    //Devuelve la publicacion la cual comento
    public function publicacion(){
        return $this->belongsTo('socialCocktail\Publicacion');
    }

}
