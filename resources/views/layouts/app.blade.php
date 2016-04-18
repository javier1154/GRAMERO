<!DOCTYPE html>
<html lang="es  ">
<head>

    <title>GRAMERO</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    
    <link href="{!! asset('plugins/plantilla/vendor/bootstrap/css/bootstrap.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/plantilla/vendor/fontawesome/css/font-awesome.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/plantilla/vendor/themify-icons/themify-icons.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/plantilla/vendor/animate.css/animate.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/plantilla/vendor/perfect-scrollbar/perfect-scrollbar.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/plantilla/vendor/switchery/switchery.min.css'); !!}" rel="stylesheet">

    <link href="{!! asset('plugins/plantilla/assets/css/styles.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/plantilla/assets/css/plugins.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/plantilla/vendor/fontawesome/css/themes/theme-1.css'); !!}" rel="stylesheet" id="skin_color">
    
    @yield('css')

</head>

<body>


    <div id="app">

        @yield('content')

    </div>

    <script src="{!! asset('plugins/plantilla/vendor/jquery/jquery.min.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/bootstrap/js/bootstrap.min.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/modernizr/modernizr.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/jquery-cookie/jquery.cookie.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/perfect-scrollbar/perfect-scrollbar.min.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/switchery/switchery.min.js'); !!}"></script>

    <script src="{!! asset('plugins/plantilla/vendor/Chart.js/Chart.min.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/jquery.sparkline/jquery.sparkline.min.js'); !!}"></script>

    <script src="{!! asset('plugins/plantilla/assets/js/main.js'); !!}"></script>

    <script src="{!! asset('plugins/plantilla/assets/js/index.js'); !!}"></script>
    
    @yield('script')

</body>
</html>
