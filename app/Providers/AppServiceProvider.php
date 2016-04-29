<?php

namespace socialCocktail\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use socialCocktail\Categoria;

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
            $categorias=Categoria::all();
            $categoriaSeleccionada=Categoria::find($value);
            foreach ($categorias as $categoria){
                if ($categoria==$categoriaSeleccionada){
                    return true;
                }
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
