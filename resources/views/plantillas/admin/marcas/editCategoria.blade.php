@extends('plantillas.admin.mainAdmin')
@section('title','Editar Categoria')
@section('titleComplement','Admin')
@section('headerContent','Modificar Categoria')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$marca->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.marcas.updateCategoria',$marca],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <select class="form-control" name="categoria_id">
                            @foreach($categorias as $categoria)
                                @if($marca->categoria->id==$categoria->id)
                                    <option value="{{$categoria->id}}" selected="selected">{{$categoria->nombre}}</option>
                                @else
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                {!! Form::close() !!}

            </div></div>
        <div class="col-md-4"></div>
    </div>
@endsection