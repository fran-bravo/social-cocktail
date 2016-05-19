<?php

namespace socialCocktail\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use socialCocktail\Http\Controllers\Src\DAO\CategoriaDAO;
use socialCocktail\Http\Controllers\Src\DAO\CristalDAO;
use socialCocktail\Http\Controllers\Src\DAO\SubCategoriaDAO;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('exist_categoria',function($atribute, $value, $parameters){
            $categorias=CategoriaDAO::all();
            $categoriaSeleccionada=CategoriaDAO::findById($value);
            foreach ($categorias as $categoria){
                if ($categoria==$categoriaSeleccionada){
                    return true;
                }
            }
            return false;
        });
        Validator::extend('exist_metodo',function($atribute, $value, $parameters){
            if ($value=="Batido" or $value=="Directo" or $value=="Flambeado" or $value=="Frozen" or $value=="Licuado" or $value=="Refrescado"){
                return true;
            }else{
                return false;
            }

        });
        Validator::extend('exist_cristaleria', function($atribute, $value, $parameters){
            $cristales=CristalDAO::all();
            $cristalSeleccionado=CristalDAO::findById($value);
            foreach ($cristales as $cristal){
                if ($cristal==$cristalSeleccionado){
                    return true;
                }
            }
            return false;
        });
        Validator::extend('categoriaId_categoria',function($atribute, $value, $parameters){
            dd($parameters);
            $categoriaSeleccionada=CategoriaDAO::findById($parameters);
            if ($categoriaSeleccionada->id==$value){
                return true;
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
