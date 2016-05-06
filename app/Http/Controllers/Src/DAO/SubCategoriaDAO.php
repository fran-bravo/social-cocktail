<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 2:48 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Http\Controllers\Src\Utiles\DAO;
use socialCocktail\SubCategoria;

class SubCategoriaDAO implements DAO
{
    public static function all(){
        return SubCategoria::all()->sortBy('nombre');
    }

    public static function create($request){
        $subCategoria=SubCategoria::create($request);
        $subCategoria->save();
    }

    public static function findById($id){
        return SubCategoria::find($id);
    }

    public static function update($request,$id){
        $subCategoria=self::findById($id);
        $subCategoria->fill($request);
        $subCategoria->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }

    public static function count(){
        return SubCategoria::count();
    }
}