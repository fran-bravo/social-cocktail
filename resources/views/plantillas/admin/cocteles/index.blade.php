@extends('plantillas.admin.mainAdmin')
@section('aditionalCSS')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
@endsection
@section('title','Cocteles')
@section('titleComplement','Admin')
@section('headerContent','Cocteles Registrados')
@section('headerDescription','...')
@section('contentPage')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Cristalería Registradas</h3>
        </div>
        <div class="box-body">
            <table id="cristales" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Método</th>
                    <th>Cristalería</th>
                    <th>Autor</th>
                    <th>Tipo</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Método</th>
                    <th>Cristalería</th>
                    <th>Autor</th>
                    <th>Tipo</th>
                    <th>Accion</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($cocteles as $coctel)
                    <tr>
                        <td>{{$coctel->id}}</td>
                        <td>{{$coctel->nombre}}</td>
                        <td>{{$coctel->metodo}}</td>
                        <td>{{$coctel->cristal->nombre}}</td>
                        @if($coctel->usuario == null)
                            <td>Clásico</td>
                        @else
                        <td>{{$coctel->usuario}}</td>
                        @endif
                        <td>{{$coctel->tipo->nombre}}</td>
                        <td>
                            <div title="Cambiar Nombre" class="form-group">
                                <a class="btn btn-info btn-xs" href="{{route('admin.cocteles.edit',$coctel->id)}}">
                                    <i class="fa fa-glass"></i>
                                </a>
                            </div>
                            <div title="Cambiar Contenido" class="form-group">
                                <a class="btn btn-warning btn-xs" href="{{route('admin.cocteles.editContenido',$coctel->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div title="Eliminar Capacidad" class="form-group">
                                <a class="btn btn-danger btn-xs" href="{{route('admin.cocteles.destroy',$coctel->id)}}" onclick="return confirm('¿Esta seguro que desea eliminarla?')">
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
            $('#cristales').DataTable();
        } );
    </script>
@endsection
@endsection