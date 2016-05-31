<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 29/5/16
 * Time: 9:23 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Ingrediente;

class IngredienteDAO
{
    public static function all(){
        return Ingrediente::all()->sortBy('nombre');
    }

    public static function create($request){
        foreach ($request['ingredientes'] as $ingrediente){
            $ingrediente['coctel_id']=$request['coctel_id'];
            $ingrediente=Ingrediente::create($ingrediente);
            $ingrediente->save();
        }

    }

    public static function findById($id){
        return Ingrediente::find($id);
    }

    public static function update($request,$id){
        $ingrediente=self::findById($id);
        $ingrediente->fill($request);
        $ingrediente->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }

    public static function count(){
        return Ingrediente::count();
    }
}