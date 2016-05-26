@extends('website.main')
@section('header')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapProp = {
                center:new google.maps.LatLng(-0.291982, -78.456773),
                zoom:17,
                mapTypeId:google.maps.MapTypeId.HYBRID
            };
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker=new google.maps.Marker({
                position:new google.maps.LatLng(-0.291982, -78.456773),
                animation:google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
            google.maps.event.addListener(marker,'click',function() {
                map.setZoom(18);
                map.setCenter(marker.getPosition());
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
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
                        <li><a href="{{url('home')}}">Inicio</a></li>
                        <li><a href="{{url('ministerios')}}">Servicios Parroquiales</a></li>
                        <li><a href="{{url('online')}}">Servicios Online</a></li>
                        <li><a href="{{url('acerca')}}">Acerca de la Parroquia</a></li>
                        <li><a href="{{url('noticias')}}">Noticias</a></li>
                        <li class="active"><a href="{{url('contactenos')}}">Contactenos</a></li>
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
                <br>
                <ol class="breadcrumb col-md-6">
                    <b>Usted esta aqui: &nbsp;</b>
                    <li><a href="{{url('home')}}">Inicio</a></li>
                    <li class="active">Contactenos</li>
                </ol>
                <h2 class="col-md-12">&nbsp;Donde nos encontramos</h2>
                <br>
                <div class="col-md-6" id="googleMap" style="height:380px;"></div>
                <div class="col-md-6">
                    <div class="col-md-4"> </div>
                    <div class="col-md-8 company_ad">
                        <h2>Direcci&oacuten:</h2>
                        <address>
                            <p>Av. Amazonas y Segunda Transversal,</p>
                            <p>San Rafael, Valle de los Chillos</p>
                            <p>Quito - Ecuador</p>
                        </address>
                        <h2>Contactos:</h2>
                        <address>
                            <p>Tel&eacutefono: {{$info->INF_TELEFONO}}</p>
                            <p>Email: <a href="mailto:{{$info->INF_EMAIL}}">{{$info->INF_EMAIL}}</a></p>
                            <p>Siguenos en: <a href="{{$info->INF_FACEBOOK}}">Facebook</a></p>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end main -->
    @endsection

