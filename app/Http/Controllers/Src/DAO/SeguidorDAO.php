<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 4/8/16
 * Time: 6:54 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Seguidor;

class SeguidorDAO
{

    public static function all(){
    }

    public static function create($request){
        $seguidor=Seguidor::create($request);
        $seguidor->save();
    }

    public static function findByIds($idSeguido, $idSeguidor){
        $seguimiento=Seguidor::where(['seguido_id'=>$idSeguido,'seguidor_id'=>$idSeguidor])->get();
        return $seguimiento;
    }

    public static function findBySeguidor($idSeguidor){
        return Seguidor::where('seguidor_id',$idSeguidor)->get();
    }

    public static function findBySeguido($idSeguido){
        return Seguidor::where('seguido_id',$idSeguido)->get();
    }

    public static function countSeguidores($id){
        return count(Seguidor::where('seguido_id',$id)->get());
    }

    public static function countSeguidos($id){
        return count(Seguidor::where('seguidor_id',$id)->get());
    }

    public static function update($request,$id){

    }
    public static function delete($idSeguido, $idSeguidor){
        Seguidor::where(['seguido_id'=>$idSeguido,'seguidor_id'=>$idSeguidor])->delete();
    }

    public static function count(){

    }

}