@extends('plantillas.user.sections.mainUser')
@section('title','Cóctel')
@section('titleComplement','Social-Cocktail')
@section('headerContent','Perfil del Cóctel')
@section('headerDescription',' ')
@section('contentPage')
    <input hidden id="idCoctel" value="{{$coctel->id}}">
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-danger">
                    <div class="box-body box-profile">

                            @if($coctel->imagen==null)
                                <a id="img" href="{{asset('imagenes/cocteles/defaultCoctel.png')}}">
                                    <img class="profile-user-img img-responsive img-circle" src="{{asset('imagenes/cocteles/defaultCoctel.png')}}" alt="User profile picture">
                                </a>
                            @else
                                <a id="img" href="{{asset('imagenes/cocteles/'.$coctel->imagen)}}">
                                    <img class="profile-user-img img-responsive img-circle" src="{{asset('imagenes/cocteles/'.$coctel->imagen)}}" alt="User profile picture">
                                </a>
                            @endif



                        <h3 class="profile-username text-center">{{$coctel->nombre}}</h3>

                        <p class="text-muted text-center">{{$coctel->tipo->nombre}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Autor</b> <a href="{{asset('usuario/'.$coctel->usuario->id)}}" class="pull-right">{{$coctel->usuario->name}} {{$coctel->usuario->lastName}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Publicación</b> <a class="pull-right">{{date_format($coctel->created_at, 'd/m/y')}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Cristalería</b> <a class="pull-right">{{$coctel->cristal->nombre}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Método</b> <a class="pull-right">{{$coctel->metodo}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tipo</b> <a class="pull-right">{{$coctel->tipo->nombre}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Propína</b> <a id="showPropina" class="pull-right">$ {{count($coctel->propinas)}}</a>
                            </li>
                        </ul>
                                @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                    @if($coctel->usuario->id == \Illuminate\Support\Facades\Auth::user()->id)
                                        <a id="setPropina" class="btn btn-warning btn-block disabled"><b>Cóctel propio</b></a>
                                    @else
                                        @if(\socialCocktail\Http\Controllers\Src\DAO\PropinaDAO::existPropina(\Illuminate\Support\Facades\Auth::user()->id,$coctel->id))
                                            <a id="setPropina" class="btn btn-danger btn-block disabled"><b>Haz dejado propína</b></a>
                                        @else
                                            <a id="setPropina" class="btn btn-success btn-block"><b>Dejar Propína</b></a>
                                        @endif
                                    @endif
                                @else
                                    <a href="{{asset("/login")}}" class="btn btn-success btn-block"><b>Dejar Propína</b></a>
                                @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-th-list"></i>
                        <h3 class="box-title">Ingredientes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Unidad</th>
                                    <th>Categoría</th>
                                    <th>Sub Categoría</th>
                                    <th>Marca</th>
                                </tr>
                                @foreach($coctel->ingredientes as $ingrediente)
                                    <tr>
                                        <td>{{$ingrediente->cantidad}}</td>
                                        <td>{{$ingrediente->unidad_medida}}</td>
                                        <td>{{$ingrediente->marca->categoria->nombre}}</td>
                                        <td>{{$ingrediente->marca->subCategoria->nombre}}</td>
                                        <td>{{$ingrediente->marca->nombre}}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <i class="fa fa-list-ol"></i>

                        <h3 class="box-title">Preparación</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{$coctel->preparacion}}
                    </div>
                    <!-- /.box-body -->
                </div>

                @if(!$coctel->historia==null)
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <i class="fa fa-history"></i>

                            <h3 class="box-title">Historia</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{$coctel->historia}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                @endif

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <i class="fa fa-commenting"></i>

                        <h3 class="box-title">Comentarios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            @if(count($coctel->comentarios)<1)
                                <div class="form-group">
                                    <p>Actualmente este cóctel no posee comentarios</p>
                                </div>
                            @else
                                <div class="box-footer box-comments" name="comentarios">
                                    @foreach($coctel->comentarios as $comentario)
                                        <div class="box-comment">
                                            <img class="img-circle img-sm" src="{{asset('imagenes/users/'.$comentario->usuario->imagen)}}" alt="User Image">
                                            <div class="comment-text">
                                                <span class="username">
                                                    {{$comentario->usuario->name}} {{$comentario->usuario->lastName}}
                                                    <span class="text-muted pull-right">{{$comentario->created_at}}</span>
                                                </span>
                                                <p>{{$comentario->contenido}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                                @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                    <div style="margin-top: 5%">
                                        <form id="formSetComentarioCoctel">
                                            <input name="_token" type="text" hidden="" value="{{csrf_token()}}">
                                            <img class="img-responsive img-circle img-sm" src="http://localhost:8000/imagenes/users/Uriel Bonano.jpg" altalt="Alt Text">
                                            <!-- .img-push is used to add margin to elements next to floating images -->
                                            <div class="img-push">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input name="coctel_id" type="text" hidden="hidden" value="{{$coctel->id}}">
                                                            <input name="contenido" type="text" class="form-control input-sm contenidoC" placeholder="Escriba un comentario">
                                                            <span name="message" class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <button id="submitComentario" type="submit" class="btn btn-danger pull-right btn-block btn-sm">Enviar</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                @endif

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

@endsection