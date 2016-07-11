@extends('plantillas.admin.mainAdmin')
@section('title','Editar')
@section('titleComplement','Admin')
@section('headerContent','Editar usuario')
@section('headerDescription','Modifique los campos que sean necesarios')
@section('contentPage')
    <div class="row">
        <div class="col-md-8"><div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> ['admin.users.update',$user],'method'=>'PUT']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{$user->name}}" type="text" class="form-control" name="name" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input value="{{$user->lastName}}" type="text" class="form-control" name="lastName" placeholder="Apellido" required="required" maxlength="40">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="tipoUsuario">
                            @if($user->tipoUsuario == 'Usuario')
                                <option selected="selected" value="Usuario">Usuario</option>
                                <option value="Empresa">Empresa</option>
                                <option value="Admin">Adminisrtador</option>
                            @elseif($user->tipoUsuario=='Empresa')
                                <option value="Usuario">Usuario</option>
                                <option selected="selected" value="Empresa">Empresa</option>
                                <option value="Admin">Adminisrtador</option>
                            @else
                                <option value="Usuario">Usuario</option>
                                <option value="Empresa">Empresa</option>
                                <option selected="selected" value="Admin">Adminisrtador</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="pais_id" >
                            @foreach($paises as $pais)
                                @if($pais->id==$user->pais_id)
                                    <option selected value="{{$pais->id}}">{{$pais->nombre}}</option>
                                @else
                                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <input value="{{$user->provincia}}" type="text" class="form-control" name="provincia" placeholder="Provincia" maxlength="50">
                    </div>
                    <div class="form-group has-feedback">
                        <input value="{{$user->localidad}}" type="text" class="form-control" name="localidad" placeholder="Localidad" maxlength="50">
                    </div>
                    <div class="form-group has-feedback">
                        <input value="{{$user->codigoPostal}}" type="text" class="form-control" name="codigoPostal" placeholder="Codigo Postal" maxlength="20">
                    </div>
                    <div class="form-group has-feedback">
                        <input value="{{$user->domicilio}}" type="text" class="form-control" name="domicilio" placeholder="Direccion" maxlength="50">
                    </div>
                    <div class="form-group has-feedback">
                        <input value="{{$user->telefono}}" type="text" class="form-control" name="telefono" placeholder="Numero de contacto" maxlength="50">
                    </div>
                    <div class="form-group has-feedback">
                        <input value="{{$user->cuit_cuil}}" type="text" class="form-control" name="cuit_cuil" placeholder="Cuit/Cuil" maxlength="50">
                    </div>
                    @if($user->genero == 'Masculino')
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
                    @else
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="genero" id="optionsRadios1" value="Masculino">
                                    Masculino
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="genero" id="optionsRadios2" value="Femenino" checked="" >
                                    Femenino
                                </label>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Nacimiento</label>
                        <input value="{{$user->nacimiento}}" type="date" name="nacimiento" class="form-control">
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