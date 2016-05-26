@extends('adminpage.app')
@section('menu')
	<div class="header_bg">
		<div class="container">
			<div class="row h_menu">
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand logo" href="{{url('adminpage/Inicio')}}">
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
							<li><a href="{{url('adminpage/Inicio')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> La Parroquia <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{url('adminpage/Ministerios')}}">Ministerios</a></li>
									<li><a href="{{url('adminpage/Acerca')}}">Acerca de la Parroquia</a></li>
									<li><a href="{{url('adminpage/Boletin')}}">Bolet&iacute;n Informativo</a></li>
								</ul>
							</li>
							<li><a href="{{url('adminpage/ArchivoParroquial')}}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Archivo Parroquial</a></li>
							<li><a href="{{url('adminpage/SalaOracion')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Sala de Oraci&oacute;n Perpetua</a></li>
							<li class="active"><a href="{{url('adminpage/Usuarios')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right sesion">
							@if (Auth::guest())
							@else
								<li class="dropdown" style="text-align: right">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bienvenid@, {{ Auth::user()->name }} <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="{{url()}}">Cambiar Contrase&ntildea</a></li>
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
	<div class="row">
		<ol class="breadcrumb col-md-6">
			<b>Usted esta aqui: &nbsp;</b>
			<li><a href="{{url('adminpage/Inicio')}}">Inicio</a></li>
			<li><a href="{{url('adminpage/Usuarios')}}">Usuarios</a></li>
			<li class="active">Nuevo Usuario</li>
		</ol>
	</div>
	<h3>Nuevo Usuario</h3>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Datos de Usuario</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong><p>Por favor corrige los siquientes errores!</p></strong>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('adminpage/Usuarios') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Correo Electr&oacute;nico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contrase&ntilde;a</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar Contrase&ntilde;a</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<a type="button" class="btn btn-default" href="{{url('adminpage/Usuarios')}}">Cancelar</a>
								<button type="submit" class="btn btn-primary">
									Crear
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
