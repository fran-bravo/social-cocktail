<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use socialCocktail\Http\Requests\CategoriasRequest;
use socialCocktail\Http\Requests\CategoriasEditNombreRequest;
use socialCocktail\Http\Requests;
use socialCocktail\SubCategoria;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=CategoriaDAO::all();
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
        CategoriaDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
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
        $categoria=CategoriaDAO::findById($id);
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
        CategoriaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
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
        CategoriaDAO::delete($id);
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/categorias');
    }

    public function editNombre($id){
        $categoria=CategoriaDAO::findById($id);
        return view('plantillas.admin.categorias.editNombre')->with('categoria',$categoria);
    }

    public function updateNombre(CategoriasEditNombreRequest $request, $id){
        CategoriaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/categorias');
    }
}
