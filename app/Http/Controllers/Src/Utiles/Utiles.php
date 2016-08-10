<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 6/5/16
 * Time: 1:52 PM
 */

namespace socialCocktail\Http\Controllers\Src\Utiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use socialCocktail\Http\Controllers\Src\DAO\PropinaDAO;

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

        $style="";
        $name="";
        if (Auth::user()!=null){
            if (Auth::user()->id == $coctel->usuario->id){
                $style='disabled style="color:red"';
                $name="";
            }else{
                if (PropinaDAO::existPropina(Auth::user()->id,$coctel->id)){
                    $style='disabled style="color:green"';
                }else{
                    $name="setPropinaA";
                }
            }

        }else{
            $style="disabled";
        }



        if ($coctel->usuario == null){
            $user='Cocteleria Clásica';
            $user='<li><b>Autor: </b>'.$user.'</li></a>';
        }else{
            $user=$coctel->usuario->name.' '.$coctel->usuario->lastName;
            $user="<li><b>Autor: </b><a class='pull-right' href='".asset('/usuario/'.$coctel->usuario_id)."'>$user</a></li>";
        }
        if ($coctel->imagen==null){
            $imagen=asset('imagenes/cocteles/defaultCoctel.png');
        }else{
            $imagen=asset('imagenes/cocteles/'.$coctel->imagen);
        }
        $ret='
<div class="form-group">
    <div class="nav-tabs-custom" style="padding: 2% 2% 1% 2%">
        <div class="row">
            <div class="col-md-5">
                <div style="padding: 3%">
                    <center>
                        <a href="'.asset('/coctel/'.$coctel->id).'">
                            <img class="img-responsive img-rounded" src="'.$imagen.'" alt="">
                        </a>
                    </center>
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
                            <input type="text" hidden value="'.$coctel->id.'">
                            <a name="'.$name.'" class="btn btn-box-tool" '.$style.' title="Dejar propína"><i class="fa fa-dollar"></i></a>
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
                                    <span class="text-muted"> Propina $ '.count($coctel->propinas).' - 
                                     '.count($coctel->comentarios).' comments</span>
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

    public static function getImageFile(Request $request){
        return $request->file('file');
    }

    public static function getNameImage(Request $request){
        $imagen=Utiles::getImageFile($request);
        $nombre=$request['nombre'].'.'.$imagen->getClientOriginalExtension();
        return $nombre;
    }

    public static function saveImage(Request $request, $disk){
        if ($request['file']){
            $imagen=Utiles::getImageFile($request);
            $nombre=Utiles::getNameImage($request);
            $imgRealPath=$imagen->getRealPath();
            $i = Image::make($imgRealPath);
            $i->resize($request['width'],$request['height']);
            $i->crop($request['cropw'],$request['croph'],$request['cropx'],$request['cropy']);
            $i->resize(250,250);
            $i->save(public_path($disk). '/'. $nombre);
           
        }

    }

    public static function setPathImage(Request $request){
        if ($request['file']!=null) {
            $request['imagen'] = Utiles::getNameImage($request);
        }
    }

    public static function getBodyPublicacion(){
        echo '
            <form id="formSetPublicacion">
            <input name="_token" hidden type="text" value="'.csrf_token().'">
                <div class="form-group">
                    <div class="nav-tabs-custom" style="padding: 2% 2% 2% 2%">
                        <div class="row">
                            <div class="col-md-8">
                            <div class="form-group">
                                <textarea maxlength="500" name="contenido" id="contenido" class="form-control input-sm" placeholder="¿Compartír o no compartír? Esa es la cuestión"></textarea>
                                <span name="message" id="messageNombre" class="help-block"></span>
                            </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button id="submitPublicacion" type="submit" class="btn btn-danger pull-right btn-block btn-sm">Publicar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
    }

    public static function getShowPublicacion($publicacion){

        $coments='0 likes - 0 comments';
        $cant=count($publicacion->comentarios);
        if ($cant>0){
            $coments='<a>0 likes</a>  - <a name="getComentarios" href="'.asset('/getComentarios/'.$publicacion->id).'">'.$cant.' comments</a>';
        }

        $footer="";
        if (Auth::user()!=null){
            $footer='<div class="box-footer">
                        <form name="formSetComentarioP'.$publicacion->id.'">
                            <input name="_token" type="text" hidden value="'.csrf_token().'">
                            <img class="img-responsive img-circle img-sm" src="'.asset('imagenes/users/'. Auth::user()->imagen).'" altalt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input name="publicacion_id" type="text" hidden value="'.$publicacion->id.'">
                                         <div class="form-group">
                                            <input class="idPublicacion" value="'.$publicacion->id.'" type="text" hidden>
                                            <input name="contenido" id="contenido'.$publicacion->id.'" type="text" class="form-control input-sm contenidoC" placeholder="Escriba un comentario">
                                            <span name="message" class="help-block"></span>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button name="submitComentario" id="submitComentario" type="submit" class="btn btn-danger pull-right btn-block btn-sm">Enviar</button> 
                                    </div>
                                </div>
                            </div>
                                
                            </div>
                        </form>
                    </div>';
        }

        $salida='<div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="'.asset('imagenes/users/'.$publicacion->usuario->imagen).'" alt="User Image">
                            <span class="username"><a href="'.asset('usuario/'.$publicacion->usuario->id).'">'.$publicacion->usuario->name.' '.$publicacion->usuario->lastName.'</a></span>
                            <span class="description">Pensar - '.date_format($publicacion->created_at, 'd/m/y').'</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                <i class="fa fa-circle-o"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- post text -->
                        <p>'.$publicacion->contenido.'</p>

                        <!-- Attachment -->
                        
                        <!-- /.attachment-block -->

                        <!-- Social sharing buttons -->
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                        <span class="pull-right text-muted">'.$coments.'</span>
                    </div>
                    <!-- /.box-body -->
                    <div name="comentarios"  class="">
                    
                    </div>
                    <!-- /.box-footer -->
                    '.$footer.'
                    <!-- /.box-footer -->
                </div>';

        echo $salida;
    }
}




