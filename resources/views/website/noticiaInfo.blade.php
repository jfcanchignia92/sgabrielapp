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
                <li><a href="{{url('noticia')}}">Noticias</a></li>
                <li class="active">{{$noticia->NT_TITULO}}</li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <h3>{{$noticia->NT_TITULO}}</h3>
                    <p>{{$noticia->NT_FECHA}}</p>
                    @if($noticia->NT_IMAGEN != null)
                        <img src="{{url('images/noticias/'.$noticia->NT_IMAGEN)}}">
                    @endif
                    <div><br><br>{!! $noticia->NT_CONTENIDO !!}</div>
                </div>
                <div class="col-md-4">
                    <br><br>
                    <h4>M&aacute;s Noticias</h4>
                    <ul class="list-group">
                        @foreach($noticias as $noticia)
                            <li class="list-group-item">
                                <span class="badge">{{$noticia->FECHA}}</span>
                                <p><h5>{{$noticia->NT_TITULO}}</h5></p>
                                <a href="{{url('noticias/'.$noticia->NT_ID)}}"><h5>Ver Noticia</h5></a>
                            </li>
                        @endforeach
                        <li class="list-group-item"><a href="{{url('noticias')}}">Ver m&aacute;s noticias</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection