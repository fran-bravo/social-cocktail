@extends('plantillas.main.main')

@section('title','Login')
@section('titleComplement', 'Hola')

@section('content')



        <div class="login-box">
            <div class="login-logo">
                <a href="{{asset('/')}}"><b>S</b>CT</a>
            </div>
            @include('plantillas.alertas.error')
            @include('plantillas.alertas.alerta')
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                {!! Form::open(['route'=> 'user.login','method'=>'POST', 'id'=>'loginForm']) !!}
                <div class="form-group has-feedback">
                    <div class="form-group has-feedback">
                        <input value="{{Input::old('email')}}" id="email" name="email" type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span name="message" class="help-block"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <input name="remember" type="checkbox">
                            Remember Me
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <div id="load"></div>
                            <button id="loginBtn" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                        Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                        Google+</a>
                </div>
                <!-- /.social-auth-links -->

                <a href="#">I forgot my password</a><br>
                <a href="{{asset('/registro')}}" class="text-center">Register a new membership</a>

            </div>
            <!-- /.login-box-body -->
        </div>


@endsection
