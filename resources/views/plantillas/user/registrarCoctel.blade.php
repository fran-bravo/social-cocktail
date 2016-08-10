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

    <!-- Popup -->
    <div class="modal fade" id="popupNuevaAventura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Seleccione el area</h4>
                </div>
                <div id="nuevaAventura" class="modal-body">
                    <div id="divCImg">
                        <p>Primero cargue una imagen para previsualizarla</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancelarPopup" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="aceptarPopup">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup -->




    <div class="row">
        <div class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> 'user.coctel.store','method'=>'POST', 'files'=>true, 'id'=>'formCreateCoctel']) !!}
                <input type="hidden" name="cropx" id="cropx" value="0" />
                <input type="hidden" name="cropy" id="cropy" value="0" />
                <input type="hidden" name="cropw" id="cropw" value="150" />
                <input type="hidden" name="croph" id="croph" value="150" />
                <input type="hidden" name="height" id="height" value="760" />
                <input type="hidden" name="width" id="width" value="570" />
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <input id="nombre" value="{{Input::old('nombre')}}" type="text" class="form-control" name="nombre" placeholder="Nombre" maxlength="40">
                                <span class="glyphicon glyphicon-glass form-control-feedback"></span>
                                <span name="message" id="messageNombre" class="help-block"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <select id="metodo" name="metodo" class="form-control">
                                    <option disabled selected value="">Método de preparación</option>
                                    <option value="Batido">Batido</option>
                                    <option value="Directo">Directo</option>
                                    <option value="Flambeado">Flambeado</option>
                                    <option value="Frozen">Frozzen</option>
                                    <option value="Licuado">Licuado</option>
                                    <option value="Refrescado">Refrescado</option>
                                </select>
                                <span name="message" id="messageMetodo" class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <select id="tipoCoctel" name="tipococtel_id" class="form-control">
                                    <option disabled selected value="">Tipo de coctel</option>
                                    @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                    @endforeach
                                </select>
                                <span name="message" id="messageTipo" class="help-block"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <select id="cristal" name="cristal_id" class="form-control">
                                    <option disabled selected value="">Cristalería</option>
                                    @foreach($cristaleria as $cristal)
                                        <option value="{{$cristal->id}}">{{$cristal->nombre}}</option>
                                    @endforeach
                                </select>
                                <span name="message" id="messageCristal" class="help-block"></span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <textarea id="preparacion" name="preparacion" class="form-control" rows="3" placeholder="Explique detalladamente como preparar su coctel...">{{Input::old('preparacion')}}</textarea>
                        <span name="message" id="messagePreparacion" class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <textarea id="historia" name="historia" class="form-control" rows="3" placeholder="Cuéntenos en que se inspiró o que lo llevo a crear este coctel... ">{{Input::old('historia')}}</textarea>
                        <span name="message" id="messageHistoria" class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <h4>Ingrese una foto de su coctel</h4>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input data-toggle="modal" data-target="#popupNuevaAventura" name="file" id="imagen" type="file" accept=".jpeg,.png,.bmp,.gif,.svg">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input data-toggle="modal" data-target="#popupNuevaAventura" type="button" class="btn btn-danger" value="Seleccionar area">
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
                    <div  id="messageIngredients" class="form-group">

                    </div>
                    <div class="form-group">
                        <div id="ingredientes"></div>
                        <span name="message" class="help-block"></span>
                    </div>
                    <!-- /.box-body -->
                    <div class="col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                        <div class="box-footer">
                            <button id="crearCoctel" type="submit" class="btn btn-success">Crear</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
@endsection