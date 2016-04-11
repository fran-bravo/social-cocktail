<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use socialCocktail\Categoria;
use socialCocktail\Http\Requests\CategoriasRequest;
use socialCocktail\Http\Requests\CategoriasEditNombreRequest;
use socialCocktail\Http\Requests;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Categoria::all();
        return view('plantillas/admin/categorias/categorias')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantillas/admin/categorias/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriasRequest $request)
    {
        $categoria=Categoria::create($request->all());
        $categoria->save();
        Flash::success('La categoria '.$categoria->nombre .' ha sido creada exitosamente');
        return redirect('admin/categorias');
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
        $categoria=Categoria::find($id);
        return view('plantillas.admin.categorias.editDescripcion')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria=Categoria::find($id);
        $categoria->fill($request->all());
        Flash::success('La categoria '.$categoria->nombre.' ha sido modificada con exito');
        $categoria->save();
        return redirect('admin/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();
        Flash::success('El categoria '.$categoria->nombre.' ha sido elimiada con exito');
        return redirect('admin/categorias');
    }

    public function editNombre($id){
        $categoria=Categoria::find($id);
        return view('plantillas.admin.categorias.editNombre')->with('categoria',$categoria);
    }

    public function updateNombre(CategoriasEditNombreRequest $request, $id){
        $categoria=Categoria::find($id);
        $categoria->nombre=$request->nombre;
        $categoria->save();
        Flash::success('La categoria ha sido modificada con exito');
        return redirect('admin/categorias');
    }
}
