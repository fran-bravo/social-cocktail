@extends('plantillas.user.sections.mainUser')
@section('title','Registrar Coctel')
@section('titleComplement','Social-Cocktail')
@section('headerContent','Registrar Coctel')
@section('headerDescription',' ')
@section('aditionalCSS')
        <!-- Personal CSS -->
<link rel="stylesheet" href="{{asset('dist/css/sct.css')}}">
@endsection
@section('contentPage')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> 'user.coctel.store','method'=>'POST', 'files'=>true]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <select name="tipococtel_id" class="form-control">
                                    <option disabled selected value="">Tipo de coctel</option>
                                    @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <select name="cristal_id" class="form-control">
                                    <option disabled selected value="">Cristalería</option>
                                    @foreach($cristaleria as $cristal)
                                        <option value="{{$cristal->id}}">{{$cristal->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <textarea name="preparacion" class="form-control" rows="3" placeholder="Explique detalladamente como preparar su coctel...">{{Input::old('preparacion')}}</textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="historia" class="form-control" rows="3" placeholder="Cuéntenos en que se inspiró o que lo llevo a crear este coctel... ">{{Input::old('historia')}}</textarea>
                    </div>
                    <div class="form-group">
                        <h4>Ingrese una foto de su coctel</h4>
                    </div>
                    <div class="form-group">
                        <input name="imagen" id="imagen" type="file" accept=".jpeg,.png,.bmp,.gif,.svg">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6"><h4>Ingredientes</h4></div>
                            <div class="col-md-6"><div id="load"></div></div>
                        </div>


                    </div>

                    <div class="form-group">
                        <table id="tbIngredientes" class="table table-striped">
                            <tbody>
                            <tr>

                                <th>Categoría</th>
                                <th>Sub Categoría</th>
                                <th>Marca</th>
                                <th width="12%">Cant.</th>
                                <th>Unidad</th>
                                <th>Accion</th>
                            </tr>

                            <tr id="selectores" style="background-color: transparent">

                                <td id="tdCategorias">
                                    <select class="form-control" id="categoria_id">
                                        <option id="categoriaDefault" value="" disabled selected>Seleccione</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select disabled class="form-control" id="subCategoria_id">
                                    </select>
                                </td>
                                <td>
                                    <select disabled class="form-control" id="marca_id">
                                    </select>
                                </td>
                                <td>
                                    <input disabled class="form-control" id="cantidad">
                                </td>
                                <td>
                                    <select disabled class="form-control" id="unidadMedida">
                                    </select>
                                </td>
                                <td>
                                    <div class="form-control" style="border-color: transparent; width: 100%;background-color: transparent">
                                        <button id="addIngrediente" type="button" class="btn btn-block btn-success btn-xs">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="messageIngredients" class="form-group">

                    </div>
                    <!-- /.box-body -->
                    <div class="col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
@endsection