<?php

namespace socialCocktail\Http\Controllers;



use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Controllers\Src\DAO\TipoCoctelDAO;
use socialCocktail\Http\Requests\RequestTipoCoctelCreate;
use socialCocktail\Http\Requests\RequestTiposCoctelCambiarNombre;
use socialCocktail\Http\Requests\RequestTiposCotelCambiarDescripcion;

class TiposCoctelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos=TipoCoctelDAO::all();
        return view('plantillas.admin.tiposCoctel.index')->with('tipos',$tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantillas.admin.tiposCoctel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTipoCoctelCreate $request)
    {
        TipoCoctelDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.tiposCoctel.create');
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
        $tipo=TipoCoctelDAO::findById($id);
        return view('plantillas.admin.tiposCoctel.edit')->with('tipo',$tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTiposCoctelCambiarNombre $request, $id)
    {
        return $this->updateGeneric($request->all(), $id);
    }

    public function editDescripcion($id){
        $tipo=TipoCoctelDAO::findById($id);
        return view('plantillas.admin.tiposCoctel.editDescripcion')->with('tipo',$tipo);
    }

    public function updateDescripcion(RequestTiposCotelCambiarDescripcion $request, $id){
        return $this->updateGeneric($request->all(), $id);
    }

    public function updateGeneric($request, $id){
        TipoCoctelDAO::update($request,$id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.tiposCoctel.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoCoctelDAO::delete($id);
        return redirect()->route('admin.tiposCoctel.index');
    }
}
