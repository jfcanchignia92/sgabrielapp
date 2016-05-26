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
            <ol class="breadcrumb">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('home')}}">Inicio</a></li>
                <li class="active">Servicios Parroquiales</li>
            </ol>
            <div class="row">
                <h2>&nbsp;Nuestros Servicios y Ministerios</h2>
                <br>
                <a hidden>{{$num = $ministerios->count()}}</a>
                <a hidden>{{$var = 1}}</a>
                @foreach ($ministerios as $ministerio)
                    @if($var == 1)
                        <br><br>
                        <div class="row">
                    @endif
                    <div class="col-md-4">
                        <div><img style="width: 300px; height: 250px" src="{{url('images/ministerios/'.$ministerio->MNT_IMG)}}"></div>
                        <h4>{{$ministerio->MNT_NOMBRE}}</h4>
                        <div class="col-md-10 tech_para">
                            <p class="para">{{$ministerio->MNT_DESCRIPCION}}</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="read_more">
                            <a href="ministerios/{{str_replace(" ","_",$ministerio->MNT_NOMBRE)}}" class="fa-btn btn-1 btn-1e">M&aacutes Informaci&oacuten</a>
                        </div>
                        <div class="espacio"><br><br><br></div>
                    </div>
                    @if($var == 3)
                        </div>
                        <a hidden>{{$var= 0}}</a>
                    @endif
                    <a hidden>{{$var= $var+1}}</a>
                @endforeach
            </div>
        </div>
    </div><!-- end main -->
@endsection
