@extends('plantillas.admin.admin')
@section('title','Editar Email')
@section('titleComplement','Admin')
@section('headerContent','Editar Email')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-8"><div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$user->name}} {{$user->lastName}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.users.updateEmail',$user],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{$user->email}}" id="InputEmai" type="email" class="form-control" name="email" placeholder="Email" required="required" maxlength="50">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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