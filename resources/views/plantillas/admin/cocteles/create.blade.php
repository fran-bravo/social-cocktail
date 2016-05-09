@extends('plantillas.admin.mainAdmin')
@section('title','Crear Coctel')
@section('titleComplement','Admin')
@section('headerContent','Registrar Coctel')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-5"><div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> 'admin.cocteles.store','method'=>'POST']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input id="nombre" value="{{Input::old('nombre')}}" type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon-glass form-control-feedback"></span>
                    </div>
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
                    <div class="form-group has-feedback">
                        <select name="cristal_id" class="form-control">
                            <option disabled selected value="">Cristalería</option>
                            @foreach($cristales as $crista)
                            <option value="{{$crista->id}}">{{$crista->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="preparacion" class="form-control" rows="3" placeholder="Explique detalladamente como preparar su coctel...">{{Input::old('preparacion')}}</textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="historia" class="form-control" rows="3" placeholder="Cuéntenos en que se inspiró o que lo llevo a crear este coctel... ">{{Input::old('historia')}}</textarea>
                    </div>
                    <h4>Mas adelante agregar los ingredientes</h4>
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