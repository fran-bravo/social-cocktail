<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use socialCocktail\Http\Controllers\Src\DAO\CoctelDAO;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Coctel;

class Derivador extends Controller
{
    public function index(){
        $cocteles=CoctelDAO::all();
        return view('index')->with('cocteles',$cocteles);
    }

    public function test(){
        $coctel=CoctelDAO::findByName("Primero");
        dd(count($coctel));

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
