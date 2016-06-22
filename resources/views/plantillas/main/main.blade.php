<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="shortcut icon"  href="{{asset('ico/favicon.ico')}}">
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.5 -->
            <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
            <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                  page. However, you can choose any other skin. Make sure you
                  apply the skin class to the body tag so the changes take effect.
            -->
            <link rel="stylesheet" href="{{asset('dist/css/skins/skin-red.min.css')}}">
            @yield('aditionalCSS')
            <title>@yield('title','Main') | @yield('titleComplement','Complement')</title>
        </head>
        <body id="body" class="skin-red sidebar-mini">
             <div class="wrapper">
            @yield('content')

             </div><!-- ./wrapper -->
             <script async="" src="//www.google-analytics.com/analytics.js"></script>
            <!-- jQuery 2.1.4 -->
            <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
            <!-- Bootstrap 3.3.5 -->
            <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
             <!-- jquery personal-->
             <script src="{{asset('dist/js/jquery/jquery.js')}}"></script>
            <!-- FastClick -->
            <script src="{{asset('/plugins/fastclick/fastclick.js')}}"></script>
            <!-- AdminLTE App -->
            <script src="{{asset('dist/js/app.min.js')}}"></script>
             <!-- Jquery Validation -->
             <script src="{{asset('/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
             <script src="{{asset('/plugins/jquery-validation/dist/additional-methods.min.js')}}"></script>
            <!-- Slimscroll -->
            <script src="{{asset('/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="{{asset('/dist/js/demo.js')}}"></script>
        @yield('aditionalSCRIPT')
        </body>
    </html>