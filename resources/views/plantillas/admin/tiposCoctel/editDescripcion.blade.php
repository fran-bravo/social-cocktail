@extends('plantillas.admin.mainAdmin')
@section('title','Editar descripcion')
@section('titleComplement','Admin')
@section('headerContent','Editar descripcion')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$tipo->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.tiposCoctel.updateDescripcion',$tipo],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <textarea  name="descripcion" class="form-control" rows="5" placeholder="Descripcion">{{$tipo->descripcion}}</textarea>
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