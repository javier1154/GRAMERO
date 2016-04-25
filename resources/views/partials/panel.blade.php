@extends('layouts.app')

@section('content')

<!-- sidebar -->
<div class="sidebar app-aside" id="sidebar">
	<div class="sidebar-container perfect-scrollbar">
		<nav>
	
			<!-- start: MAIN NAVIGATION MENU -->
			<div class="navbar-title">
				<span>Menú de Navegación</span>
			</div>
			<ul class="main-navigation-menu">
				<li>
					<a href="{{ url('/home') }}">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-home"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Inicio </span>
							</div>
						</div>
					</a>
				</li>
				
				<li>
					<a href="{!! route('inventarios.index') !!}">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Inventario </span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="{!! route('items.index') !!}">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Items </span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="#!">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Productos </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#!">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Compras </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="{!! route('proveedores.index') !!}">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Proveedores </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#!">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Reportes Financieros </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#!">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Caja </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="{!! route('usuarios.index') !!}">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Usuarios </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="{!! route('configuraciones.index') !!}">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-location-pin"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Configuraciones </span>
							</div>
						</div>
					</a>
				</li>

			</ul>
			<!-- end: MAIN NAVIGATION MENU -->
			
		</nav>
	</div>
</div>
<!-- / sidebar -->



<div class="app-content">
	<!-- start: TOP NAVBAR -->
	<header class="navbar navbar-default navbar-static-top">
		<!-- start: NAVBAR HEADER -->
		<div class="navbar-header">
			<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
				<i class="ti-align-justify"></i>
			</a>

			<a class="navbar-brand" href="#">
				<!--<img src="assets/images/logo.png" alt="Clip-Two"/>-->
				{{$conf->empresa}}
			</a>

			<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
				<i class="ti-align-justify"></i>
			</a>
			<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="ti-view-grid"></i>
			</a>
		</div>
		<!-- end: NAVBAR HEADER -->
		<!-- start: NAVBAR COLLAPSE -->
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-right">
				<!-- start: USER OPTIONS DROPDOWN -->
				

				<li class="dropdown">
					<a href class="dropdown-toggle" data-toggle="dropdown">
						<i class="ti-world"></i> {{ Auth::user()->name}}
					</a>
					<ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">
						<li>
							<a href="{{ url('/logout') }}">
								Salir
							</a>
						</li>
					</ul>
				</li>
				<!-- end: USER OPTIONS DROPDOWN -->
			</ul>
			
		</div>
		
		<!-- end: NAVBAR COLLAPSE -->
	</header>
	<!-- end: TOP NAVBAR -->
	<div class="main-content" >

		<div class="wrap-content container" id="container">
			
			<section id="page-title" class="padding-top-15 padding-bottom-15">
		        <div class="row">
		            <div class="col-sm-12">
		                <h1 class="mainTitle"> @yield('titulo') </h1>
		            </div>
		        </div>
		    </section>

			@yield('contenido')

		</div>
	</div>
	
</div>


@endsection