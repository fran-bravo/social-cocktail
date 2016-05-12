@extends('plantillas.admin.mainAdmin')
@section('title','Editar Contenido')
@section('titleComplement','Admin')
@section('headerContent','Editar Contenido')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$coctel->nombre}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.cocteles.updateContenido',$coctel],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <select name="metodo" class="form-control">
                            <option disabled selected value="">Método de preparación</option>
                            <option value="Batido">Batido</option>
                            <option value="Directo">Directo</option>
                            <option value="Flambeado">Flambeado</option>
                            <option value="Frozen">Frozzen</option>
                            <option value="Licuado">Licuado</option>
                            <option value="Refrescado">Refrescado</option>
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