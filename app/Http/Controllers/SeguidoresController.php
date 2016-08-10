<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use socialCocktail\Http\Controllers\Auth\AuthController;
use socialCocktail\Http\Controllers\Src\DAO\SeguidorDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Seguidor;

class SeguidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request['seguido_id']=$id;
        $request['seguidor_id']=Auth::user()->id;
        if ($id==Auth::user()->id){
            return response()->json("No es posible auto-seguirse picarón");
        }
        try{
            SeguidorDAO::create($request->all());
        }catch (QueryException $e){
            return response()->json("Solo es posible seguir a un usuario una vez");
        }

        return response()->json("Siguiendo!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $seguimiento=SeguidorDAO::findByIds($id,Auth::user()->id);
        if (count($seguimiento)){
            SeguidorDAO::delete($id,Auth::user()->id);
            return response()->json("Dejaste de seguir");
        }
        return response()->json("Error");
    }
}
