<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use socialCocktail\Http\Requests;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Requests\RequestCristales;

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
        return view('plantillas.admin.cristales.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //No entra aca
        CristalDAO::delete($id);
        Utiles::flashMessageSuccessDefect();
        return redirect()->route('admin.cristales.index');
    }

    public function editDescripcion($id){
        return view('plantillas.admin.cristales.editDescripcion');
    }

    public function updateDescripcion($id){

    }
}
