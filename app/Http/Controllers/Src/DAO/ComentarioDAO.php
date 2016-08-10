<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 27/7/16
 * Time: 8:22 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Comentario;

class ComentarioDAO
{
    public static function all(){
        $comentarios=Comentario::all()->sortByDesc('created_at');
        return $comentarios;
    }

    public static function create($request){
        $comentario=Comentario::create($request);
        $comentario->save();
    }

    public static function findByIdPublicacion($id){
        return Comentario::where('publicacion_id',$id)->get();
    }

    public static function update($request,$id){

    }
    public static function delete($id){

    }

    public static function count(){

    }
}