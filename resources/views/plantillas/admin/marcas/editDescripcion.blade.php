@extends('plantillas.admin.mainAdmin')
@section('title','Editar descripcion')
@section('titleComplement','Admin')
@section('headerContent','Editar descripcion')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-8"><div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$marca->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.marcas.updateDescripcion',$marca],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <textarea  name="descripcion" class="form-control" rows="10" placeholder="Descripcion">{{$marca->descripcion}}</textarea>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="supermarca_id" id="supermarca_id">
                            <option selected disabled value="" >Seleccione una Super Marca</option>
                            @foreach($marcas as $marcas)
                                @if($marca->superMarca==$marcas)
                                    <option selected value="{{$marcas->id}}">{{$marcas->nombre}}</option>
                                @else
                                    <option value="{{$marcas->id}}">{{$marcas->nombre}}</option>
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