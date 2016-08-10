<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 9/5/16
 * Time: 4:31 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use Illuminate\Support\Facades\Auth;
use socialCocktail\Coctel;

class CoctelDAO
{
    public static function all(){
        return Coctel::all()->sortBy('nombre');
    }

    public static function create($request){
        $coctel=Coctel::create($request);
        $request['coctel_id']=$coctel->id;
        IngredienteDAO::create($request);
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

    public static function findByName($nombre){
        $coctel=Coctel::where('nombre',$nombre)->get();
        return $coctel;
    }

    public static function countByUser($id){
        $cant=Coctel::where('usuario_id',$id)->get();
        return count($cant);
    }

    public static function findByUserId($id){
        $cocteles=Coctel::where('usuario_id',$id)->get();
        return $cocteles;
    }

    public static function findBySeguidorLogueado(){
        $seguidos=SeguidorDAO::findBySeguidor(Auth::user()->id);
        $array=array();
        foreach ($seguidos as $seguido){
            array_push($array,$seguido->seguido->id);
        }
        return Coctel::whereIn('usuario_id',$array)->get();
    }
}