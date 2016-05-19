<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use socialCocktail\Http\Requests;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Controllers\Src\DAO\TipoCoctelDAO;
use socialCocktail\Http\Requests\RequestTipoCoctelCreate;
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
        //
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
        TipoCoctelDAO::delete($id);
        return redirect()->route('admin.tiposCoctel.index');
    }
}
