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
            <!-- CSS personal-->
            <link rel="stylesheet" href="{{asset('dist/css/personal.css')}}">
            <!-- FancyBox -->
            <link rel="stylesheet" href="{{asset('dist/fancybox/source/jquery.fancybox.css?v=2.1.5')}}" type="text/css" media="screen" />
            <!-- Optionally add helpers - button, thumbnail and/or media -->
            <link rel="stylesheet" href="{{asset('dist//fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')}}" type="text/css" media="screen" />
            <link rel="stylesheet" href="{{asset('dist/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7')}}" type="text/css" media="screen" />
            <!-- JCrop -->
            <link rel="stylesheet" href="http://jcrop-cdn.tapmodo.com/v2.0.0-RC1/css/Jcrop.css" type="text/css">
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
             <!-- FancyBox -->
                     <!-- Add mousewheel plugin (this is optional) -->
                     <script type="text/javascript" src="{{asset('dist/fancybox/lib/jquery.mousewheel-3.0.6.pack.js')}}"></script>
                     <!-- Add FancyBox-->
                     <script type="text/javascript" src="{{asset('dist/fancybox/source/jquery.fancybox.pack.js?v=2.1.5')}}"></script>
                     <!-- Optionally add helpers - button, thumbnail and/or media -->
                     <script type="text/javascript" src="{{asset('dist/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}"></script>
                     <script type="text/javascript" src="{{asset('dist/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6')}}"></script>
                    <script type="text/javascript" src="{{asset('dist/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7')}}"></script>

            <!--Boostrap FileStyle -->
             <script type="text/javascript" src="{{asset('dist/js/bootstrap-filestyle.js')}}"> </script>
             <!-- Jquery UI -->
             <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
             <!-- JCrop -->
             <script src="http://jcrop-cdn.tapmodo.com/v2.0.0-RC1/js/Jcrop.js"></script>
             @yield('aditionalSCRIPT')
        </body>
    </html>