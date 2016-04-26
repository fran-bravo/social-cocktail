@extends('plantillas.admin.mainAdmin')
@section('title','Cambiar nombre')
@section('titleComplement','Admin')
@section('headerContent','Cambiar Nombre')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-8"><div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$marca->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.marcas.update',$marca],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{$marca->nombre}}" type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon fa fa-registered form-control-feedback"></span>
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