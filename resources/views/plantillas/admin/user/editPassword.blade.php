@extends('plantillas.admin.mainAdmin')
@section('title','Cambiar password')
@section('titleComplement','admin')
@section('headerContent','Cambiar password')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-8"><div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$user->name}} {{$user->lastName}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.users.updatePassword',$user],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Nueva Password" required="required" maxlength="30">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar password" required="required" maxlength="30">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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