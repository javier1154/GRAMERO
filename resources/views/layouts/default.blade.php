<!DOCTYPE html>
<html>
  
  <head>
    <title>
      @section('title')
      @show
    </title>
    <!-- start: META -->
    <!--[if IE]>
      <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"
      />
    <![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description">
    <meta content="" name="author">
    <!-- end: META -->
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css">
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="{!! asset('plugins/plantilla/vendor/bootstrap/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!! asset('plugins/plantilla/vendor/fontawesome/css/font-awesome.min.css')!!}">
    <link rel="stylesheet" href="{!! asset('plugins/plantilla/vendor/themify-icons/themify-icons.min.css')!!}">
    <link href="{!! asset('plugins/plantilla/vendor/animate.css/animate.min.css')!!}" rel="stylesheet"
    media="screen">
    <link href="{!! asset('plugins/plantilla/vendor/perfect-scrollbar/perfect-scrollbar.min.css')!!}"
    rel="stylesheet" media="screen">

     <link href="{!! asset('plugins/plantilla/vendor/switchery/switchery.min.css')!!}" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="{!! asset('plugins/plantilla/css/styles.css')!!}">
    <link rel="stylesheet" href="{!! asset('plugins/plantilla/css/plugins.css')!!}">
    <link rel="stylesheet" href="{!! asset('plugins/plantilla/css/themes/theme-1.css')!!}" id="skin_color">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    @section('css')
    @show
  </head>
  
  <body>
    <div id="app">
      <!-- sidebar -->
       	@include('layouts.main_menu')
      <!-- / sidebar -->
      <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <header class="navbar navbar-default navbar-static-top">
          <!-- start: NAVBAR HEADER -->

          <div class="navbar-header">
            <a class="site-brand" href="#" align="center">
            
            </a>
            <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg"
            data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">



							<i class="ti-align-justify"></i>



						</a>
            <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed"
            data-toggle-target="#app">



							<i class="ti-align-justify"></i>



						</a>
            <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler"
            data-toggle="collapse" href=".navbar-collapse">



							<span class="sr-only">Toggle navigation</span>



							<i class="ti-view-grid"></i>



						</a>
          </div>
          <!-- end: NAVBAR HEADER -->
          <!-- start: NAVBAR COLLAPSE -->
          <div class="navbar-collapse collapse">
            <h2>
              @section('pagina') 
              	Proyecto
              @show
            </h2>
            <ul class="nav navbar-right"></ul>
            <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
            <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse"
            href=".navbar-collapse">
              <div class="arrow-left"></div>
              <div class="arrow-right"></div>
            </div>


            <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
          </div>
          <a class="dropdown-off-sidebar" data-toggle-class="app-offsidebar-open"
          data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">



						&nbsp;



					</a>
          <!-- end: NAVBAR COLLAPSE -->
        </header>
        <!-- end: TOP NAVBAR -->
        <div class="main-content">
          <div class="wrap-content container" id="container">
          	 <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <div class="col-md-11">
          			 @section('contenido')
          			 @show
          		</div>
          	  </div>
          	</div>
          </div>
           
        </div>
      </div>

      <!-- start: FOOTER -->
      <footer>
        <div class="footer-inner">
          <div class="pull-left">©
            <span class="current-year"></span>
            <span class="text-bold text-uppercase">Gramero</span>.
            <span>All rights reserved</span>
          </div>
          <div class="pull-right">
            <span class="go-top">
              <i class="ti-angle-up"></i>
            </span>
          </div>
        </div>
      </footer>
      <!-- end: FOOTER -->
      <!-- start: OFF-SIDEBAR -->
         <!--##################
         	 ##################
         	 ##################-->
         			@include('layouts.offcanvas_menu');
    	<!--	###################
    		###################
    		###################
    	-->
    <!-- end: OFF-SIDEBAR -->
    <!-- start: SETTINGS -->
    		@include("layouts.configuracion")
    <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="{!! asset('plugins/plantilla/vendor/jquery/jquery.min.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/bootstrap/js/bootstrap.min.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/modernizr/modernizr.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/jquery-cookie/jquery.cookie.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/perfect-scrollbar/perfect-scrollbar.min.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/switchery/switchery.min.js')!!}"></script>
    
    <script src="{!! asset('plugins/plantilla/vendor/Chart.js/Chart.min.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/jquery.sparkline/jquery.sparkline.min.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/js/main.js')!!}"></script>
    <script src="{!! asset('plugins/plantilla/js/index.js')!!}"></script>

    @section('js')
    @show
    <!-- start: JavaScript Event Handlers for this page -->
    <script>
      jQuery(document).ready(function() {
         Main.init();
        Index.init();
      });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->

  </body>

</html>