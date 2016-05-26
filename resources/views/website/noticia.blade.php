@extends('website.main')
@section('menu')
    <div class="container">
        <div class="row h_menu">
            <nav class="navbar navbar-default" role="navigation">
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
                        <li><a href="{{url('home')}}">Inicio</a></li>
                        <li><a href="{{url('ministerios')}}">Servicios Parroquiales</a></li>
                        <li><a href="{{url('online')}}">Servicios Online</a></li>
                        <li><a href="{{url('acerca')}}">Acerca de la Parroquia</a></li>
                        <li class="active"><a href="{{url('noticias')}}">Noticias</a></li>
                        <li><a href="{{url('contactenos')}}">Contactenos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="main_bg"><!-- start main -->
        <div class="container">
            <br>
            <ol class="breadcrumb">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('home')}}">Inicio</a></li>
                <li class="active">Noticias</li>
            </ol>
            <div class="row">
                <h2>&nbsp;Noticias</h2>
                <br>
                <div class="alert alert-success" role="alert">
                    <h5>
                        <p>
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            <strong> Bienvenido a la secci&oacute;n de noticias.</strong>
                            <br> Esta p&aacute;gina le muestra todas las noticias que la parroquia publicado, escoja una para ver los detalles.
                        </p>
                    </h5>
                </div>
            </div>
            <ul class="list-group">
                @foreach($noticias as $noticia)
                    <li class="list-group-item">
                        <span class="badge">{{$noticia->NT_FECHA}}</span>
                        <p><h4>{{$noticia->NT_TITULO}}</h4></p>
                        <a href="{{url('noticias/'.$noticia->NT_ID)}}"><h4>Ver Noticia</h4></a>
                    </li>
                @endforeach
            </ul>
            {!!$noticias->render()!!}
        </div>
    </div>
@endsection