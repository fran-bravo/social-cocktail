<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Controllers\Src\DAO\MarcaDAO;
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
        $this->saveImage($request);
        $this->genericStore($request);
        return redirect()->route('admin.cocteles.create');
    }



    public function storeByUser(RequestCoctelCreate $request){

        //Validar que no se repitan los ingredientes en el request(no me acuerdo si lo hice)
        //Traer los errores de la sesion y enviarlos;

        $this->saveImage($request);
        $this->genericStore($request);

        return redirect()->route('user.coctel.create');
    }

    public function getNameImage(Request $request){
        $imagen=$this->getImageFile($request);
        $nombre=$request['nombre'].'.'.$imagen->getClientOriginalExtension();
        return $nombre;
    }

    public function saveImage(Request $request){
    if ($request['imagen']){
        $imagen=$this->getImageFile($request);
        $nombre=$this->getNameImage($request);
        //config/filesystem
        \Storage::disk('cocteles')->put($nombre,  \File::get($imagen));
    }

    }

    public function getImageFile(Request $request){
        return $request->file('imagen');
    }

    public function genericStore(Request $request){
        $this->setPathImage($request);
        CoctelDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
    }

    public function setPathImage(Request $request){
    if ($request['imagen']!=null) {
        $request['path'] = $this->getNameImage($request);
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
        return $nombre;
    }
}
