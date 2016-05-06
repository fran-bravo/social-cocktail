<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 5:31 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Cristal;

class CristalDAO
{
    public static function all(){
        return Cristal::all()->sortBy('nombre');
    }

    public static function create($request){
        $cristal=Cristal::create($request);
        $cristal->save();
    }

    public static function findById($id){
        return Cristal::find($id);
    }

    public static function update($request,$id){
        $cristal=self::findById($id);
        $cristal->fill($request);
        $cristal->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }

    public static function count(){
        return Cristal::count();
    }
}