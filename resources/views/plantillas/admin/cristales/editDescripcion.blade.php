@extends('plantillas.admin.mainAdmin')
@section('title','Editar descripcion')
@section('titleComplement','Admin')
@section('headerContent','Editar descripcion')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$cristal->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.cristales.updateDescripcion',$cristal],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{$cristal->capacidad}}" type="text" class="form-control" name="capacidad" placeholder="capacidad" required="required" maxlength="40">
                        <span class="glyphicon glyphicon fa fa-tint form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <textarea  name="descripcion" class="form-control" rows="5" placeholder="Descripcion">{{$cristal->descripcion}}</textarea>
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