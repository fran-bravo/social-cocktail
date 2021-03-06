@extends('plantillas.admin.mainAdmin')
@section('title','Crear Subcategoria')
@section('titleComplement','Admin')
@section('headerContent','Registrar SubCategoria')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> 'admin.subCategorias.store','method'=>'POST']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{Input::old('nombre')}}" type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon fa fa-sitemap form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="categoria_id" id="categoria_id" required="required">
                            <option value="" disabled selected>Selecciones una categoria</option>
                            @foreach($categorias as $categoria)
                              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="tipo" id="tipo" required="required">
                            <option value="" disabled selected >Selecciones tipo de ingrediente</option>
                            <option value="Líquido">Líquido</option>
                            <option value="Sólido">Sólido</option>
                        </select>
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