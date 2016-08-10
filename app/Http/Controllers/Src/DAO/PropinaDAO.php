<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 24/7/16
 * Time: 10:40 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Propina;

class PropinaDAO
{
    public static function allByIdCoctel($idCoctel){
        return Propina::where('coctel_id',$idCoctel)->get();
    }

    public static function countAllByIdCoctel($idCoctel){
        return count(PropinaDAO::allByIdCoctel($idCoctel));
    }

    public static function create($idUsuario, $idCoctel){
        $propina=new Propina();
        $propina->setAttribute('usuario_id',$idUsuario);
        $propina->setAttribute('coctel_id',$idCoctel);
        $propina->save();
    }

    public static function existPropina($idUsuario, $idCoctel){
        $propina=Propina::where(['usuario_id'=>$idUsuario,'coctel_id'=>$idCoctel])->get();
        if (count($propina)){
            return true;
        }
        return false;
    }
}