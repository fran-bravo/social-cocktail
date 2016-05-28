<?php

namespace socialCocktail\Http\Controllers;


use socialCocktail\Http\Controllers\Src\DAO\SubCategoriaDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Requests\SubCategoriaRequest;
use socialCocktail\Http\Requests\CambiarCategoriaRequest;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Requests\SubCategoriaCambiarNombreRequest;

class SubCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategorias=SubCategoriaDAO::all();
        return view('plantillas.admin.subCategorias.subCategorias')->with('subCategorias',$subCategorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=CategoriaDAO::all();
        return view('plantillas.admin.subCategorias.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoriaRequest $request)
    {
        SubCategoriaDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
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
        $subCategoria=SubCategoriaDAO::findById($id);
        return view('plantillas.admin.subCategorias.edit')->with('subCategoria',$subCategoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoriaCambiarNombreRequest $request, $id)
    {
        SubCategoriaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.subCategorias.index');
    }

    public function editCategoria($id){
        $subCategoria=SubCategoriaDAO::findById($id);
        $categorias=CategoriaDAO::all();
        return view('plantillas.admin.subCategorias.editCategoria')->with(['subCategoria'=>$subCategoria,'categorias'=>$categorias]);
    }

    public function updateCategoria(CambiarCategoriaRequest $request,$id){
        SubCategoriaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
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
        SubCategoriaDAO::delete($id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.subCategorias.index');
    }

    public function getSubcategoriasByIdCategoria($id){
        $subCategorias=SubCategoriaDAO::getSubCategoriaByCategoria($id);
        return response()->json($subCategorias);
    }

    public function getById($id){
        $subCategoria=SubCategoriaDAO::findById($id);
        return response()->json($subCategoria);
    }


}
