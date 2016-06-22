@extends('plantillas.main.main')

@section('title','Inicio')
@section('titleComplement', 'Hola')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        @include('plantillas.templatesSections.header')
    @else
        @include('plantillas.templatesSections.headerGuest')
    @endif

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('headerContent','Header por defecto')
                <small>@yield('headerDescription','Descripcion por defecto')</small>
            </h1>
            <div class="row">
                <div class="col-md-8">
                    @include('plantillas.alertas.error')
                    @include('plantillas.alertas.alerta')
                </div>
                <div class="col-md-3"></div>
            </div>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('contentPage','Contenido por defecto')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!--include controlSidebar Buscar en templatessections-->
    @include('plantillas.user.sections.sidebarUser')
    @include('plantillas.templatesSections.footer')
@endsection
