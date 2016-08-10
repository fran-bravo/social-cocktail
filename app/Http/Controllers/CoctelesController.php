<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mockery\CountValidator\Exception;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Controllers\Src\DAO\MarcaDAO;
use socialCocktail\Http\Controllers\Src\DAO\PropinaDAO;
use socialCocktail\Http\Controllers\Src\DAO\SubCategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\TipoCoctelDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Controllers\Src\DAO\CoctelDAO;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Requests\RequestCoctelCreate;
use socialCocktail\Http\Requests\RequestCoctelCambiarNombre;
use Intervention\Image\Facades\Image;

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
        $tipos=TipoCoctelDAO::all();
        $marcas=MarcaDAO::all();
        $categorias=CategoriaDAO::all();
        $subCategorias=SubCategoriaDAO::all();
        $cristaleria=CristalDAO::all();
        return view('plantillas.user.registrarCoctel')->with([
            'marcas'=>$marcas,'categorias'=>$categorias,'subCategorias'=>$subCategorias,'cristaleria'=>$cristaleria,
            'tipos'=>$tipos]);
    }

    public function createByUser(){
        $tipos=TipoCoctelDAO::all();
        $marcas=MarcaDAO::all();
        $categorias=CategoriaDAO::all();
        $subCategorias=SubCategoriaDAO::all();
        $cristaleria=CristalDAO::all();
        return view('plantillas.user.registrarCoctel')->with([
            'marcas'=>$marcas,'categorias'=>$categorias,'subCategorias'=>$subCategorias,'cristaleria'=>$cristaleria,
            'tipos'=>$tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCoctelCreate $request)
    {
        Utiles::saveImage($request, 'cocteles');
        $this->genericStore($request);
        return redirect()->route('admin.cocteles.create');
    }



    public function storeByUser(RequestCoctelCreate $request){
        $request['usuario_id']=Auth::user()->id;

        Utiles::saveImage($request,'imagenes/cocteles');
        $this->genericStore($request);

        if ($request->ajax()){
            return response()->json("¡Cóctel registrado exitosamente!");
        }
        return redirect()->route('user.coctel.create');
    }

    public function genericStore(Request $request){
        Utiles::setPathImage($request);
        CoctelDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coctel=CoctelDAO::findById($id);
        return view('plantillas.user.coctel')->with('coctel',$coctel);
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

    public function existNombre($nombre){
        $coctel=CoctelDAO::findByName($nombre);
        
        return response()->json(count($coctel));
    }

    public function setPropina($idCoctel){
        $idUsuario=Auth::user()->id;
        $coctel=CoctelDAO::findById($idCoctel);
        if ($idUsuario==$coctel->usuario->id){
            return response()->json("No es posible auto-Propinearse");
        }

        try{
            PropinaDAO::create($idUsuario,$idCoctel);
        }catch (QueryException $e){
            return response()->json("Solo es posible dejar propina una vez.");
        }
        return Response()->json("¡Haz dejado propina!");
    }

    public function getPropina($idCoctel){
        return PropinaDAO::countAllByIdCoctel($idCoctel);
    }
}
