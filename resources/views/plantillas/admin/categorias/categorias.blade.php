@extends('plantillas.admin.mainAdmin')
@section('aditionalCSS')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
@endsection
@section('title','Categorias')
@section('titleComplement','Admin')
@section('headerContent','Lista de Categorias')
@section('headerDescription','...')
@section('contentPage')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Categorias Registradas</h3>
        </div>
        <div class="box-body">
            <table id="categorias" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td>
                            <div title="Cambiar Nombre" class="form-group">
                                <a class="btn btn-info btn-xs" href="{{route('admin.categorias.editNombre',$categoria->id)}}">
                                    <i class="fa fa-tags"></i>
                                </a>
                            </div>
                            <div title="Cambiar Descripcion" class="form-group">
                                <a class="btn btn-warning btn-xs" href="{{route('admin.categorias.edit',$categoria->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>

                            <div title="Eliminar Categoria" class="form-group">
                                <a class="btn btn-danger btn-xs" href="{{route('admin.categorias.destroy',$categoria->id)}}" onclick="return confirm('¿Esta seguro que desea eliminarla?')">
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
            $('#categorias').DataTable();
        } );
    </script>
@endsection
@endsection