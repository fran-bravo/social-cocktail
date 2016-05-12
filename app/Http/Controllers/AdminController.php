<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;
use socialCocktail\Http\Controllers\Src\DAO\CoctelDAO;
use socialCocktail\Http\Controllers\Src\DAO\UserDAO;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\MarcaDAO;


use socialCocktail\Http\Requests;

class AdminController extends Controller
{
    public function index(){
        $users=UserDAO::count();
        $categorias=CategoriaDAO::count();
        $marcas=MarcaDAO::count();
        $cocteles=CoctelDAO::count();
        return view('plantillas.admin.admin')->with(['users'=>$users,'categorias'=>$categorias,'marcas'=>$marcas,'cocteles'=>$cocteles,]);
    }
}
