@extends('plantillas.admin.mainAdmin')
@section('title','Editar Nombre')
@section('titleComplement','Admin')
@section('headerContent','Editar Nombre')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$tipo->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.tiposCoctel.update',$tipo],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{$tipo->nombre}}" type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon fa fa-transgender-alt form-control-feedback"></span>
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