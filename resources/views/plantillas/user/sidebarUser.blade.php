@extends('plantillas.templatesSections.sidebar')
        @section('title','Opciones')
@section('links')
            <!-- Optionally, you can add icons to the links -->
    <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-users"></i>Listar Usuario</a></li>
            <li><a href="#"><i class="fa fa-user-plus"></i>Crear Usuario</a></li>
            <li><a href="#"><i class="fa fa-wrench"></i>Modificar Usuario</a></li>
            <li><a href="#"><i class="fa fa-user-times"></i>Eliminar Usuario</a></li>

        </ul>
    </li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
@endsection