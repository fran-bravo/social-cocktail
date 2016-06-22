@extends('plantillas.main.main')

@section('title','Registro')
@section('titleComplement', 'Hola')

@section('content')
    <div class="register-box">

        <div class="register-logo">
            <a href="{{asset('/')}}"><b>S</b>CT</a>
        </div>
        @include('plantillas.alertas.error')
        @include('plantillas.alertas.alerta')
        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            {!! Form::open(['route'=> 'user.registro','method'=>'POST', 'id'=>'createUserByUser']) !!}
                <div class="form-group has-feedback">
                    <input id="name" value="{{Input::old('name')}}" type="text" class="form-control" name="name" placeholder="Nombre" maxlength="40">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span name="message" class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="lastName" value="{{Input::old('lastName')}}" type="text" class="form-control" name="lastName" placeholder="Apellido" maxlength="40">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span name="message" class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="email" value="{{Input::old('email')}}" type="email" class="form-control" name="email" placeholder="Email" maxlength="50">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span name="message" class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" maxlength="30">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span name="message" class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar password" maxlength="30">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span name="message" class="help-block"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <input id="terms" name="terms" type="checkbox">
                        I agree to the
                        <a href="#">terms</a>
                        <span name="message" class="help-block"></span>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <div id="load"></div>
                        <button id="registrarUser" type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            {!! Form::close() !!}

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
            </div>

            <a href="{{asset('/login')}}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

@endsection
