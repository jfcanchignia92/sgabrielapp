@extends('adminpage.app')
@section('header')
    <link rel="stylesheet" href="{{url('css/horario.css')}}">
@endsection
@section('menu')
    <div class="header_bg">
        <div class="container">
            <div class="row h_menu">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand logo" href="{{url('adminpage/Inicio')}}">
                            <img alt="Brand" src="{{url('images/adminpage.png')}}">
                        </a>
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
                            <li><a href="{{url('adminpage/Inicio')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> La Parroquia <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('adminpage/Ministerios')}}">Ministerios</a></li>
                                    <li><a href="{{url('adminpage/Acerca')}}">Acerca de la Parroquia</a></li>
                                    <li><a href="{{url('adminpage/Boletin')}}">Bolet&iacute;n Informativo</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('adminpage/ArchivoParroquial')}}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Archivo Parroquial</a></li>
                            <li class="active"><a href="{{url('adminpage/SalaOracion')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Sala de Oraci&oacute;n Perpetua</a></li>
                            <li><a href="{{url('adminpage/Usuarios')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right sesion">
                            @if (Auth::guest())
                            @else
                                <li class="dropdown" style="text-align: right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bienvenid@, {{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{url()}}">Cambiar Contrase&ntildea</a></li>
                                        <li><a href="{{ url('/auth/logout') }}">Salir</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <br class="espacio"><br class="espacio">
        <ol class="breadcrumb col-md-6">
            <b>Usted esta aqui: &nbsp;</b>
            <li><a href="{{url('adminpage/Inicio')}}">Inicio</a></li>
            <li><a href="{{url('adminpage/SalaOracion')}}">Sala de Oraci&oacute;n Perpetua</a></li>
            <li class="active">Horario Completo</li>
        </ol>
        <div class="row">
            <div class="col-md-10"><h2>Horario de la Sala de Oraci&oacute;n Perpetua</h2></div>
            <div class="col-md-2"><input type="submit" class="boton btn btn-info" value="Imprimir Horario" onclick="window.print()"></div>
        </div>
        <br>
        <div class="tab">
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
        </div>
        <br>
        <p class="mensaje">Para informaci&oacute;n sobre la disponibilidad de los horarios, dirijase a la p&aacute;gina web www.sangabrieldeloschillos.com/ReservasSala; o comuniquese con el p&aacute;rroco de la Iglesia</p>
    </div>
    <script type="text/javascript">
            $(".vacio").parent().parent().hide();
            $(".novacio").parent().parent().show();
    </script>
@endsection