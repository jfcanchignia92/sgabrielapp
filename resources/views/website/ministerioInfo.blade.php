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
                        <li class="active"><a href="{{url('ministerios')}}">Servicios Parroquiales</a></li>
                        <li><a href="{{url('online')}}">Servicios Online</a></li>
                        <li><a href="{{url('acerca')}}">Acerca de la Parroquia</a></li>
                        <li><a href="{{url('noticias')}}">Noticias</a></li>
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
            <br>
            <ol class="breadcrumb">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('home')}}">Inicio</a></li>
                <li><a href="{{url('ministerios')}}">Servicios Parroquiales</a></li>
                <li class="active">{{$ministerio->MNT_NOMBRE}}</li>
            </ol>
            <div class="row">
                <h1>{{$ministerio->MNT_NOMBRE}}</h1>
                <br>
                <div><img src="{{url('images/ministerios/'.$ministerio->MNT_IMG)}}"></div>
                </br>
                </br>
                <div>{!!$ministerio->MNT_INFORMACION!!}</div>
                @if($ministerio->MNT_ID ==1)
                    <div class="read_more">
                        <a href="../online/Certificados" class="fa-btn btn-1 btn-1e">Obten tu Certificado</a>
                    </div>
                @endif
                @if($ministerio->MNT_ID ==5)
                    <div class="read_more">
                        <a href="../online/Reservas" class="fa-btn btn-1 btn-1e">Ver horario de la Sala</a>
                        <a href="../online/Reservas" class="fa-btn btn-1 btn-1e">Reserva tu lugar</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection