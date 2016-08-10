<?php

namespace socialCocktail\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Monolog\Handler\Curl\Util;
use socialCocktail\Http\Controllers\Src\DAO\CoctelDAO;
use socialCocktail\Http\Controllers\Src\DAO\PaisDAO;
use socialCocktail\Http\Controllers\Src\DAO\PublicacionDAO;
use socialCocktail\Http\Controllers\Src\DAO\SeguidorDAO;
use socialCocktail\Http\Requests;
use socialCocktail\Http\Requests\UserRequest;
use socialCocktail\Http\Requests\EditUserRequest;
use socialCocktail\Http\Requests\EmailEditRequest;
use socialCocktail\Http\Requests\PasswordEditRequest;
use socialCocktail\Pais;
use socialCocktail\User;
use socialCocktail\Http\Controllers\Src\Utiles\Utiles;
use socialCocktail\Http\Controllers\Src\DAO\UserDAO;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=UserDAO::all();
        return view('plantillas.admin.user.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=PaisDAO::all();
        return view('plantillas.admin.user.create')->with('paises',$paises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->genericStore($request);
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/users/create');
    }

    public function storeByUser(UserRequest $request){
        $this->genericStore($request);
        if ($request->ajax()){
            return response()->json("¡Usuario registrado exitosamente!");
        }



        return redirect('/');
    }

    public function genericStore(UserRequest $request){
        UserDAO::create($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //Arrays unidos en secciones...

        $user=UserDAO::findById($id);
        $paises=Pais::all()->sortBy('nombre');
        $cocteles=CoctelDAO::findByUserId($user->id);
        $publicaciones=PublicacionDAO::findById($user->id);
        $seguidos=array();
        $seguidores=array();
        if (Auth::user()->id==$id){
            $seguidos=SeguidorDAO::findBySeguidor(Auth::user()->id);
            $seguidores=SeguidorDAO::findBySeguido(Auth::user()->id);
        }
        

        return view('plantillas.user.user')->with(['user'=>$user, 'cocteles'=>$cocteles,
                                                    'paises'=>$paises,'publicaciones'=>$publicaciones,
                                                    'seguidos'=>$seguidos,'seguidores'=>$seguidores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=UserDAO::findById($id);
        $paises=Pais::all();
        return view('plantillas.admin.user.edit')->with(['user'=>$user,'paises'=>$paises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        UserDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/users');

    }

    public function updateByUser(EditUserRequest $request){
        Utiles::saveImage($request,'imagenes/users');
        Utiles::setPathImage($request);
        UserDAO::update($request->all(),Auth::user()->id);
            return response()->json($request->all());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEmail($id){
        $user=UserDAO::findById($id);
        return view('plantillas.admin.user.editEmail')->with('user',$user);
    }
    public function updateEmail(EmailEditRequest $request, $id){
        UserDAO::update($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/users');
    }



    public function editPassword($id){
        $user=UserDAO::findById($id);
        return view('plantillas.admin.user.editPassword')->with('user',$user);
    }

    public function updatePassword(PasswordEditRequest $request, $id){
        UserDAO::updatePassword($request->all(),$id);
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserDAO::delete($id);
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/users');
    }

    public function autenticacion(){

    }

    public function getPaises(){
        $paises=PaisDAO::all();
        return response()->json($paises);
    }
}
