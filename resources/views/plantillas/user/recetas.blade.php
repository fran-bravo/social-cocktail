@extends('plantillas.user.sections.mainUser')
@section('title','Recetas')
@section('titleComplement','Social-Cocktail')
@section('headerContent','Recetas de cocteles')
@section('headerDescription',' ')
@section('contentPage')
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>

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
        <div class="col-md-4">
            <!-- LOS MAS NUEVOS -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Los nuevos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img width="50px" src="http://www.loquenosabias.net/wp-content/uploads/2015/09/coctel-metropolitan-receta-y-preparacion.jpg" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Cosmopolitan</a>
                        <span class="product-description">
                          <b>Autor: </b>cocteleria Clasica.
                            <b>Tipo: </b>Aperitivo.

                        </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- LOS MAS NUEVOS -->

            <!-- LOS MAS COTIZADOS-->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Los más cotizados</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img width="50px" src="http://www.loquenosabias.net/wp-content/uploads/2015/09/coctel-metropolitan-receta-y-preparacion.jpg" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Cosmopolitan
                                    <span class="label label-danger pull-right">$1800</span></a>
                        <span class="product-description">
                          <b>Autor: </b>cocteleria Clasica.
                            <b>Tipo: </b>Aperitivo.

                        </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- LOS MAS COTIZADOS-->

            <!-- LOS MAS COTIZADOS-->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Los más recurridos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img width="50px" src="http://www.loquenosabias.net/wp-content/uploads/2015/09/coctel-metropolitan-receta-y-preparacion.jpg" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Cosmopolitan
                                    <span class="label label-primary pull-right">14345</span></a>
                        <span class="product-description">
                          <b>Autor: </b>cocteleria Clasica.
                            <b>Tipo: </b>Aperitivo.

                        </span>
                            </div>
                        </li>
                        <!-- /.item -->

                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- LOS MAS COTIZADOS-->
        </div>
        <div class="col-md-2">

        </div>
    </div>

@endsection