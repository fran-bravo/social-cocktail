<?php
/**
 * Created by PhpStorm.
 * user: Uriel
 * Date: 5/4/16
 * Time: 1:40 PM
 */?>
        <!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{asset('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>CT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Social</b>Cocktail</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="{{asset('/login')}}">Iniciar sesion</a></li>
                <li><a id="logout" href="{{asset('/registro')}}">Registrarse</a></li>
            </ul>
        </div>
    </nav>
</header>
