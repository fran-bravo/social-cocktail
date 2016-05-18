@extends('plantillas.user.sections.mainUser')
@section('title','Recetario')
@section('titleComplement','Social-Cocktail')
@section('headerContent','Cocteles Favoritos')
@section('headerDescription',' ')
@section('contentPage')
    <div class="row">
        <div class="col-md-6">
            <!-- SHOW COCTEL -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            Opciones  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Agregar a recetario</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Denunciar</a></li>
                            <li role="presentation" class="divider"></li>
                        </ul>
                    </li>

                    <li class="active"><a href="#tab_3-2" data-toggle="tab" aria-expanded="true">Info</a></li>

                    <li class="pull-left header"><i class="fa fa-glass"></i> Coctel</li>
                </ul>
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_3-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <a href="#"><h1 style="font-size: 17px;color: red">Cosmopolitan</h1></a>
                                </div>
                                <div class="form-group">
                                    <ul style="list-style:none;margin:0 0 0 0;padding:0 0 0 0;">
                                        <li><b>Autor: </b>Cocteleria Clasica</li>
                                        <li><b>Cristalería: </b>Copa Cocktail</li>
                                        <li><b>Método de preparación: </b>Batido</li>
                                        <li><b>Tipo: </b> Aperitivo</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div style="margin: auto">
                                        <img class="img-thumbnail" style="margin-top:3%" width="200px" src="http://www.loquenosabias.net/wp-content/uploads/2015/09/coctel-metropolitan-receta-y-preparacion.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-dollar "></i> Propina</button>
                                    <span class="pull-right text-muted"> Propina $ 127 - 3 comments</span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>

            <!-- SHOW COCTEL -->
        </div>
    </div>
@endsection