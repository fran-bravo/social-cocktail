<?php

namespace socialCocktail\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use socialCocktail\Categoria;
use socialCocktail\Http\Controllers\Src\DAO\SubCategoriaDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Requests\MarcasRequest;
use socialCocktail\Http\Requests\MarcasEditNombreRequest;
use socialCocktail\Http\Requests\CambiarCategoriaRequest;
use socialCocktail\Http\Controllers\Src\DAO\MarcaDAO;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Marca;
use socialCocktail\SubCategoria;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas=MarcaDAO::all();
        return view('plantillas.admin.marcas.index')->with('marcas',$marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=CategoriaDAO::all();
        $subCategorias=SubCategoriaDAO::all();
        return view('plantillas.admin.marcas.create')->with(['categorias'=>$categorias,'subCategorias'=>$subCategorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcasRequest $request)
    {
        if ($this->SubCategoriaIsRelationCategoria($request)){
            return redirect()->route('admin.marcas.create');
        }

        MarcaDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.marcas.index');
    }

    private function SubCategoriaIsRelationCategoria(MarcasRequest $request){
        $id=$request['subCategoria_id'];

        if ($id!=null){

            $subCategoria=SubCategoriaDAO::findById($id);
            $catetoria=CategoriaDAO::findById($request['categoria_id']);
            if ($subCategoria->categoria->id != $catetoria->id){
                Utiles::flashMessageError('La sub categoría no se relaciona con la categoría');
                return false;
            }
        }
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
        $marca=MarcaDAO::findById($id);
        return view('plantillas.admin.marcas.edit')->with('marca',$marca);
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
        MarcaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.marcas.index');
    }

    public function editDescripcion($id){
        $marca=MarcaDAO::findById($id);
        return view('plantillas.admin.marcas.editDescripcion')->with('marca',$marca);
    }

    public function updateDescripcion(Request $request, $id){
        MarcaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.marcas.index');
    }

    public function editCategoria($id){
        $marca=MarcaDAO::findById($id);
        $categorias=CategoriaDAO::all();
        return view('plantillas.admin.marcas.editCategoria')->with(['marca'=>$marca,'categorias'=>$categorias]);
    }

    public function updateCategoria(CambiarCategoriaRequest $request,$id){
        MarcaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.marcas.index');
    }

    public function editSubCategoria($id){
        $marca=MarcaDAO::findById($id);
        $id=$marca->categoria->id;
        $subCategorias=SubCategoriaDAO::getSubCategoriaByCategoria($id);
        return view('plantillas.admin.marcas.editSubCategoria')->with(['marca'=>$marca,'subCategorias'=>$subCategorias]);
    }

    public function updateSubCategoria(Request $request, $id){
        $this->updateGeneric($request,$id);
        return redirect()->route('admin.marcas.index');
    }

    private function updateGeneric(Request $request, $id){
        MarcaDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
    }

    public function getMarcasBySubCategoria($id){
        $marcas=MarcaDAO::getBySubCategoria($id);
        return response()->json($marcas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MarcaDAO::delete($id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.marcas.index');
    }


}
