<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use socialCocktail\Http\Controllers\Src\DAO\CoctelDAO;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Controllers\Src\DAO\PropinaDAO;
use socialCocktail\Http\Controllers\Src\DAO\PublicacionDAO;
use socialCocktail\Http\Controllers\Src\DAO\SeguidorDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Coctel;
use socialCocktail\Publicacion;

class Derivador extends Controller
{
    public function index(){
        $publicaciones=PublicacionDAO::findBySeguidorLogueado();
        $cocteles=CoctelDAO::findBySeguidorLogueado();


        return view('index')->with(['cocteles'=>$cocteles/*,'secciones'=>$secciones*/, 'publicaciones'=>$publicaciones]);
    }

    public function test(){
        dd(PropinaDAO::existPropina(1,28));
    }

    public function bebidasConAlcohol(){
        return view("plantillas.user.bebidasConAlcohol");
    }

    public function cristaleria(){
        $cristales=CristalDAO::all();
        return view("plantillas.user.cristaleria")->with("cristales",$cristales);
    }

    public function registro(){
        return view('plantillas.user.registro');
    }

    public function login(){
        return view('plantillas.user.login');
    }
}
