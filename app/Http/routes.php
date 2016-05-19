<?php
use socialCocktail\Http\Controllers\Src\DAO\MarcaDAO;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\SubCategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
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
    Route::get('/migratessct1994',function(){
        App::make('migrate')->run('path/to/migrations');
    });




    Route::get('/', function () {
        return view('index');
    });

    Route::get('/recetas', function () {
        return view('plantillas.user.recetas');
    });

    Route::get('/recetario', function () {
        return view('plantillas.user.recetario');
    });

    Route::get('/registrarcoctel', function () {
        $marcas=MarcaDAO::all();
        $categorias=CategoriaDAO::all();
        $subCategorias=SubCategoriaDAO::all();
        $cristaleria=CristalDAO::all();
        return view('plantillas.user.registrarCoctel')->with([
            'marcas'=>$marcas,'categorias'=>$categorias,'subCategorias'=>$subCategorias,'cristaleria'=>$cristaleria]);
    });

    Route::group(['prefix'=>'recetario'],function(){

        Route::get('coctelespersonales', function () {
            return view('plantillas.user.miscocteles');
        });

        Route::get('cocteles', function () {
            return view('plantillas.user.cocteles');
        });
    });

    Route::get('/admin','AdminController@index');
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
        Route::get('subCategorias/{id}/editCategoria',[
            'uses'=>'SubCategoriasController@editCategoria',
            'as'=>'admin.subCategorias.editCategoria'
        ]);
        Route::put('subCategorias/{id}/updateCategoria',[
            'uses'=>'SubCategoriasController@updateCategoria',
            'as'=>'admin.subCategorias.updateCategoria'
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
        Route::get('marcas/{id}/editCategoria',[
            'uses'=>'MarcasController@editCategoria',
            'as'=>'admin.marcas.editCategoria'
        ]);
        Route::put('marcas/{id}/updateCategoria',[
            'uses'=>'MarcasController@updateCategoria',
            'as'=>'admin.marcas.updateCategoria'
        ]);
        Route::get('marcas/{id}/getSubCategorias',[
            'uses'=>'MarcasController@getSubCategorias',
            'as'=>'admin.marcas.getSubCategorias'
        ]);



        Route::resource('cristales','CristalesController');
        Route::get('cristales/{id}/editDescripcion',[
            'uses'=>'CristalesController@editDescripcion',
            'as'=>'admin.cristales.editDescripcion'
        ]);
        Route::get('cristales/{id}/destroy',[
            'uses'=>'CristalesController@destroy',
            'as'=>'admin.cristales.destroy'
        ]);
        Route::put('cristales/{id}/updateDescripcion',[
            'uses'=>'CristalesController@updateDescripcion',
            'as'=>'admin.cristales.updateDescripcion'
        ]);



        Route::resource('cocteles','CoctelesController');
        Route::get('cocteles/{id}/destroy',[
            'uses'=>'CoctelesController@destroy',
            'as'=>'admin.cocteles.destroy'
        ]);
        Route::get('cocteles/{id}/editContenido',[
            'uses'=>'CoctelesController@editContenido',
            'as'=>'admin.cocteles.editContenido'
        ]);
        Route::put('cocteles/{id}/updateContenido',[
            'uses'=>'CoctelesController@updateContenido',
            'as'=>'admin.cocteles.updateContenido'
        ]);
    });