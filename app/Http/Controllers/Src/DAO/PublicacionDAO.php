<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 26/7/16
 * Time: 8:27 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use Illuminate\Support\Facades\Auth;
use socialCocktail\Publicacion;

class PublicacionDAO
{
    public static function all(){
        $publicaciones=Publicacion::all()->sortByDesc('created_at');
        return $publicaciones;
    }

    public static function create($request){
        $publicacion=Publicacion::create($request);
        $publicacion->save();
    }

    public static function findBySeguidorLogueado(){
        $seguidos=SeguidorDAO::findBySeguidor(Auth::user()->id);
        $array=array();
        foreach ($seguidos as $seguido){
            array_push($array,$seguido->seguido->id);
        }
        return Publicacion::whereIn('usuario_id',$array)->get();
    }

    public static function findById($id){
        return Publicacion::where('usuario_id',$id)->get();
    }

    public static function update($request,$id){

    }
    public static function delete($id){

    }

    public static function count(){

    }
}