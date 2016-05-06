<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 1:52 PM
 */

namespace socialCocktail\Http\Controllers\Src\Utiles;
use Laracasts\Flash\Flash;

class Utiles
{
    public static function flashMessageSuccess($message){
        Flash::success($message);
    }

    public static function flashMessageSuccessDefect(){
        Flash::success('Tarea realizada con éxito.');
    }

    public static function flashMessageWarning($message){
        Flash::warning($message);
    }
}