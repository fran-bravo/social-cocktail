@extends('plantillas.admin.mainAdmin')
@section('title','Crear Tipo de Coctel')
@section('titleComplement','Admin')
@section('headerContent','Registrar Tipo de Coctel')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> 'admin.tiposCoctel.store','method'=>'POST']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{Input::old('nombre')}}" type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon fa fa-transgender-alt form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripcion">{{Input::old('descripcion')}}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>

                {!! Form::close() !!}

            </div></div>
        <div class="col-md-4"></div>
    </div>
@endsection