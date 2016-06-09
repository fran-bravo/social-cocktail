<?php

namespace socialCocktail\Providers;

use Illuminate\Support\ServiceProvider;
use socialCocktail\Coctel;
use socialCocktail\Http\Controllers\Src\DAO\MarcaDAO;
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

        Validator::extend('cantidad_ingredietes',function($atribute, $value, $parameters){
            $cant=count($value);
            if ($cant>1 && $cant <=10){
                return true;
            }
            return false;
        });

        Validator::extend('valid_ingredient', function($atribute, $value, $parameters){
            foreach ($value as $ingredient){
                if ($this->isEmptyIngredient($ingredient))
                    return false;
                if (!$this->isValidIngredient($ingredient))
                    return false;

            }


            return true;
        });

        Validator::extend('unique_ingredient', function($atribute, $value, $parameters){
            $ingTempo=null;
            foreach ($value as $ingredient){
                if ($ingTempo!=null){
                    if ($this->isComparable($ingredient)){
                        if ($ingredient['categoria_id']==$ingTempo['categoria_id'])
                            return false;
                    }else{
                        if ($ingTempo['subcategoria_id']==$ingredient['subcategoria_id'])
                            return false;
                    }

                }
                $ingTempo=$ingredient;
            }
            return true;
        });

        Validator::extend('unique_coctel',function($atribute, $value, $parameters){
            $cocteles=Coctel::all();
            foreach ($cocteles as $coctel){
                $ingredientesCoctel=$coctel->ingredientes;
                if ($this->equalsIngredientes($value, $ingredientesCoctel)){
                    return false;
                }
            }
            return true;
        });
    }

    private function equalsIngredientes($ingredientesEntrada,$ingredientesCoctel){
        $c=0;
        if (count($ingredientesCoctel)==count($ingredientesEntrada)){
            foreach ($ingredientesEntrada as $ingEntrada){
                foreach ($ingredientesCoctel as $ingCoctel){
                    if ($this->isComparable($ingEntrada)){
                        if ($ingEntrada['categoria_id']==$ingCoctel->marca->categoria->id){
                            $c++;
                        }
                    }else{
                        if ($ingEntrada['subcategoria_id']==$ingCoctel->marca->subcategoria->id){
                            $c++;
                        }
                    }
                }
            }
            if ($c==count($ingredientesEntrada)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    private function getIdMarcaByIngredient($ingrediente){
        return $ingrediente['marca_id'];
    }

    private function getIdCategoriaByIngredient($ingrediente){
        $marca=MarcaDAO::findById($this->getIdMarcaByIngredient($ingrediente));
        return $marca->categoria->id;
    }

    private function isComparable($ingrediente){
        $marca=MarcaDAO::findById($ingrediente['marca_id']);
        if ($marca->categoria->comparable){
            return true;
        }
        return false;
    }

    private function isEmptyIngredient($ingrediente){
        foreach ($ingrediente as $valor){
            if ($valor==null)
                return true;
        }

    }

    private function isValidIngredient($ingrediente){
        $cantidad=$ingrediente['cantidad'];
        $marca=MarcaDAO::findById($ingrediente['marca_id']);
        $unidad=$ingrediente['unidad_medida'];
        $subCategoria=$marca->subcategoria;


        if (is_numeric($cantidad) && $this->existMarca($marca) && $this->validUnidadMedida($subCategoria,$unidad)){
            return true;
        }
        return false;
    }

    public function validUnidadMedida($subCategoria, $unidad){
        $liquido=array('CL','ML','L','Oz');
        $solido=array('Unidad','MG','g');
        if ($subCategoria->tipo=="Líquido" && in_array($unidad,$liquido) ){
            return true;
        }
        if (in_array($unidad,$solido)){
            return true;
        }

        return false;
    }

    private function existMarca($marca){
        if ($marca==null)
            return false;
        return true;
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
