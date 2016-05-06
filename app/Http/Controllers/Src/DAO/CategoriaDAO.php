<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 2:03 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;
use socialCocktail\Categoria;
use socialCocktail\Http\Controllers\Src\Utiles\DAO;

class CategoriaDAO implements DAO
{

    public static function all(){
        return Categoria::all()->sortBy('nombre');
    }

    public static function create($request){
        $categoria=Categoria::create($request);
        $categoria->save();
    }

    public static function findById($id){
        return Categoria::find($id);
    }

    public static function update($request,$id){
        $categoria=self::findById($id);
        $categoria->fill($request);
        $categoria->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }
    public static function count(){
        return Categoria::count();
    }

}