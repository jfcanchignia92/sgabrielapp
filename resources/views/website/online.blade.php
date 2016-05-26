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
                        <li class="active"><a href="{{url('online')}}">Servicios Online</a></li>
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
            <ol class="breadcrumb">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('home')}}">Inicio</a></li>
                <li class="active">Servicios Online</li>
            </ol>
            <div class="row">
                <h2>Servicios Online</h2>
                <br>
                    <div class="col-md-6">
                        <div><img  style="width: 250px; height: 250px;" src="{{url('images/ministerios/certificados.jpg')}}"></div>
                        <br><h4>Obtenci&oacuten de Certificados Sacramentales</h4>
                        <div class="col-md-10 tech_para">
                            <p class="para">Si realizaste tu bautismo o matrimonio en nuestra parroquia. <br>Obten tu certificado.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="read_more">
                            <a href="online/Certificados" class="fa-btn btn-1 btn-1e">Acceder</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div><img style="width: 250px; height: 250px;" src="{{url('images/ministerios/reservas.jpg')}}"></div>
                        <h4>Reserva de la Sala de Oraci&oacuten Perpetua</h4>
                        <div class="col-md-10 tech_para">
                            <p class="para">La Sala de Oraci&oacuten Perpetua esta disponible las 24 horas del d&iacutea. <br>Reserva tu lugar.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="read_more">
                            <a href="online/Reservas" class="fa-btn btn-1 btn-1e">Acceder</a>
                        </div>
                    </div>
            </div>
        </div>
    </div><!-- end main -->
@endsection