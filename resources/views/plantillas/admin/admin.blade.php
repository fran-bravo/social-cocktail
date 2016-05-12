@extends('plantillas.admin.mainAdmin')
@section('title','Inicio')
@section('titleComplement','Admin')
@section('headerContent','Estadisticas generales')
@section('headerDescription','...')
@section('contentPage')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('admin.users.index')}}" class="small-box-footer">
                    Mas info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$categorias}}</h3>

                    <p>Categorias</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tags"></i>
                </div>
                <a href="{{route('admin.categorias.index')}}" class="small-box-footer">
                    Mas info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$marcas}}</h3>

                    <p>Marcas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-registered"></i>
                </div>
                <a href="{{route('admin.marcas.index')}}" class="small-box-footer">
                    Mas info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$cocteles}}</h3>

                    <p>Cocteles</p>
                </div>
                <div class="icon">
                    <i class="fa fa-glass"></i>
                </div>
                <a href="{{route('admin.cocteles.index')}}" class="small-box-footer">
                    Mas info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection