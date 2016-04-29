<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use Laracasts\Flash\Flash;
use socialCocktail\Categoria;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Requests\MarcasRequest;
use socialCocktail\Http\Requests\MarcasEditNombreRequest;
use socialCocktail\Http\Requests\CambiarCategoriaRequest;
use socialCocktail\Marca;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas=Marca::all();
        return view('plantillas.admin.marcas.index')->with('marcas',$marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all()->sortBy('nombre');

        return view('plantillas.admin.marcas.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcasRequest $request)
    {
        $marca=Marca::create($request->all());
        $marca->save();
        Flash::success('La marca '.$marca->nombre.' ha sido registrada con exito');
        return redirect()->route('admin.marcas.index');
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
        $marca=Marca::find($id);
        return view('plantillas.admin.marcas.edit')->with('marca',$marca);
    }

    public function editDescripcion($id){
        $marca=Marca::find($id);
        return view('plantillas.admin.marcas.editDescripcion')->with('marca',$marca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarcasEditNombreRequest $request, $id)
    {
        $marca=Marca::find($id);
        $marca->fill($request->all());
        $marca->save();
        Flash::success('La marca '.$marca->nombre.' ha sido modificada exitosamente');
        return redirect()->route('admin.marcas.index');
    }

    public function updateDescripcion(Request $request, $id){
        $marca=Marca::find($id);
        $marca->fill($request->all());
        $marca->save();
        Flash::success('La descripcion de '.$marca->nombre.'ha sido modificada exitosamente');
        return redirect()->route('admin.marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca=Marca::find($id);
        $marca->delete();
        Flash::success('La marca '.$marca->nombre.' ha sido eliminada exitosamente');
        return redirect()->route('admin.marcas.index');
    }

    public function editCategoria($id){
        $marca=Marca::find($id);
        $categorias=Categoria::all()->sortBy('nombre');
        return view('plantillas.admin.marcas.editCategoria')->with(['marca'=>$marca,'categorias'=>$categorias]);
    }

    public function updateCategoria(CambiarCategoriaRequest $request,$id){
        $marca=Marca::find($id);
        $marca->fill($request->all());
        $marca->save();
        Flash::success('La marca '.$marca->nombre.' ha sido modificada exitosamente');
        return redirect()->route('admin.marcas.index');
    }
}
