<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 2:26 PM
 */

namespace socialCocktail\Http\Controllers\Src\Utiles;


interface DAO
{
    public static function all();

    public static function create($request);

    public static function findById($id);

    public static function update($request,$id);
    
    public static function delete($id);
}