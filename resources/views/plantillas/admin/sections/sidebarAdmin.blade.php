@extends('plantillas.templatesSections.sidebar')
        @section('titleSidebar','Admin Panel')
@section('links')
            <!-- Optionally, you can add icons to the links -->
    <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>Usuario</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{asset('admin/users')}}"><i class="fa fa-users"></i>Listar Usuarios</a></li>
            <li><a href="{{asset('admin/users/create')}}"><i class="fa fa-user-plus"></i>Crear Usuario</a></li>
            <li><a href="#"><i class="fa fa-wrench"></i>Suspenso...</a></li>
            <li><a href="#"><i class="fa fa-user-times"></i>Suspenso...</a></li>

        </ul>
    </li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
@endsection