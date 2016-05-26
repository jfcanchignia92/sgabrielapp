@extends('website.main')
@section('header')
    <link rel="stylesheet" href="{{url('css/horario.css')}}">
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
                        <li class="active"><a href="{{url('online')}}">Servicios Online</a></li>
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
    <div class="container">
        <br class="espacio"><br class="espacio">
        <ol class="breadcrumb col-md-6">
            <b>Usted esta aqui: &nbsp;</b>
            <li><a href="{{url('home')}}">Inicio</a></li>
            <li><a href="{{url('online')}}">Servicios Online</a></li>
            <li><a href="{{url('online/Reservas')}}">Reservas Sala de Oraci&oacute;n Perpetua</a></li>
            <li class="active">Horario</li>
        </ol>
        <div class="row">
            <div class="col-md-10"><h2>Horario de la Sala de Oraci&oacute;n Perpetua</h2></div>
            <div class="col-md-2"><input type="submit" class="boton btn btn-info" value="Imprimir Horario" onclick="printDiv('printableArea')"></div>
        </div>
        <br>
        <div id="printableArea" class="tab">
            <h2 id="titulo">Horario de la Sala de Oraci&oacute;n Perpetua</h2>
            <table>
                <tr class="days">
                    <th></th>
                    <th>LUNES</th>
                    <th>MARTES</th>
                    <th>MI&Eacute;RCOLES</th>
                    <th>JUEVES</th>
                    <th>VIERNES</th>
                    <th>S&Aacute;BADO</th>
                    <th>DOMINGO</th>
                </tr>
                <a hidden>{{$count = 0}}</a>
                @foreach($horarios as $horario)
                    <tr>
                        <td class="time">{{$count}}h00 - {{$count+1}}h00</td>
                        <a hidden>{{$count = $count+1}}</a>
                        <a hidden>{{$estado = 'vacio'}}</a>
                        @foreach($horario as $dia)
                            <td>@if($dia!=null)<a hidden>{{$estado = 'novacio'}}</a><ul>@foreach($dia as $reserva)<li>{{$reserva->NOMBRES}} {{$reserva->APELLIDOS}}</li>@endforeach</ul>@endif<a class="{{$estado}}" hidden></a></td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
            <br>
            <p class="mensaje">Para informaci&oacute;n sobre la disponibilidad de los horarios, dirijase a la p&aacute;gina web www.sangabrieldeloschillos.com/online/Reservas/Horario; o comuniquese con el p&aacute;rroco de la Iglesia</p>
        </div>
    </div>
    <script type="text/javascript">
        $(".vacio").parent().parent().hide();
        $(".novacio").parent().parent().show();
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection