<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 9/5/16
 * Time: 4:31 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Coctel;

class CoctelDAO
{
    public static function all(){
        return Coctel::all()->sortBy('nombre');
    }

    public static function create($request){
        $coctel=Coctel::create($request);
        $coctel->save();
    }

    public static function findById($id){
        return Coctel::find($id);
    }

    public static function update($request,$id){
        $coctel=self::findById($id);
        $coctel->fill($request);
        $coctel->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }

    public static function count(){
        return Coctel::count();
    }
}