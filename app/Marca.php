<?php

namespace socialCocktail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use SoftDeletes;
    protected $table='marcas';
    protected $fillable=['nombre','descripcion','categoria_id','subCategoria_id','supermarca_id',];
    protected $dates=['deleted_at'];

    //Devuelve todos los ingredientes que posean esta marca.
    public function ingredientes(){
        return $this->hasMany('socialCocktail\Ingrediente');
    }

    public function categoria(){
        return $this->belongsTo('socialCocktail\Categoria');
    }

    public function subCategoria(){
        return $this->belongsTo('socialCocktail\SubCategoria','subCategoria_id');
    }

    public function superMarca(){
        return $this->belongsTo('socialCocktail\Marca','supermarca_id');
    }
}
