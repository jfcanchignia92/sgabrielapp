@extends('website/main')
@section('menu')
    <div class="container">
        <div class="row h_menu">
            <nav class="navbar navbar-default navbar-left" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="home">Inicio</a></li>
                        <li><a href="ministerios">Servicios Parroquiales</a></li>
                        <li><a href="online">Servicios Online</a></li>
                        <li><a href="acerca">Acerca de la Parroquia</a></li>
                        <li class="active"><a href="noticia">Noticias</a></li>
                        <li><a href="contactenos">Contactenos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
@endsection
@section('content')

@endsection