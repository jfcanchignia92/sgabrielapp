@extends('website.main')
@section('header')
    <script src="{{url('js/pgwslider.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.pgwSlider').pgwSlider(
                    {
                        maxHeight : 700,
                        displayControls : true
                    }
            );
        });
    </script>
    <link href='{{url('css/pgwslider.css')}}' rel='stylesheet' type='text/css'>
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
                        <li class="active"><a href="{{url('acerca')}}">Acerca de la Parroquia</a></li>
                        <li><a href="{{url('noticias')}}">Noticias</a></li>
                        <li><a href="{{url('contactenos')}}">Contactenos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
@endsection
@section('content')
<div class="container">
    <br>
    <ol class="breadcrumb">
        <b>Usted esta aqui: &nbsp;</b>
        <li><a href="{{url('home')}}">Inicio</a></li>
        <li class="active">Acerca de la Parroquia</li>
    </ol>
    <h3><b>El p&aacute;rroco</b></h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <img src="{{url('images/ministerios/image_parroco.jpg')}}">
        </div>
        <div class="col-md-8">
            <h5><b>Padre {{$info->INF_NOMBREPARROCO}}</b></h5>
            <h5>{{$info->INF_PARROCO}}</h5>
        </div>
    </div>
    <div class="clearfix"></div>
    <br><br>
    <h3><b>La Parroquia</b></h3>
    <br>
    <div>
        <ul class="pgwSlider">
            <li><img src="{{url('images/ministerios/image_parroquia.jpg')}}" alt="Interior de la Iglesia" data-description=""></li>
            <li><img src="{{url('images/ministerios/image_parroquia2.jpg')}}" alt="Exteriores" data-description="Se lee: Bienaventurados los que tienen hambre y sed de justicia porque ser&aacute;n saciados."></li>
            <li><img src="{{url('images/ministerios/image_parroquia3.jpg')}}" alt="Fachada de la Iglesia" data-description=""></li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <br><br>
    <p>{!! $info->INF_PARROQUIA!!}</p>
</div>
@endsection