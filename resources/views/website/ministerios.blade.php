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
                        <li class="active"><a href="ministerios">Servicios Parroquiales</a></li>
                        <li><a href="online">Servicios Online</a></li>
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
                <h2>&nbsp;Nuestros Servicios y Ministerios</h2>
                <br>
                @foreach ($ministerios as $ministerio)
                    <div class="col-md-6">
                        <div><img src="../public/images/{{$ministerio->MNT_IMG}}"></div>
                        <h4>{{$ministerio->MNT_NOMBRE}}</h4>
                        <div class="col-md-10 tech_para">
                            <p class="para">{{$ministerio->MNT_DESCRIPCION}}</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="read_more">
                            <a href="ministerios/{{str_replace(" ","_",$ministerio->MNT_NOMBRE)}}" class="fa-btn btn-1 btn-1e">M&aacutes Informaci&oacuten</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- end main -->
@endsection
