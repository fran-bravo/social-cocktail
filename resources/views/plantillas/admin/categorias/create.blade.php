@extends('plantillas.admin.admin')
@section('title','Crear categoria')
@section('titleComplement','Admin')
@section('headerContent','Registrar Categoria')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-md-8"><div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Complete el formulario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=> 'admin.categorias.store','method'=>'POST']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <input value="{{Input::old('name')}}" type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" maxlength="40">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                    <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripcion"></textarea>
                    </div>
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
@section('aditionalSCRIPT')
        <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
        });
    </script>
@endsection
@section('aditionalCSS')
@endsection