<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */

    Route::get('/', function () {
        return view('index');
    });
    Route::get('/admin', function () {
        return view('plantillas.admin.admin');
    });
    Route::group(['prefix' => 'admin'], function(){

        Route::resource('users','UsersController');
        Route::get('users/{id}/destroy', [
            'uses'=>'UsersController@destroy',
            'as' => 'admin.users.destroy'

        ]);
        
        //Rutas para cambiar email
        Route::get('users/{id}/editEmail',[
            'uses'=>'UsersController@editEmail',
            'as'=>'admin.users.editEmail'
        ]);

        Route::put('users/{users}/updateEmail',[
            'uses'=>'UsersController@updateEmail',
            'as'=>'admin.users.updateEmail'
        ]);
        
        //Rutas para cambiar password
        Route::get('users/{id}/editPassword',[
        'uses'=>'UsersController@editPassword',
        'as'=>'admin.users.editPassword'
        ]);

        Route::put('users/{users}/updatePassword',[
            'uses'=>'UsersController@updatePassword',
            'as'=>'admin.users.updatePassword'
        ]);

        Route::resource('categorias','categoriasController');
    });