@extends('website.main')
@section('header')
    <script language="javascript" type="text/javascript">
        function displayTextFile(filePath){
            iframe = document.getElementsByName('textDisplay')[0];
            iframe.src=filePath;
            iframe.style.display="block";
        }
    </script>
@endsection
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
                        <li class="active"><a href="{{url('home')}}">Inicio</a></li>
                        <li><a href="{{url('ministerios')}}">Servicios Parroquiales</a></li>
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
    <br>
        <div class="container">
            <div class="row">
                <div class="col-md-8 slider">
                    <div class="bs-example" data-example-id="carousel-with-captions">
                        <div id="carousel-example-captions" class="carousel slide" data-ride="carousel" style="height: auto;">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner" role="listbox" style="height: auto;">
                                <div class="item active">
                                    <img id="img_slide" src="{{url('images/noticias/bienvenida.jpg')}}" data-holder-rendered="true">
                                </div>
                                @foreach($boletines as $boletin)
                                    @if($boletin->NT_TIPO=='vacio')
                                        <div class="item">
                                            <img id="img_slide" src="{{url('images/noticias/'.$boletin->NT_IMAGEN)}}" data-holder-rendered="true">
                                        </div>
                                    @else
                                        <div class="item">
                                            @if($boletin->NT_IMAGEN == null)
                                                <img id="img_slide" src="{{url('images/noticias/boletin.jpg')}}" data-holder-rendered="true">
                                                <div class="carousel-caption">
                                                    <h4 style="color: #080808"><b>{{$boletin->NT_TITULO}}</b></h4>
                                                    <a href="{{url('noticias/'.$boletin->NT_ID)}}"><b><h5>Leer mas!</h5></b></a>
                                                </div>
                                            @else
                                                <img id="img_slide" src="{{url('images/noticias/'.$boletin->NT_IMAGEN)}}" data-holder-rendered="true">
                                                <div class="carousel-caption">
                                                    <h4 style="color: #FFFFFF"><b>{{$boletin->NT_TITULO}}</b></h4>
                                                    <a href="{{url('noticias/'.$boletin->NT_ID)}}"><b><h5>Leer mas!</h5></b></a>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
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
                    <br>
                    <h4>&Uacute;ltimas Noticias</h4>
                    <ul class="list-group">
                        @foreach($noticias as $noticia)
                            <li class="list-group-item">
                                <span class="badge">{{$noticia->FECHA}}</span>
                                <p><h5>{{$noticia->NT_TITULO}}</h5></p>
                                <a href="{{url('noticias/'.$noticia->NT_ID)}}"><h5>Ver Noticia</h5></a>
                            </li>
                        @endforeach
                        <li class="list-group-item"><a href="{{url('noticias')}}"><h5>Ver m&aacute;s noticias</h5></a></li>
                    </ul>
                    <br><br>
                    <h4>Visita nuestro servicios online</h4>
                    <ul class="list-group">
                        <li class="list-group-item row">
                            <a href="{{url('online/Reservas')}}" class="btn btn-info col-md-5"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <h5>Reserva la Sala de Oraci&oacute;n</h5></a>
                            <a class="col-md-1"><div class="espacio"><br><br></div></a>
                            <a href="{{url('online/Certificados')}}" class="btn btn-success col-md-6"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <h5>Obt&eacute;n tu certificado Parroquial</h5></a>
                        </li>
                    </ul>
                    <div class="espacio"><br><br><br></div>
                </div>
                <div class="col-md-4 lecturasB">
                    <br>
                    <blockquote>Lecturas del dia de hoy, {{date("d")}}/{{date("m")}}/{{date("Y")}}</blockquote>
                    <iframe id="textDisplay" name="textDisplay" src="" style="width: 100%; height: 720px; border: none; text-align: justify"></iframe>
                    <script>
                        var currentTime = new Date();
                        var month = currentTime.getMonth() + 1;
                        var day = currentTime.getDate();
                        var year = currentTime.getFullYear();
                        if (day < 10) day = '0'+day;
                        if (month < 10) month = '0'+month;
                        displayTextFile('http://feed.evangelizo.org/v2/reader.php?date='+year+month+day+'&type=all&lang=SP');
                    </script>
                </div>
            </div>
        </div>

@endsection