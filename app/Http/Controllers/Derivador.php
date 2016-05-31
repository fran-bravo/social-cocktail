<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use socialCocktail\Http\Controllers\Src\DAO\CoctelDAO;
use socialCocktail\Http\Requests;

class derivador extends Controller
{
    public function index(){
        $cocteles=CoctelDAO::all();
        return view('index')->with('cocteles',$cocteles);
    }
}
