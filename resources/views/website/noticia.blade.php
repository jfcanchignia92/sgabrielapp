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
    <br>
    <div class="main_bg"><!-- start main -->
        <div class="container">
            <div class="row">
                <form class="form-horizontal">
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Certificado de:</label>
                            <div class="col-md-4">
                                <select id="selectbasic" name="selectbasic" class="form-control">
                                    <option value="1">Bautismo</option>
                                    <option value="2">Matrimonio</option>
                                </select>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Apellidos:</label>
                            <div class="col-md-4">
                                <input id="textinput" name="textinput" type="text" placeholder="Apellidos Completos" class="form-control input-md" required="">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Nombres:</label>
                            <div class="col-md-4">
                                <input id="textinput" name="textinput" type="text" placeholder="Nombres Completos" class="form-control input-md" required="">
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton"></label>
                            <div class="col-md-4">
                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection