<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 1:52 PM
 */

namespace socialCocktail\Http\Controllers\Src\Utiles;
use Laracasts\Flash\Flash;

class Utiles
{
    public static function flashMessageSuccess($message){
        Flash::success($message);
    }

    public static function flashMessageSuccessDefect(){
        Flash::success('Tarea realizada con éxito.');
    }

    public static function flashMessageError($message){
        Flash::error($message);
    }

    public static function getShowCoctel($coctel){

        //MOSTRAR IMAGEN!

        if ($coctel->usuario == null){
            $user='Cocteleria Clásica';
        }else{
            $user=$coctel->usuario->name;
        }
        $ret='<div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            Opciones  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Agregar a recetario</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Denunciar</a></li>
                            <li role="presentation" class="divider"></li>
                        </ul>
                    </li>

                    <li class="active"><a href="#tab_3-2" data-toggle="tab" aria-expanded="true">Info</a></li>

                    <li class="pull-left header"><i class="fa fa-glass"></i> Coctel</li>
                </ul>
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_3-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <a href="#"><h1 style="font-size: 17px;color: red">'.$coctel->nombre.'</h1></a>
                                </div>
                                <div class="form-group">
                                    <ul style="list-style:none;margin:0 0 0 0;padding:0 0 0 0;">
                                        <li><b>Autor: </b>'.$user.'</li>
                                        <li><b>Cristalería: </b>'.$coctel->cristal->nombre.'</li>
                                        <li><b>Método de preparación: </b>'.$coctel->metodo.'</li>
                                        <li><b>Tipo: </b> '.$coctel->tipo->nombre.'</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div style="margin: auto">
                                            <img class="img-thumbnail" style="margin-top:3%" width="220px" src="http://www.loquenosabias.net/wp-content/uploads/2015/09/coctel-metropolitan-receta-y-preparacion.jpg">
                                        </div>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-dollar "></i> Propina</button>
                                    <span class="pull-right text-muted"> Propina $ 127 - 3 comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            ';

        echo $ret;

    }
}