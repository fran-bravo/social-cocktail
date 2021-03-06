<?php

    Route::get('/test','Derivador@test');



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
    Route::get('/',[
        'uses'=>'Derivador@index',
        'as'=>'user.index',
        'middleware'=>'auth'
    ]);
    //SET PROPINA COCTEL
    Route::post('setPropina/{id}',[
        'uses'=>'CoctelesController@setPropina',
        'as'=>'setPropina',
        'middleware'=>'auth',
    ]);

    //GET PROPINA COCTEL
    Route::get('getPropina/{id}',[
        'uses'=>'CoctelesController@getPropina',
        'as'=>'getPropina',
        'middleware'=>'auth',
    ]);

    //SET PUBLICACION
    Route::post('/setPublicacion',[
        'uses'=>'PublicacionesController@store',
        'as'=>'user.crear.publicacion',
        'middleware'=>'auth'
    ]);

    //SET COMENTARIO
    Route::post('/setComentario',[
        'uses'=>'ComentariosController@store',
        'as'=>'user.create.comentario',
        'middleware'=>'auth'
    ]);

    //GET COMENTARIOS BY PUBLICACION
    Route::get('/getComentarios/{id}',[
        'uses'=>'ComentariosController@show',
        'as'=>'user.show.comentarios',
        'middleware'=>'auth'
    ]);


    //SET SEGUIDOR
    Route::post('/setSeguidor/{id}',[
        'uses'=>'SeguidoresController@store',
        'as'=>'user.seguir',
        'middleware'=>'auth'
    ]);

    //remove seguidor
    Route::post('/removeSeguidor/{id}',[
        'uses'=>'SeguidoresController@destroy',
        'as'=>'user.destroy.seguidor',
        'middleware'=>'auth'
    ]);




    Route::get('/login',[
        'uses'=>'Auth\AuthController@getLogin',
        'as'=>'user.login'
    ]);

    Route::get('/logout','Auth\AuthController@logout');

    Route::post('/login', [
        'uses'=>'Auth\AuthController@postLogin',
      'as'=>'user.login'
    ]);

    Route::get('/registro',[
        'middleware'=>'guest',
        'uses'=>'Derivador@registro'
    ]);

    //Modificar usuario desde perfil
    Route::post('/usuario/update',[
        'uses'=>'UsersController@updateByUser',
        'middleware'=>'auth'
    ]);

    //Get Paises in JSON
    Route::get('/paisesJSON',[
        'uses'=>'UsersController@getPaises',
        'as'=>'getPaisesInJSON',
        'middleware'=>'auth'
    ]);



    Route::get('/usuario/{id}','UsersController@show');

    Route::get('/coctel/{id}','CoctelesController@show');

    Route::post('/registrar',[
        'uses'=>'UsersController@storeByUser',
        'as'=>'user.registro'
    ]);

    Route::get('/recetas', function () {
        return view('plantillas.user.recetas');
    });

    Route::get('/recetario', function () {
        return view('plantillas.user.recetario');
    });

    Route::get('/bebidasConAlcohol', "Derivador@bebidasConAlcohol");
    Route::get('/cristaleria', "Derivador@cristaleria");

    Route::get('/registrarcoctel',[
        'middleware' => 'auth',
        'uses'=>'CoctelesController@createByUser',
        'as'=>'user.coctel.create'
    ]);

    Route::post('user.coctel.storeByUser',[
        'uses'=>'CoctelesController@storeByUser',
        'as'=>'user.coctel.store'
    ]);

    Route::get('/validate/nombreCoctel/{nombre}',[
        'uses'=>'CoctelesController@existNombre',
        'as'=>'validate.nombre.coctel'
    ]);


    Route::group(['prefix'=>'recetario'],function(){

        Route::get('coctelespersonales', function () {
            return view('plantillas.user.miscocteles');
        });

        Route::get('cocteles', function () {
            return view('plantillas.user.cocteles');
        });
    });



Route::get('/{id}/getSubCategorias',[
    'uses'=>'SubCategoriasController@getSubcategoriasByIdCategoria',
    'as'=>'user.coctel.getSubCategorias'
]);

Route::get('/{id}/getMarcas',[
    'uses'=>'MarcasController@getMarcasBySubCategoria',
    'as'=>'user.getMarcasBySubcategoria'
]);

Route::get('/{id}/getSubCategoria',[
    'uses'=>'SubCategoriasController@getById',
    'as'=>'user.subcategorias.get'
]);



    Route::group(['prefix'=>'registrarcoctel'],function(){

        Route::get('addIngrediente', [
            'uses'=>'IngredientesController@addIngrediente',
            'as'=>'user.ingrediente.add'
        ]);




    });
    Route::get('/admin',['uses'=>'AdminController@index','middleware'=>['auth','is_admin']]);

    Route::group(['prefix' => 'admin','middleware'=>['auth','is_admin']], function(){



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
            'uses'=>'SubCategoriasController@getSubcategoriasByIdCategoria',
            'as'=>'admin.marcas.getSubCategorias'
        ]);
        Route::get('marcas/{id}/editSubCategoria',[
            'uses'=>'MarcasController@editSubCategoria',
            'as'=>'admin.marcas.editSubCategoria'
        ]);
        Route::put('marcas/{id}/updateSubCategoria',[
            'uses'=>'MarcasController@updateSubCategoria',
            'as'=>'admin.marcas.updateSubCategoria'
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


        Route::resource('tiposCoctel','TiposCoctelesController');
        Route::get('tiposCoctel/{id}/destroy',[
            'uses'=>'TiposCoctelesController@destroy',
            'as'=>'admin.tiposCoctel.destroy'
        ]);
        Route::get('tiposCoctel/{id}/editDescripcion',[
            'uses'=>'TiposCoctelesController@editDescripcion',
            'as'=>'admin.tiposCoctel.editDescripcion'
        ]);
        Route::put('tiposCoctel/{id}/updateDescripcion',[
            'uses'=>'TiposCoctelesController@updateDescripcion',
            'as'=>'admin.tiposCoctel.updateDescripcion'
        ]);
    });

//Route::auth();

//Route::get('/home', 'HomeController@index');