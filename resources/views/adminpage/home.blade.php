@extends('adminpage.app')
@section('menu')
	<div class="header_bg">
		<div class="container">
			<div class="row h_menu">
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
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
							<li><img src="../public/images/adminpage.png"></li>
							<li class="active"><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> La Parroquia <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="adminpage/Ministerios">Ministerios</a></li>
									<li><a href="#">Acerca de la Parroquia</a></li>
									<li><a href="#">Contactos</a></li>
									<li><a href="#">Noticias</a></li>
									<li><a href="#">Eventos</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Servicios Online<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="adminpage/Certificados">Certificados</a></li>
									<li><a href="#">Reservas Sala de Oracion</a></li>
								</ul>
							</li>
							<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							@if (Auth::guest())
							@else
								<li class="dropdown" style="text-align: right">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
									<ul class="dropdown-menu media-right" role="menu">
										<li><a href="#">Cambiar Contrase&ntildea</a></li>
										<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
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
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="#">Home</a></li>
		<li role="presentation"><a href="#">Profile</a></li>
		<li role="presentation"><a href="#">Messages</a></li>
	</ul>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Agregar archivos</div>
				<div class="panel-body">
					<form method="POST" action="http://diamond-chaos.codio.io:3000/tuto/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">

						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nuevo Archivo</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="file" >
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
