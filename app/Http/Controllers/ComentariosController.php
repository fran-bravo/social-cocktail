<?php

namespace socialCocktail\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use socialCocktail\Http\Controllers\Src\DAO\ComentarioDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Requests\RequestComentarioCreate;

class ComentariosController extends Controller
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
    public function store(RequestComentarioCreate $request)
    {
        $request['usuario_id']=Auth::user()->id;
        ComentarioDAO::create($request->all());
        return response()->json("¡Comentado!");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentarios=ComentarioDAO::findByIdPublicacion($id);
        foreach ($comentarios as $comentario){
            $comentario->usuario;
        }
        return response()->json($comentarios);
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
        //
    }
}
