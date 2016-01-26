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
                        <li class="active"><a href="online">Servicios Online</a></li>
                        <li><a href="acerca">Acerca de la Parroquia</a></li>
                        <li><a href="noticia">Noticias</a></li>
                        <li><a href="contactenos">Contactenos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="main_bg"><!-- start main -->
        <div class="container">
            <div class="row">
                <h2>Servicios Online</h2>
                <br>
                    <div class="col-md-6">
                        <div><img src="../public/images/c1.jpg"></div>
                        <h4>Obtenci&oacuten de Certificados Sacramentales</h4>
                        <div class="col-md-10 tech_para">
                            <p class="para">Si realizaste tu bautismo o matrimonio en nuestra parroquia. <br>Obten tu certificado.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="read_more">
                            <a href="online/Certificados" class="fa-btn btn-1 btn-1e">Acceder</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div><img src="../public/images/c2.jpg"></div>
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