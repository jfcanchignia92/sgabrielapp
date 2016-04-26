@extends('website\main')
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
                        <li class="active"><a href="home">Inicio</a></li>
                        <li><a href="ministerios">Servicios Parroquiales</a></li>
                        <li><a href="online">Servicios Online</a></li>
                        <li><a href="noticia">Acerca de la Parroquia</a></li>
                        <li><a href="acerca">Noticias</a></li>
                        <li><a href="contactenos">Contactenos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <br>
    <div class="main_bg"><!-- start main -->
        <div class="container">
            <div class="bs-example col-md-8" data-example-id="carousel-with-captions">
                <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img data-src="holder.js/900x800/auto/#777:#777" alt="Imagen no disponible" src="../public/images/slide3.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                                <h3>Bienvenidos!</h3>
                                <p><h5>Al sitio web de nuestra Parroquia San Gabriel de los Chillos.</h5></p>
                                <a href="http://www.google.com.ec"><b><h5>Leer mas!</h5></b></a>
                            </div>
                        </div>
                        <div class="item">
                            <img data-src="holder.js/900x800/auto/#666:#666" alt="Imagen no disponible" src="../public/images/slide3.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                                <h3>Second slide label</h3>
                                <p><h5>Nulla vitae elit libero, a pharetra augue mollis interdum.</h5></p>
                                <a href="http://www.google.com.ec"><b><h5>Leer mas!</h5></b></a>
                            </div>
                        </div>
                        <div class="item">
                            <img data-src="holder.js/900x800/auto/#555:#555" alt="Imagen no disponible" src="../public/images/slide3.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                                <h3>Third slide label</h3>
                                <p><h5>Nulla vitae elit libero, a pharetra augue mollis interdum.</h5></p>
                                <a href="http://www.google.com.ec"><h5><b>Leer mas!</b></h5></a>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 lecturasB">
                <br>
                <blockquote>Lecturas del dia de hoy, {{date("d")}}/{{date("m")}}/{{date("y")}} ({{date("h")}}:{{date("i")}})</blockquote>
                <h4 class="tlectura">Evangelio: {!! $data['TE'] !!}</h4>
                <p class="lectura">{!! $data['E'] !!}</p>
                <br>
                <h4 class="tlectura">{!! $data['TS'] !!}</h4>
                <p class="lectura">{!! $data['S'] !!}</p>
            </div>
            <!-- Responsive calendar - START -->
            <br>
            </br>
            <div class="col-md-6" >
                <!-- <div class="responsive-calendar">
                    <div class="controls">
                        <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
                        <h4> <span data-head-month></span>  <span data-head-year></span></h4>
                        <a class="pull-right" data-go="next"><div class="btn btn-primary">Sig</div></a>
                    </div><hr/>
                    <div class="day-headers">
                        <div class="day header">LUN</div>
                        <div class="day header">MAR</div>
                        <div class="day header">MIE</div>
                        <div class="day header">JUE</div>
                        <div class="day header">VIE</div>
                        <div class="day header">SAB</div>
                        <div class="day header">DOM</div>
                    </div>
                    <div class="days" data-group="days"></div>
                </div> -->
            </div>
            <!-- Responsive calendar - END -->
        </div>
    </div>
@endsection