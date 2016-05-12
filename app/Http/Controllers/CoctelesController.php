<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Controllers\Src\DAO\MarcaDAO;
use socialCocktail\Http\Controllers\Src\DAO\SubCategoriaDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Controllers\Src\DAO\CoctelDAO;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Requests\RequestCoctelCreate;
use socialCocktail\Http\Requests\RequestCoctelCambiarNombre;

class CoctelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocteles=CoctelDAO::all();
        return view('plantillas.admin.cocteles.index')->with('cocteles',$cocteles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cristales=CristalDAO::all();
        $categorias=CategoriaDAO::all();
        return view('plantillas.admin.cocteles.create')->with(['cristales'=>$cristales,'categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCoctelCreate $request)
    {
        CoctelDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.cocteles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coctel=CoctelDAO::findById($id);
        return view('plantillas.admin.cocteles.edit')->with('coctel',$coctel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCoctelCambiarNombre $request, $id)
    {
        CoctelDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.cocteles.index');
    }

    public function editContenido($id){
        $coctel=CoctelDAO::findById($id);
        return view('plantillas.admin.cocteles.editContenido')->with('coctel',$coctel);
    }

    public function updateContenido(Request $request, $id){

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoctelDAO::delete($id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.cocteles.index');
    }
}
