@extends('website\main')
@section('menu')
    <div class="container">
        <div class="row h_menu">
            <nav class="navbar navbar-default navbar-left" role="navigation">
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
          <!--  <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
                    <div class="slides" data-group="slides">
                        <ul>
                            <li>
                                <div class="slide-body" data-group="slide">
                                    <img src="../img/slide-1.jpg">
                                    <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                                        <h2>Responsive slider</h2>
                                        <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">With one to one swipe movement!</div>
                                    </div>
                                    <div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
                                        <img src="../img/html5.png">
                                    </div>
                                    <div class="caption img-css3" data-animate="slideAppearLeftToRight">
                                        <img src="../img/css3.png">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="slide-body" data-group="slide">
                                    <img src="../img/slide-2.jpg">
                                    <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                                        <h2>Twitter Boostrap</h2>
                                        <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">Compatible!</div>
                                    </div>
                                    <div class="caption img-bootstrap" data-animate="slideAppearDownToUp" data-delay="200">
                                        <img src="../img/bootstrap.png">
                                    </div>
                                    <div class="caption img-twitter" data-animate="slideAppearUpToDown">
                                        <img src="../img/twitter.png">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="slide-body" data-group="slide">
                                    <img src="../img/slide-3.jpg">
                                    <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                                        <h2>Custom animations</h2>
                                        <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">For any caption you use!</div>
                                    </div>
                                    <div class="caption img-jquery" data-animate="slideAppearDownToUp" data-delay="200">
                                        <img src="../img/jquery.png">
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
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner")>
                        <div class="item active">
                            <img src="http://placehold.it/1200x315" alt="...">
                            <div class="carousel-caption">
                                <h3>Titulo 1</h3>
                                <h4><a href="www.google.com">Leer mas!</a></h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/1200x315" alt="...">
                            <div class="carousel-caption">
                                <h3>Titulo 2</h3>
                                <h4><a href="www.google.com">Leer mas!</a></h4>
                            </div>
                        </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div> <!-- Carousel -->
            <!-- Responsive calendar - START -->
            <br>
            </br>
            <div class="col-md-6" style="max-width: 100%">
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
    <!--
    <br>
    <div class="main_bg">
        <div class="container">
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
    </div> -->
@endsection