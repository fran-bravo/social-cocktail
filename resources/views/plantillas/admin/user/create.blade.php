@extends('plantillas.admin.mainAdmin')
@section('title', 'Crear usuario')
@section('titleComplement',' Admin')
@section('headerContent','Registrar usuario')
@section('headerDescription','Los campos con icono al final son obligatorios')
@section('contentPage')

<div class="row">
    <div class="col-md-5"><div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Complete el formulario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route'=> 'admin.users.store','method'=>'POST', 'id'=>'createUser']) !!}
            <div class="box-body">
                <div class="form-group has-feedback">
                    <input id="nombre" value="{{Input::old('name')}}" type="text" class="form-control" name="name" placeholder="Nombre" required="required" maxlength="40">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="apellido" value="{{Input::old('lastName')}}" type="text" class="form-control" name="lastName" placeholder="Apellido" required="required" maxlength="40">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="email" value="{{Input::old('email')}}" type="email" class="form-control" name="email" placeholder="Email" required="required" maxlength="50">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="required" maxlength="30">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="passwordConfirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar password" required="required" maxlength="30">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input value="{{Input::old('nacimiento')}}" type="date" name="nacimiento" class="form-control">
                    <span class="glyphicon glyphicon fa fa-birthday-cake form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control" name="tipoUsuario">
                        <option value="Usuario">Usuario</option>
                        <option value="Empresa">Empresa</option>
                        <option value="Admin">Adminisrtador</option>
                    </select>
                </div>

                <div class="form-group has-feedback">
                    <select class="form-control" name="pais_id" >
                        <option disabled selected value="">Paìs</option>
                        @foreach($paises as $pais)
                            <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <input id="provincia" value="{{Input::old('provincia')}}" type="text" class="form-control" name="provincia" placeholder="Provincia" maxlength="50">
                </div>
                <div class="form-group has-feedback">
                    <input id="localidad" value="{{Input::old('localidad')}}" type="text" class="form-control" name="localidad" placeholder="Localidad" maxlength="50">
                </div>
                <div class="form-group has-feedback">
                    <input id="codigoPostal" value="{{Input::old('codigoPostal')}}" type="text" class="form-control" name="codigoPostal" placeholder="Codigo Postal" maxlength="20">
                </div>
                <div class="form-group has-feedback">
                    <input id="domicilio" value="{{Input::old('domicilio')}}" type="text" class="form-control" name="domicilio" placeholder="Direccion" maxlength="50">
                </div>
                <div class="form-group has-feedback">
                    <input id="telefono" value="{{Input::old('telefono')}}" type="text" class="form-control" name="telefono" placeholder="Numero de contacto" maxlength="50">
                </div>
                <div class="form-group has-feedback">
                    <input id="cuit_cuil" value="{{Input::old('cuit_cuil')}}" type="text" class="form-control" name="cuit_cuil" placeholder="Cuit/Cuil" maxlength="50">
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="genero" id="optionsRadios1" value="Masculino" checked="">
                            Masculino
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="genero" id="optionsRadios2" value="Femenino">
                            Femenino
                        </label>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="form-group">
                <input checked id="terms" name="terms" type="checkbox">
                I agree to the
                <a href="#">terms</a>
                <span name="message" class="help-block"></span>
            </div>

            <div class="box-footer">
                <button id="crearUser" type="submit" class="btn btn-primary">Crear</button>
            </div>

            {!! Form::close() !!}

        </div></div>
    <div class="col-md-4"></div>
</div>
@endsection