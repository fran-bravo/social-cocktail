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



        //      USUARIOS
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




        //      CATEGORIAS
        Route::resource('categorias','CategoriasController');
        //Rutas para cambiar el nombre de la categoria
        Route::get('categorias/{id}/editNombre',[
            'uses'=>'CategoriasController@editNombre',
            'as'=>'admin.categorias.editNombre'
        ]);
        Route::put('categorias/{id}/updateNombre',[
            'uses'=>'CategoriasController@updateNombre',
            'as'=>'admin.categorias.updateNombre'
        ]);
        Route::get('categorias/{id}/destroy',[
            'uses'=>'CategoriasController@destroy',
            'as'=>'admin.categorias.destroy'
        ]);



        //      SUBCATEGORIAS
        Route::resource('subCategorias','SubCategoriasController');
        Route::get('subCategorias/{id}/destroy',[
            'uses'=>'SubCategoriasController@destroy',
            'as'=>'admin.subCategorias.destroy'
        ]);


        //      MARCAS
        Route::resource('marcas','MarcasController');
        Route::get('marcas/{id}/destroy',[
            'uses'=>'MarcasController@destroy',
            'as'=>'admin.marcas.destroy'
        ]);
        Route::get('marcas/{id}/editDescripcion',[
            'uses'=>'MarcasController@editDescripcion',
            'as'=>'admin.marcas.editDescripcion'
        ]);
        Route::put('marcas/{id}/updateDescripcion',[
            'uses'=>'MarcasController@updateDescripcion',
            'as'=>'admin.marcas.updateDescripcion'
        ]);
    });