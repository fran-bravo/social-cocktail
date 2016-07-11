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
            $user='<li><b>Autor: </b>'.$user.'</li></a>';
        }else{
            $user=$coctel->usuario->name.' '.$coctel->usuario->lastName;
            $user="<li><b>Autor: </b><a class='pull-right' href='".asset('/usuario/'.$coctel->usuario_id)."'>$user</a></li>";
        }
        if ($coctel->path==null){
            $imagen=asset('imagenes/cocteles/defaultCoctel.png');
        }else{
            $imagen=$coctel->path;
        }
        $ret='
<div class="form-group">
    <div class="nav-tabs-custom" style="padding: 2% 2% 1% 2%">
        <div class="row">
            <div class="col-md-5">
                <div style="padding: 3%">
                    <a href="'.asset('/coctel/'.$coctel->id).'">
                        <img class="img-responsive img-hover" src="'.$imagen.'" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div style="padding: 3%">
                    <center>
                        <a href="'.asset('/coctel/'.$coctel->id).'"><h1 style="font-size: 17px;color: red">'.$coctel->nombre.'</h1></a>
                    </center>
                </div>
                <div class="form-group">
                    <ul style="list-style:none;margin:0 0 0 0;padding: 3% 3% 3% 3%;">
                        '.$user.' 
                        <li><b>Cristalería: </b><a class="pull-right">'.$coctel->cristal->nombre.'</a></li>
                        <li><b>Método: </b><a class="pull-right">'.$coctel->metodo.'</a></li>
                        <li><b>Tipo: </b><a class="pull-right"> '.$coctel->tipo->nombre.'</a></li>
                    </ul>
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <button type="button" class="btn btn-box-tool" title="Dejar propína"><i class="fa fa-dollar"></i></button>
                        </center>
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <button type="button" class="btn btn-box-tool" title="Compartir"><i class="fa fa-share-alt"></i></button>
                        </center>
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <button type="button" class="btn btn-box-tool" title="Denunciar"><i class="fa fa-info-circle"></i></button>
                        </center>
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <button type="button" class="btn btn-box-tool" title="Guardar"><i class="fa fa-bookmark"></i></button>
                        </center>
                    </div>
                    
                        <div class="col-md-12" style="padding:0 0% 0% 0">
                                <center>
                                    <span class="text-muted"> Propina $ 127 - 3 comments</span>
                                </center>
                        </div>
                    
                </div> 
                
                
               
            </div>
            <div class="row">
                
            </div>
        </div>
    </div>
</div>';

        echo $ret;

    }

    public static function getLiShowInfo($text,$valor){
        $name="default";
        if ($text=="Nombre")
            $name="name";
        if ($text=="Apellido")
            $name="lastName";
        if ($text=="Nacimiento")
            $name="nacimiento";
        if ($text=="País")
            $name="pais_id";
        if ($text=="Provincia")
            $name="provincia";
        if ($text=="Localidad")
            $name="localidad";
        if ($text=="Domicilio")
            $name="domicilio";
        if ($text=="Teléfono")
            $name="telefono";

        $salida='<li name="rowInfo" class="list-group-item">
                    <b name="titulo">'.$text.'</b>
                    <p name="nameInput" hidden>'.$name.'</p>
                    <div style="display: inline" name="contentForm">
                        <a title="Modificar" class="editBtn" name="editBtn" hidden>
                            <p class="pull-right"><i class="fa fa-fw fa-edit"></i></p>
                        </a>
                        <p id="val'.$name.'" name="valor" style="padding-right: 5%" class="pull-right">'.$valor.'</p>
                    </div>
                 </li>';
        echo $salida;
    }
}


