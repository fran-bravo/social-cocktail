<?php

namespace socialCocktail\Http\Controllers;


use socialCocktail\Http\Requests;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Requests\RequestCristales;
use socialCocktail\Http\Requests\RequestCristalCambiarNombre;
use socialCocktail\Http\Requests\RequestCristalCambiarDescripcion;

class CristalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cristales=CristalDAO::all();
        return view('plantillas.admin.cristales.index')->with('cristales',$cristales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantillas.admin.cristales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCristales $request)
    {
        CristalDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.cristales.create');
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
        $cristal=CristalDAO::findById($id);
        return view('plantillas.admin.cristales.edit')->with('cristal',$cristal);
    }

    public function editDescripcion($id){
        $cristal=CristalDAO::findById($id);
        return view('plantillas.admin.cristales.editDescripcion')->with('cristal',$cristal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCristalCambiarNombre $request, $id)
    {
        return $this->updateGeneric($request, $id);
    }
    public function updateDescripcion(RequestCristalCambiarDescripcion $request, $id){
        return $this->updateGeneric($request, $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */






    /**
     * @param RequestCristalCambiarNombre $request
     * @param $id
     * @return mixed
     */
    private function updateGeneric($request, $id)
    {
        CristalDAO::update($request->all(), $id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.cristales.index');
    }

    public function destroy($id)
    {
        CristalDAO::delete($id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.cristales.index');
    }
}
