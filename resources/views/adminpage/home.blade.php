@extends('adminpage.app')
@section('menu')
	<div class="header_bg">
		<div class="container">
			<div class="row h_menu">
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand logo" href="#">
							<img alt="Brand" src="{{url('images/adminpage.png')}}">
						</a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Men&uacute</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<!--<li><img src="../../public/images/adminpage.png"></li>-->
							<li class="active"><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> La Parroquia <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Ministerios">Ministerios</a></li>
									<li><a href="Acerca">Acerca de la Parroquia</a></li>
									<li><a href="Boletin">Bolet&iacute;n Informativo</a></li>
								</ul>
							</li>
							<li><a href="ArchivoParroquial"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Archivo Parroquial</a></li>
							<li><a href="SalaOracion"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Sala de Oraci&oacute;n Perpetua</a></li>
							<li><a href="Usuarios"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right sesion">
							@if (Auth::guest())
							@else
								<li class="dropdown" style="text-align: right">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bienvenid@, {{ Auth::user()->name }} <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="{{url('')}}">Cambiar Contrase&ntildea</a></li>
										<li><a href="{{ url('auth/logout') }}">Salir</a></li>
									</ul>
								</li>
							@endif
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
@endsection
@section('content')
	<div class="container">
		<div id="wrapper">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<nav id="spy">
					<ul class="sidebar-nav nav">
						<li class="sidebar-brand">
							<a><span class="fa fa-home solo">Contenido</span></a>
						</li>
						<li>
							<a href="#"><span class="fa fa-anchor solo">Inicio</span></a>
						</li>
						<li>
							<a href="#LaParroquia" data-scroll>
								<span class="fa fa-anchor solo">La Parroquia</span>
							</a>
						</li>
						<li>
							<a href="#ArchivoParroquial" data-scroll>
								<span class="fa fa-anchor solo">Archivo Parroquial</span>
							</a>
						</li>
						<li>
							<a href="#SalaOracion" data-scroll>
								<span class="fa fa-anchor solo">Sala de Oraci&oacute;n Perpetua</span>
							</a>
						</li>
						<li>
							<a href="#Usuarios" data-scroll>
								<span class="fa fa-anchor solo">Usuarios</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

			<!-- Page content -->
			<div id="page-content-wrapper">
				<div class="page-content inset" data-spy="scroll" data-target="#spy">
					<div class="row">
						<div class="jumbotron text-center" id="home">
							<h2>Bienvenido a la P&aacute;gina de Administraci&oacute;n!</h2>
							<p>A continuaci&oacute;n se encuentra un sencillo manual que explica el funcionamiento de esta p&aacute;gina.</p>
						</div>

					</div>
					<div class="row">
						<div class="col-md-12 well">
							<legend id="">Sobre este manual</legend>
							<p style="text-align: justify">Este es un sencillo manual para que pueda solventar cualquier duda sobre el funcionamiento de la p&aacute;gina. Usted puede navegar atraves de este manual con la ayuda de la barra de contenidos ubicada en la parte izquierda de la pantalla, eliga el contenido sobre el cual requiera m&aacute;s informaci&oacute;n y se le mostrar&aacute; toda la infromaci&oacute;n disponible sobre ese tema.</p>
							<p></p>
						</div>
						<div class="col-md-12 well">
							<legend id="LaParroquia">La Parroquia</legend>
							<p>En esta secci&oacute;n Ud. podr&aacute; administrar la informaci&oacute;n respectiva a la parroquia, hay la posibilidad de configurar tres tipos de informaci&oacute;n parroquial: Informaci&oacute;n sobre ministerios parroquiales, Informaci&oacute;n sobre la parroquia y el parroco, y los boletines informativos.</p>
							<p></p>
							<h4>Informaci&oacute;n sobre Ministerios Parroquiales</h4>
							<p>Info aqui</p>
							<h4>Informaci&oacute;n sobre la Parroquia y el Parroco</h4>
							<p>Info aqui</p>
							<h4>Bolet&iacute;n Informativo</h4>
							<p>Info aqui</p>
						</div>
						<div class="col-md-12 well">
							<legend id="ArchivoParroquial">Archivo Parroquial</legend>
							<p>En esta secci&oacute;n Ud. podr&aacute; administrar el archivo parroquial, que contiene informaci&oacute; sobre los registros bautismales y matrimoniales que almacena la parroquia.</p>
							<p></p>
						</div>
						<div class="col-md-12 well">
							<legend id="SalaOracion">Sala de Oraci&oacute;n Perpetua</legend>
							<p>En esta secci&oacute;n Ud. podr&aacute; administrar el horario de la Sala de Oraci&oacute;n Perpetua, ademas de la disponibilidad de la sala y las reservas que hacen los feligreses para asistir a la sala.</p>
							<p></p>
						</div>
						<div class="col-md-12 well">
							<legend id="Usuarios">Usuarios</legend>
							<p>En esta secci&oacute;n Ud. podr&aacute; administrar los usuarios para el acceso a esta P&aacute;gina de Administraci&oacute;n; pude crear, eliminar usuarios y configurar la informaci&oacute;n de este usuarios.</p>
							<p></p>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
@endsection
