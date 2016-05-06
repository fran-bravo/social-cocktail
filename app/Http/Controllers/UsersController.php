<?php

namespace socialCocktail\Http\Controllers;


use socialCocktail\Http\Requests;
use socialCocktail\Http\Requests\UserRequest;
use socialCocktail\Http\Requests\EditUserRequest;
use socialCocktail\Http\Requests\EmailEditRequest;
use socialCocktail\Http\Requests\PasswordEditRequest;
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
        return view('plantillas.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        UserDAO::create($request->all());
        Utiles::flashMessageSuccessDefect();
        return redirect('admin/users/create');
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
        $user=UserDAO::findById($id);
        return view('plantillas.admin.user.edit')->with('user',$user);
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
}
