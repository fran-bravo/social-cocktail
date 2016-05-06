<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 3:16 PM
 */

namespace socialCocktail\Http\Controllers\Src\DAO;


use socialCocktail\Http\Controllers\Src\Utiles\DAO;
use socialCocktail\User;

class UserDAO implements DAO
{
    public static function all(){
        return User::all();
    }

    public static function create($request){
        $user=User::create($request);
        $user->password=bcrypt($user->password);
        $user->save();
    }

    public static function findById($id){
        return User::find($id);
    }

    public static function update($request,$id){
        $user=self::findById($id);
        $user->fill($request);
        $user->save();
    }
    public static function updatePassword($request,$id){
        $user=self::findById($id);
        $user->password=bcrypt($user->password);
        $user->save();
    }
    public static function delete($id){
        self::findById($id)->delete();
    }

    public static function count(){
        return User::count();
    }
}