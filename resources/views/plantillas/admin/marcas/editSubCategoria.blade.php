@extends('plantillas.admin.mainAdmin')
@section('title','Editar Categoría')
@section('titleComplement','Admin')
@section('headerContent','Modificar Sub Categoría')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$marca->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.marcas.updateSubCategoria',$marca],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <select class="form-control" name="subCategoria_id">
                            <option selected disabled value="">Seleccione</option>
                            @foreach($subCategorias as $subCategoria)
                                @if($marca->$subCategoria != null)
                                    @if($marca->subCategoria->id==$subCategoria->id)
                                        <option value="{{$subCategoria->id}}" selected="selected">{{$subCategoria->nombre}}</option>
                                    @else
                                        <option value="{{$subCategoria->id}}">{{$subCategoria->nombre}}</option>
                                    @endif
                                @else
                                    <option value="{{$subCategoria->id}}">{{$subCategoria->nombre}}</option>
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