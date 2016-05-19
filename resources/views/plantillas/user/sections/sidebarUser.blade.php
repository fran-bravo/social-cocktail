@extends('plantillas.templatesSections.sidebar')
        @section('title','Opciones')
@section('links')
            <!-- Optionally, you can add icons to the links -->
    <li><a href="{{asset('/')}}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
    <li class="treeview">
            <a href="#"><i class="fa fa-glass"></i> <span>Cocteles</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{asset('/registrarcoctel')}}"><i class="fa fa-plus"></i>Registrar</a></li>
                <li><a href="{{asset('/recetas')}}"><i class="fa fa-list-alt"></i>Recetas</a></li>
                <li><a href="{{asset('/recetario')}}"><i class="fa fa-folder-open"></i>Recetario Personal</a></li>
            </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Manual</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-beer"></i>Bebidas con alcohol</a></li>
            <li><a href="#"><i class="fa fa-coffee"></i>Bebidas sin alcohol</a></li>
            <li><a href="#"><i class="fa fa-glass"></i>Cristalería</a></li>
            <li><a href="#"><i class="fa fa-map-pin"></i>Endulzantes</a></li>
            <li><a href="#"><i class="fa fa-leaf"></i>Especias y Hierbas aromáticas</a></li>
            <li><a href="#"><i class="fa fa-lemon-o"></i>Frutas</a></li>
            <li><a href="#"><i class="fa fa-fire"></i>Hortalizas</a></li>
            <li><a href="#"><i class="fa fa-pie-chart"></i>Lácteos</a></li>
            <li><a href="#"><i class="fa fa-registered"></i>Marcas</a></li>
        </ul>
    </li>
@endsection