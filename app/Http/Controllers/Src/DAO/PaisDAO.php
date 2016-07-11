<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 5/7/16
 * Time: 2:27 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Http\Controllers\Src\Utiles\DAO;
use socialCocktail\Pais;

class PaisDAO implements DAO
{
    public static function all(){
        return Pais::all()->sortBy('nombre');
    }

    public static function create($request){
        $pais=Pais::create($request);
        $pais->save();
    }

    public static function findById($id){
        return Pais::find($id);
    }

    public static function update($request,$id){
        $pais=self::findById($id);
        $pais->fill($request);
        $pais->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }

    public static function count(){
        return Pais::count();
    }

}