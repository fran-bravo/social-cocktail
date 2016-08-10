@extends('plantillas.user.sections.mainUser')
@section('title','Usuario')
@section('titleComplement','Social-Cocktail')
@section('headerContent','Perfil del Usuario')
@section('headerDescription',' ')
@section('contentPage')
    <section class="content">
        <span id="userId" hidden="hidden">{{$user->id}}</span>
        <div class="modal fade" id="popupCambiarImagenPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Cerrar</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Cambiar imagen de perfil</h4>
                    </div>
                    <div id="divCImg" class="modal-body">
                        <form enctype="multipart/form-data" method="post" action="" name="formCambiarImagenPerfil" id="formCambiarImagenPerfil" role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Imagen</label>
                                </div>
                                <div class="col-md-6">
                                    <div id="load"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input hidden type="text" name="nombre" value="{{$user->name}} {{$user->lastName}}">
                                <input data-buttonText="Seleccionar" class="filestyle" name="file" id="imagen" type="file" accept=".jpeg,.png,.bmp,.gif,.svg">
                                <span name="message" class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <input id="submitImg" type="submit" class="btn btn-block btn-danger" value="Cambiar">
                            </div>

                            <input type="hidden" name="cropx" id="cropx" value="0" />
                            <input type="hidden" name="cropy" id="cropy" value="0" />
                            <input type="hidden" name="cropw" id="cropw" value="0" />
                            <input type="hidden" name="croph" id="croph" value="0" />
                            <input type="hidden" name="height" id="height" value="0" />
                            <input type="hidden" name="width" id="width" value="0" />
                        </form>
                        <!-- <img style="border: none" width="100%" height="100%" id="imgSalida" src="" /> -->
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-danger">
                    <div class="box-body box-profile">
                        <a id="img" href="{{asset('imagenes/users/'.$user->imagen)}}">
                            <img class="profile-user-img img-responsive img-circle" src="{{asset('imagenes/users/'.$user->imagen)}}" alt="User profile picture">
                        </a>

                        <h3 class="profile-username text-center">{{$user->name}} {{$user->lastName}}</h3>

                        <p class="text-muted text-center">Pensar</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Cócteles</b> <a class="pull-right">{{\socialCocktail\Http\Controllers\Src\DAO\CoctelDAO::countByUser($user->id)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Seguidores</b> <a class="pull-right">{{\socialCocktail\Http\Controllers\Src\DAO\SeguidorDAO::countSeguidores($user->id)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Seguidos</b> <a class="pull-right">{{\socialCocktail\Http\Controllers\Src\DAO\SeguidorDAO::countSeguidos($user->id)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Propína</b> <a class="pull-right">Prog</a>
                            </li>
                        </ul>
                        @if(\Illuminate\Support\Facades\Auth::user()!=null)
                            @if($user->id==\Illuminate\Support\Facades\Auth::user()->id)
                                <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#popupCambiarImagenPerfil"><b>Cambiar Imagen</b></a>
                            @else
                                @if(count(\socialCocktail\Http\Controllers\Src\DAO\SeguidorDAO::findByIds($user->id,\Illuminate\Support\Facades\Auth::user()->id))>0)
                                    <a id="dejarSeguirBtn" href="#" class="btn btn-danger btn-block">
                                        <b>Dejar de seguir</b>
                                    </a>
                                @else
                                    <a id="seguirBtn" href="#" class="btn btn-success btn-block">
                                        <b>Seguir</b>
                                    </a>
                                @endif
                                <a href="#" class="btn btn-danger btn-block"><b>Mensaje (Prog)</b></a>
                            @endif
                        @else
                            <a href="" class="btn btn-danger btn-block"><b>Seguir (Prog)</b>
                            </a>
                            <a href="#" class="btn btn-danger btn-block"><b>Mensaje (Prog)</b></a>
                        @endif

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-7">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Actividad</a></li>
                        <li><a href="#timeline" data-toggle="tab">Cócteles</a></li>
                        @if(\Illuminate\Support\Facades\Auth::user()!=null)
                            @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
                                <li><a href="#settings" data-toggle="tab" aria-expanded="true">Configuracón</a></li>
                                <li><a href="#seguidos" data-toggle="tab" aria-expanded="true">Seguidos</a></li>
                                <li><a href="#seguidores" data-toggle="tab" aria-expanded="true">Seguidores</a></li>
                            @endif
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
                                    {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getBodyPublicacion()}}
                                @endif
                            @endif
                            <!-- Mostrar las publicaiones del usuario -->
                            <div id="contentIndex">
                                @if(count($publicaciones)<1 and $user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                    <p>El usuario no posee actividad</p>
                                @endif
                                @foreach($publicaciones as $publicacion)
                                    <div style="margin-bottom: 10%">
                                        {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getShowPublicacion($publicacion)}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">

                            <!-- Mostrar los cocteles del usuario -->
                            @if(count($cocteles)<1 and $user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                <p>El usuario no posee cócteles</p>
                            @endif
                            @foreach($cocteles as $coctel)
                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getShowCoctel($coctel)}}
                            @endforeach
                         </div>
                        <!-- /.tab-pane -->
                        @if(\Illuminate\Support\Facades\Auth::user()!=null)
                            @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
                                <div class="tab-pane" id="settings">
                                    <h4>Información personal</h4>
                                    <hr style="margin-top: 5px">
                                    <div class="row">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-10">
                                            <ul class="list-group list-group-unbordered">

                                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('Nombre',\Illuminate\Support\Facades\Auth::user()->name)}}

                                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('Apellido',\Illuminate\Support\Facades\Auth::user()->lastName)}}

                                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('Nacimiento',\Illuminate\Support\Facades\Auth::user()->nacimiento)}}

                                            </ul>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                    </div>
                                    <h4>Información de contacto</h4>
                                    <hr style="margin-top: 5px">
                                    <div class="row">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-10">
                                            <ul class="list-group list-group-unbordered">

                                                @if(\Illuminate\Support\Facades\Auth::user()->pais_id!=null)
                                                    {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('País',\Illuminate\Support\Facades\Auth::user()->pais->nombre)}}
                                                @else
                                                    {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('País',"")}}
                                                @endif


                                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('Provincia',\Illuminate\Support\Facades\Auth::user()->provincia)}}

                                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('Localidad',\Illuminate\Support\Facades\Auth::user()->localidad)}}

                                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('Domicilio',\Illuminate\Support\Facades\Auth::user()->domicilio)}}

                                                {{\socialCocktail\Http\Controllers\Src\Utiles\Utiles::getLiShowInfo('Teléfono',\Illuminate\Support\Facades\Auth::user()->telefono)}}

                                            </ul>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                    </div>
                                </div>
                                <!-- Seguidores -->
                                <div class="tab-pane" id="seguidores">
                                    @if(count($seguidores)>0)
                                        @for($i=0;$i<count($seguidores);$i++)

                                            <!-- ACA HAY QUE MOSTRAR LOS SEGUIDORES -->

                                            {{$seguidores[$i]}}
                                        @endfor
                                    @else
                                        <p>Aun no tenes seguidores</p>
                                    @endif
                                </div>

                                <!-- Seguidos -->
                                <div class="tab-pane" id="seguidos">
                                    @if(count($seguidos)>0)
                                    @for($i=0;$i<count($seguidos);$i++)

                                            <!-- ACA HAY QUE MOSTRAR LOS SEGUIDOs -->

                                    {{$seguidos[$i]}}
                                    @endfor
                                    @else
                                        <p>Aun no seguis a nadie</p>
                                    @endif
                                </div>

                                @endif
                        @endif
                        <!-- /.tab-pane -->
                    </div> <!-- -->
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>

        </section>
        <!-- /.row -->

@endsection