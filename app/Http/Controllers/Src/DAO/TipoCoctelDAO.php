<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 19/5/16
 * Time: 3:05 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;
use socialCocktail\TipoCoctel;

class TipoCoctelDAO
{
    public static function all(){
        return TipoCoctel::all()->sortBy('nombre');
    }

    public static function create($request){
        $tipo=TipoCoctel::create($request);
        $tipo->save();
    }

    public static function findById($id){
        return TipoCoctel::find($id);
    }

    public static function update($request,$id){
        $tipo=self::findById($id);
        $tipo->fill($request);
        $tipo->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }

    public static function count(){
        return TipoCoctel::count();
    }
}