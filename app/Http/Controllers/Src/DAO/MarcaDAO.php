<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 2:28 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Http\Controllers\Src\Utiles\DAO;
use socialCocktail\Marca;
class MarcaDAO implements DAO
{
    public static function all(){
        return Marca::all()->sortBy('nombre');
    }

    public static function create($request){
        $categoria=Marca::create($request);
        $categoria->save();
    }

    public static function findById($id){
        return Marca::find($id);
    }

    public static function update($request,$id){
        $marca=self::findById($id);
        $marca->fill($request);
        $marca->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }
}