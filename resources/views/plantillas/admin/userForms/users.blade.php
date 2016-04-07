@extends('plantillas.admin.admin')
@section('aditionalCSS')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
@endsection
@section('title','Usuarios')
@section('titleComplement','Admin')
@section('headerContent','Usuarios registrados')
@section('headerDescription','...')
@section('contentPage')
    <table id="users" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Tipo Usuario</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Tipo Usuario</th>
            <th>Accion</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->tipoUsuario=='Administrador')
                    <small class="label pull-right bg-green">{{$user->tipoUsuario}}</small>
                @elseif($user->tipoUsuario=='Empresa')
                <small class="label pull-right bg-blue">{{$user->tipoUsuario}}</small>
                @else
                <small class="label pull-right bg-orange">{{$user->tipoUsuario}}</small>
                @endif
            </td>
            <td>
                <div title="Editar Usuario" class="form-group">
                    <a class="btn btn-warning btn-xs" href="{{route('admin.users.edit',$user->id)}}">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
                <div title="Editar Email" class="form-group">
                    <a class="btn btn-info btn-xs" href="">
                        <i class="fa fa-at"></i>
                    </a>
                </div>
                <div title="Cambiar password" class="form-group">
                    <a class="btn btn-success btn-xs" href="">
                        <i class="fa fa-lock"></i>
                    </a>
                </div>
                <div title="Enviar mensaje" class="form-group">
                    <a class="btn btn-default btn-xs" href="">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
                <div title="Eliminar Usuario" class="form-group">
                    <a class="btn btn-danger btn-xs" href="{{route('admin.users.destroy',$user->id)}}" onclick="return confirm('¿Esta seguro que desea eliminarlo?')">
                        <i class="fa fa-user-times"></i>
                    </a>
                </div>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @section('aditionalSCRIPT')
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#users').DataTable();
            } );
        </script>
    @endsection
@endsection