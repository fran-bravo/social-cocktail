@extends('plantillas.admin.mainAdmin')
@section('title','Registrar Marca')
@section('titleComplement','Admin')
@section('headerContent','Registrar Marca')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> 'admin.marcas.store','method'=>'POST']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{Input::old('nombre')}}" type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon fa fa-registered form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="categoria_id" id="categoria_id" required="required">
                            <option selected disabled value="" >Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <select disabled class="form-control" name="subCategoria_id" id="subCategoria_id">
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="supermarca_id" id="supermarca_id">
                            <option selected disabled value="" >Seleccione una Super Marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripcion">{{Input::old('descripcion')}}</textarea>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

                {!! Form::close() !!}

            </div></div>
        <div class="col-md-4"></div>
    </div>
@endsection