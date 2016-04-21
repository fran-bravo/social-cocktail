@extends('plantillas.admin.mainAdmin')
@section('aditionalCSS')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
@endsection
@section('title','Marcas')
@section('titleComplement','Admin')
@section('headerContent','Marcas Registradas')
@section('headerDescription','...')
@section('contentPage')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">SubCategorias Registradas</h3>
        </div>
        <div class="box-body">
            <table id="marcas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Accion</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($marcas as $marca)
                    <tr>
                        <td>{{$marca->id}}</td>
                        <td>{{$marca->nombre}}</td>
                        <td>
                            <div title="Cambiar Nombre" class="form-group">
                                <a class="btn btn-info btn-xs" href="{{route('admin.marcas.edit',$marca->id)}}">
                                    <i class="fa fa-registered"></i>
                                </a>
                            </div>
                            <div title="Cambiar descripcion" class="form-group">
                                <a class="btn btn-warning btn-xs" href="{{route('admin.marcas.edit',$marca->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div title="Eliminar Marca" class="form-group">
                                <a class="btn btn-danger btn-xs" href="{{route('admin.marcas.editDescripcion',$marca->id)}}" onclick="return confirm('¿Esta seguro que desea eliminarla?')">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </div>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@section('aditionalSCRIPT')
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#marcas').DataTable();
        } );
    </script>
@endsection
@endsection