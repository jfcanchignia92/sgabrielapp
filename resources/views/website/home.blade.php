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
            <!-- Responsive slider - START -->
            <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
                <div class="slides" data-group="slides">
                    <ul>
                        <li>
                            <div class="slide-body" data-group="slide">
                                <img src="../public/images/slide.jpg">
                                <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                                    <h2>Titulo 1</h2>
                                    <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"><p>Esta noticia describe el estreno de la pagina web de la organizacion. Disponible desde hoy</p></div>
                                    <div class="caption link" data-animate="slideAppearRightToLeft" data-delay="800" data-length="300"><a href="http://www.google.com.ec/">Leer m&aacutes!</a></div>
                                </div>
                                <div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
                                    <img src="../public/images/html5.png">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-body" data-group="slide">
                                <img src="../public/images/slide.jpg">
                                <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                                    <h2>Titulo 2</h2>
                                    <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">Compatible!</div>
                                    <div class="caption link" data-animate="slideAppearRightToLeft" data-delay="800" data-length="300"><a href="http://www.google.com.ec/">Leer m&aacutes!</a></div>
                                </div>
                                <div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
                                    <img src="../public/images/html5.png">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-body" data-group="slide">
                                <img src="../public/images/slide.jpg">
                                <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                                    <h2>Titulo 3</h2>
                                    <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">For any caption you use!</div>
                                    <div class="caption link" data-animate="slideAppearRightToLeft" data-delay="800" data-length="300"><a href="http://www.google.com.ec/">Leer m&aacutes!</a></div>
                                </div>
                                <div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
                                    <img src="../public/images/html5.png">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <a class="slider-control left" href="#" data-jump="prev"><</a>
                <a class="slider-control right" href="#" data-jump="next">></a>
                <div class="pages">
                    <a class="page" href="#" data-jump-to="1">1</a>
                    <a class="page" href="#" data-jump-to="2">2</a>
                    <a class="page" href="#" data-jump-to="3">3</a>
                </div>
            </div>
            <!-- Responsive slider - END -->
            <!-- Responsive calendar - START -->
            <br>
            </br>
            <div class="col-md-6" >
                <div class="responsive-calendar">
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
                </div>
            </div>
            <!-- Responsive calendar - END -->
        </div>
    </div>
@endsection