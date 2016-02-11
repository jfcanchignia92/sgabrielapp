@extends('website\main')
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
                        <li><a href="noticia">Noticias</a></li>
                        <li class="active"><a href="contactenos">Contactenos</a></li>
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
                <h2>&nbsp;Donde nos encontramos</h2>
                <br>
                <div class="col-md-6" id="googleMap" style="height:380px;"></div>
                <div class="col-md-6" id="googlePanorama" style="height:380px;"></div>
            </div>
        </div>
    </div><!-- end main -->
    <div class="main_btm"><!-- start main_btm -->
        <div class="container">
            <div class="main row">
                <div class="col-md-4 company_ad">
                    <h2>Direcci&oacuten:</h2>
                    <address>
                        <p>Av. Amazonas y Segunda Transversal,</p>
                        <p>San Rafael, Valle de los Chillos</p>
                        <p>Quito - Ecuador</p>
                        <p>Tel&eacutefono: (02) 2863757</p>
                        <p>Email: <a href="mailto:info@mycompany.com">sgabrielchilos@gmail.com</a></p>
                        <p>SIguenos en: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
                    </address>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <h2>Contactese con nosotros</h2>
                        <form method="post" action="contact-post.html">
                            <div>
                                <span>Nombre</span>
                                <span><input type="username" class="form-control" id="userName"></span>
                            </div>
                            <div>
                                <span>e-mail</span>
                                <span><input type="email" class="form-control" id="inputEmail3"></span>
                            </div>
                            <div>
                                <span>Asunto</span>
                                <span><textarea name="userMsg"> </textarea></span>
                            </div>
                            <div>
                                <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Enviar"></label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endsection


