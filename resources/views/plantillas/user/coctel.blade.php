@extends('plantillas.user.sections.mainUser')
@section('title','Cóctel')
@section('titleComplement','Social-Cocktail')
@section('headerContent','Perfil del Cóctel')
@section('headerDescription',' ')
@section('contentPage')
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-danger">
                    <div class="box-body box-profile">
                        @if($coctel->path==null)
                            <img class="profile-user-img img-responsive img-circle" src="{{asset('imagenes/cocteles/defaultCoctel.jpg')}}" alt="User profile picture">
                        @else
                            <img class="profile-user-img img-responsive img-circle" src="{{asset('imagenes/cocteles'.$coctel->path)}}" alt="User profile picture">
                        @endif


                        <h3 class="profile-username text-center">{{$coctel->nombre}}</h3>

                        <p class="text-muted text-center">{{$coctel->tipo->nombre}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Autor</b> <a class="pull-right">La Raulito</a>
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
                                <b>Propína</b> <a class="pull-right">$ 13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-danger btn-block"><b>Dejar Propína</b></a>
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

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

@endsection