<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use Laracasts\Flash\Flash;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Requests\SubCategoriaRequest;
use socialCocktail\SubCategoria;

class SubCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategorias=SubCategoria::all();
        return view('plantillas.admin.subCategorias.subCategorias')->with('subCategorias',$subCategorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantillas.admin.subCategorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoriaRequest $request)
    {
        $subCategoria= SubCategoria::create($request->all());
        $subCategoria->save();
        Flash::success('La SubCategoria '.$subCategoria->nombre . ' ha sido creada exitosamente');
        return redirect()->route('admin.subCategorias.index');
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
        $subCategoria=SubCategoria::find($id);
        return view('plantillas.admin.subCategorias.edit')->with('subCategoria',$subCategoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoriaRequest $request, $id)
    {
        $subCategoria=SubCategoria::find($id);
        $subCategoria->fill($request->all());
        $subCategoria->save();
        Flash::success('La SubCategoria '.$subCategoria->nombre.' ha sido modificada con exito');
        return redirect()->route('admin.subCategorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
