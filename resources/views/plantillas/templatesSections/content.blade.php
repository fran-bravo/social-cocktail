<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('headerContent','Header por defecto')
            <small>@yield('headerDescription','Descripcion por defecto')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content','Contenido por defecto')
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
