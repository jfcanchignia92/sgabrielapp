@extends('adminpage.app')
@section('header')
    <script type="text/javascript">

    </script>
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
    <div class="container">
        <div class="row>">
            <ol class="breadcrumb col-md-6">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('adminpage/Inicio')}}">Inicio</a></li>
                <li><a href="{{url('adminpage/SalaOracion')}}">Sala de Oraci&oacute;n Perpetua</a></li>
                <li class="active">Disponibilidad Horarios</li>
            </ol>
            <div class="col-md-5"> </div>
            <div class="col-md-1"><a href="../Inicio" class="btn btn-info"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda</a></div>
        </div>
        <div class="row">
            <h2 class="col-md-12">Disponibilidad de Horarios</h2>
            <p class="alert alert-info col-md-12">Esta pagina le permite modificar la disponibilidad de los horarios de la sala de oraci&oacute;n</p>
            <br>
        </div>
        <form role="form" method="POST" action="{{ url('admipage/SalaOracion/Disponibilidad/save')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p>Seleccione los horarios que esten disponibles y guarde los cambios.</p>
            <input type="submit" class="btn btn-success" value="Guardar cambios"><br><br>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                LUNES
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="L0" value="D" @if(in_array("L0",$horarios))checked @endif>00h00 - 01h00<br>
                                    <input type="checkbox" name="L1" value="D" @if(in_array("L1",$horarios))checked @endif>01h00 - 02h00<br>
                                    <input type="checkbox" name="L2" value="D" @if(in_array("L2",$horarios))checked @endif>02h00 - 03h00<br>
                                    <input type="checkbox" name="L3" value="D" @if(in_array("L3",$horarios))checked @endif>03h00 - 04h00<br>
                                    <input type="checkbox" name="L4" value="D" @if(in_array("L4",$horarios))checked @endif>04h00 - 05h00<br>
                                    <input type="checkbox" name="L5" value="D" @if(in_array("L5",$horarios))checked @endif>05h00 - 06h00<br>
                                    <input type="checkbox" name="L6" value="D" @if(in_array("L6",$horarios))checked @endif>06h00 - 07h00<br>
                                    <input type="checkbox" name="L7" value="D" @if(in_array("L7",$horarios))checked @endif>07h00 - 08h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="L8" value="D" @if(in_array("L8",$horarios))checked @endif>08h00 - 09h00<br>
                                    <input type="checkbox" name="L9" value="D" @if(in_array("L9",$horarios))checked @endif>09h00 - 10h00<br>
                                    <input type="checkbox" name="L10" value="D" @if(in_array("L10",$horarios))checked @endif>10h00 - 11h00<br>
                                    <input type="checkbox" name="L11" value="D" @if(in_array("L11",$horarios))checked @endif>11h00 - 12h00<br>
                                    <input type="checkbox" name="L12" value="D" @if(in_array("L12",$horarios))checked @endif>12h00 - 13h00<br>
                                    <input type="checkbox" name="L13" value="D" @if(in_array("L13",$horarios))checked @endif>13h00 - 14h00<br>
                                    <input type="checkbox" name="L14" value="D" @if(in_array("L14",$horarios))checked @endif>14h00 - 15h00<br>
                                    <input type="checkbox" name="L15" value="D" @if(in_array("L15",$horarios))checked @endif>15h00 - 16h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="L16" value="D" @if(in_array("L16",$horarios))checked @endif>16h00 - 17h00<br>
                                    <input type="checkbox" name="L17" value="D" @if(in_array("L17",$horarios))checked @endif>17h00 - 18h00<br>
                                    <input type="checkbox" name="L18" value="D" @if(in_array("L18",$horarios))checked @endif>18h00 - 19h00<br>
                                    <input type="checkbox" name="L19" value="D" @if(in_array("L19",$horarios))checked @endif>19h00 - 20h00<br>
                                    <input type="checkbox" name="L20" value="D" @if(in_array("L20",$horarios))checked @endif>20h00 - 21h00<br>
                                    <input type="checkbox" name="L21" value="D" @if(in_array("L21",$horarios))checked @endif>21h00 - 22h00<br>
                                    <input type="checkbox" name="L22" value="D" @if(in_array("L22",$horarios))checked @endif>22h00 - 23h00<br>
                                    <input type="checkbox" name="L23" value="D" @if(in_array("L23",$horarios))checked @endif>23h00 - 00h00<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                MARTES
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="M0" value="D" @if(in_array("M0",$horarios))checked @endif>00h00 - 01h00<br>
                                    <input type="checkbox" name="M1" value="D" @if(in_array("M1",$horarios))checked @endif>01h00 - 02h00<br>
                                    <input type="checkbox" name="M2" value="D" @if(in_array("M2",$horarios))checked @endif>02h00 - 03h00<br>
                                    <input type="checkbox" name="M3" value="D" @if(in_array("M3",$horarios))checked @endif>03h00 - 04h00<br>
                                    <input type="checkbox" name="M4" value="D" @if(in_array("M4",$horarios))checked @endif>04h00 - 05h00<br>
                                    <input type="checkbox" name="M5" value="D" @if(in_array("M5",$horarios))checked @endif>05h00 - 06h00<br>
                                    <input type="checkbox" name="M6" value="D" @if(in_array("M6",$horarios))checked @endif>06h00 - 07h00<br>
                                    <input type="checkbox" name="M7" value="D" @if(in_array("M7",$horarios))checked @endif>07h00 - 08h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="M8" value="D" @if(in_array("M8",$horarios))checked @endif>08h00 - 09h00<br>
                                    <input type="checkbox" name="M9" value="D" @if(in_array("M9",$horarios))checked @endif>09h00 - 10h00<br>
                                    <input type="checkbox" name="M10" value="D" @if(in_array("M10",$horarios))checked @endif>10h00 - 11h00<br>
                                    <input type="checkbox" name="M11" value="D" @if(in_array("M11",$horarios))checked @endif>11h00 - 12h00<br>
                                    <input type="checkbox" name="M12" value="D" @if(in_array("M12",$horarios))checked @endif>12h00 - 13h00<br>
                                    <input type="checkbox" name="M13" value="D" @if(in_array("M13",$horarios))checked @endif>13h00 - 14h00<br>
                                    <input type="checkbox" name="M14" value="D" @if(in_array("M14",$horarios))checked @endif>14h00 - 15h00<br>
                                    <input type="checkbox" name="M15" value="D" @if(in_array("M15",$horarios))checked @endif>15h00 - 16h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="M16" value="D" @if(in_array("M16",$horarios))checked @endif>16h00 - 17h00<br>
                                    <input type="checkbox" name="M17" value="D" @if(in_array("M17",$horarios))checked @endif>17h00 - 18h00<br>
                                    <input type="checkbox" name="M18" value="D" @if(in_array("M18",$horarios))checked @endif>18h00 - 19h00<br>
                                    <input type="checkbox" name="M19" value="D" @if(in_array("M19",$horarios))checked @endif>19h00 - 20h00<br>
                                    <input type="checkbox" name="M20" value="D" @if(in_array("M20",$horarios))checked @endif>20h00 - 21h00<br>
                                    <input type="checkbox" name="M21" value="D" @if(in_array("M21",$horarios))checked @endif>21h00 - 22h00<br>
                                    <input type="checkbox" name="M22" value="D" @if(in_array("M22",$horarios))checked @endif>22h00 - 23h00<br>
                                    <input type="checkbox" name="M23" value="D" @if(in_array("M23",$horarios))checked @endif>23h00 - 00h00<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                MI&Eacute;RCOLES
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="X0" value="D" @if(in_array("X0",$horarios))checked @endif>00h00 - 01h00<br>
                                    <input type="checkbox" name="X1" value="D" @if(in_array("X1",$horarios))checked @endif>01h00 - 02h00<br>
                                    <input type="checkbox" name="X2" value="D" @if(in_array("X2",$horarios))checked @endif>02h00 - 03h00<br>
                                    <input type="checkbox" name="X3" value="D" @if(in_array("X3",$horarios))checked @endif>03h00 - 04h00<br>
                                    <input type="checkbox" name="X4" value="D" @if(in_array("X4",$horarios))checked @endif>04h00 - 05h00<br>
                                    <input type="checkbox" name="X5" value="D" @if(in_array("X5",$horarios))checked @endif>05h00 - 06h00<br>
                                    <input type="checkbox" name="X6" value="D" @if(in_array("X6",$horarios))checked @endif>06h00 - 07h00<br>
                                    <input type="checkbox" name="X7" value="D" @if(in_array("X7",$horarios))checked @endif>07h00 - 08h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="X8" value="D" @if(in_array("X8",$horarios))checked @endif>08h00 - 09h00<br>
                                    <input type="checkbox" name="X9" value="D" @if(in_array("X9",$horarios))checked @endif>09h00 - 10h00<br>
                                    <input type="checkbox" name="X10" value="D" @if(in_array("X10",$horarios))checked @endif>10h00 - 11h00<br>
                                    <input type="checkbox" name="X11" value="D" @if(in_array("X11",$horarios))checked @endif>11h00 - 12h00<br>
                                    <input type="checkbox" name="X12" value="D" @if(in_array("X12",$horarios))checked @endif>12h00 - 13h00<br>
                                    <input type="checkbox" name="X13" value="D" @if(in_array("X13",$horarios))checked @endif>13h00 - 14h00<br>
                                    <input type="checkbox" name="X14" value="D" @if(in_array("X14",$horarios))checked @endif>14h00 - 15h00<br>
                                    <input type="checkbox" name="X15" value="D" @if(in_array("X15",$horarios))checked @endif>15h00 - 16h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="X16" value="D" @if(in_array("X16",$horarios))checked @endif>16h00 - 17h00<br>
                                    <input type="checkbox" name="X17" value="D" @if(in_array("X17",$horarios))checked @endif>17h00 - 18h00<br>
                                    <input type="checkbox" name="X18" value="D" @if(in_array("X18",$horarios))checked @endif>18h00 - 19h00<br>
                                    <input type="checkbox" name="X19" value="D" @if(in_array("X19",$horarios))checked @endif>19h00 - 20h00<br>
                                    <input type="checkbox" name="X20" value="D" @if(in_array("X20",$horarios))checked @endif>20h00 - 21h00<br>
                                    <input type="checkbox" name="X21" value="D" @if(in_array("X21",$horarios))checked @endif>21h00 - 22h00<br>
                                    <input type="checkbox" name="X22" value="D" @if(in_array("X22",$horarios))checked @endif>22h00 - 23h00<br>
                                    <input type="checkbox" name="X23" value="D" @if(in_array("X23",$horarios))checked @endif>23h00 - 00h00<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
                                JUEVES
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="J0" value="D" @if(in_array("J0",$horarios))checked @endif>00h00 - 01h00<br>
                                    <input type="checkbox" name="J1" value="D" @if(in_array("J1",$horarios))checked @endif>01h00 - 02h00<br>
                                    <input type="checkbox" name="J2" value="D" @if(in_array("J2",$horarios))checked @endif>02h00 - 03h00<br>
                                    <input type="checkbox" name="J3" value="D" @if(in_array("J3",$horarios))checked @endif>03h00 - 04h00<br>
                                    <input type="checkbox" name="J4" value="D" @if(in_array("J4",$horarios))checked @endif>04h00 - 05h00<br>
                                    <input type="checkbox" name="J5" value="D" @if(in_array("J5",$horarios))checked @endif>05h00 - 06h00<br>
                                    <input type="checkbox" name="J6" value="D" @if(in_array("J6",$horarios))checked @endif>06h00 - 07h00<br>
                                    <input type="checkbox" name="J7" value="D" @if(in_array("J7",$horarios))checked @endif>07h00 - 08h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="J8" value="D" @if(in_array("J8",$horarios))checked @endif>08h00 - 09h00<br>
                                    <input type="checkbox" name="J9" value="D" @if(in_array("J9",$horarios))checked @endif>09h00 - 10h00<br>
                                    <input type="checkbox" name="J10" value="D" @if(in_array("J10",$horarios))checked @endif>10h00 - 11h00<br>
                                    <input type="checkbox" name="J11" value="D" @if(in_array("J11",$horarios))checked @endif>11h00 - 12h00<br>
                                    <input type="checkbox" name="J12" value="D" @if(in_array("J12",$horarios))checked @endif>12h00 - 13h00<br>
                                    <input type="checkbox" name="J13" value="D" @if(in_array("J13",$horarios))checked @endif>13h00 - 14h00<br>
                                    <input type="checkbox" name="J14" value="D" @if(in_array("J14",$horarios))checked @endif>14h00 - 15h00<br>
                                    <input type="checkbox" name="J15" value="D" @if(in_array("J15",$horarios))checked @endif>15h00 - 16h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="J16" value="D" @if(in_array("J16",$horarios))checked @endif>16h00 - 17h00<br>
                                    <input type="checkbox" name="J17" value="D" @if(in_array("J17",$horarios))checked @endif>17h00 - 18h00<br>
                                    <input type="checkbox" name="J18" value="D" @if(in_array("J18",$horarios))checked @endif>18h00 - 19h00<br>
                                    <input type="checkbox" name="J19" value="D" @if(in_array("J19",$horarios))checked @endif>19h00 - 20h00<br>
                                    <input type="checkbox" name="J20" value="D" @if(in_array("J20",$horarios))checked @endif>20h00 - 21h00<br>
                                    <input type="checkbox" name="J21" value="D" @if(in_array("J21",$horarios))checked @endif>21h00 - 22h00<br>
                                    <input type="checkbox" name="J22" value="D" @if(in_array("J22",$horarios))checked @endif>22h00 - 23h00<br>
                                    <input type="checkbox" name="J23" value="D" @if(in_array("J23",$horarios))checked @endif>23h00 - 00h00<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                                VIERNES
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="V0" value="D" @if(in_array("V0",$horarios))checked @endif>00h00 - 01h00<br>
                                    <input type="checkbox" name="V1" value="D" @if(in_array("V1",$horarios))checked @endif>01h00 - 02h00<br>
                                    <input type="checkbox" name="V2" value="D" @if(in_array("V2",$horarios))checked @endif>02h00 - 03h00<br>
                                    <input type="checkbox" name="V3" value="D" @if(in_array("V3",$horarios))checked @endif>03h00 - 04h00<br>
                                    <input type="checkbox" name="V4" value="D" @if(in_array("V4",$horarios))checked @endif>04h00 - 05h00<br>
                                    <input type="checkbox" name="V5" value="D" @if(in_array("V5",$horarios))checked @endif>05h00 - 06h00<br>
                                    <input type="checkbox" name="V6" value="D" @if(in_array("V6",$horarios))checked @endif>06h00 - 07h00<br>
                                    <input type="checkbox" name="V7" value="D" @if(in_array("V7",$horarios))checked @endif>07h00 - 08h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="V8" value="D" @if(in_array("V8",$horarios))checked @endif>08h00 - 09h00<br>
                                    <input type="checkbox" name="V9" value="D" @if(in_array("V9",$horarios))checked @endif>09h00 - 10h00<br>
                                    <input type="checkbox" name="V10" value="D" @if(in_array("V10",$horarios))checked @endif>10h00 - 11h00<br>
                                    <input type="checkbox" name="V11" value="D" @if(in_array("V11",$horarios))checked @endif>11h00 - 12h00<br>
                                    <input type="checkbox" name="V12" value="D" @if(in_array("V12",$horarios))checked @endif>12h00 - 13h00<br>
                                    <input type="checkbox" name="V13" value="D" @if(in_array("V13",$horarios))checked @endif>13h00 - 14h00<br>
                                    <input type="checkbox" name="V14" value="D" @if(in_array("V14",$horarios))checked @endif>14h00 - 15h00<br>
                                    <input type="checkbox" name="V15" value="D" @if(in_array("V15",$horarios))checked @endif>15h00 - 16h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="V16" value="D" @if(in_array("V16",$horarios))checked @endif>16h00 - 17h00<br>
                                    <input type="checkbox" name="V17" value="D" @if(in_array("V17",$horarios))checked @endif>17h00 - 18h00<br>
                                    <input type="checkbox" name="V18" value="D" @if(in_array("V18",$horarios))checked @endif>18h00 - 19h00<br>
                                    <input type="checkbox" name="V19" value="D" @if(in_array("V19",$horarios))checked @endif>19h00 - 20h00<br>
                                    <input type="checkbox" name="V20" value="D" @if(in_array("V20",$horarios))checked @endif>20h00 - 21h00<br>
                                    <input type="checkbox" name="V21" value="D" @if(in_array("V21",$horarios))checked @endif>21h00 - 22h00<br>
                                    <input type="checkbox" name="V22" value="D" @if(in_array("V22",$horarios))checked @endif>22h00 - 23h00<br>
                                    <input type="checkbox" name="V23" value="D" @if(in_array("V23",$horarios))checked @endif>23h00 - 00h00<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                S&Aacute;BADO
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="S0" value="D" @if(in_array("S0",$horarios))checked @endif>00h00 - 01h00<br>
                                    <input type="checkbox" name="S1" value="D" @if(in_array("S1",$horarios))checked @endif>01h00 - 02h00<br>
                                    <input type="checkbox" name="S2" value="D" @if(in_array("S2",$horarios))checked @endif>02h00 - 03h00<br>
                                    <input type="checkbox" name="S3" value="D" @if(in_array("S3",$horarios))checked @endif>03h00 - 04h00<br>
                                    <input type="checkbox" name="S4" value="D" @if(in_array("S4",$horarios))checked @endif>04h00 - 05h00<br>
                                    <input type="checkbox" name="S5" value="D" @if(in_array("S5",$horarios))checked @endif>05h00 - 06h00<br>
                                    <input type="checkbox" name="S6" value="D" @if(in_array("S6",$horarios))checked @endif>06h00 - 07h00<br>
                                    <input type="checkbox" name="S7" value="D" @if(in_array("S7",$horarios))checked @endif>07h00 - 08h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="S8" value="D" @if(in_array("S8",$horarios))checked @endif>08h00 - 09h00<br>
                                    <input type="checkbox" name="S9" value="D" @if(in_array("S9",$horarios))checked @endif>09h00 - 10h00<br>
                                    <input type="checkbox" name="S10" value="D" @if(in_array("S10",$horarios))checked @endif>10h00 - 11h00<br>
                                    <input type="checkbox" name="S11" value="D" @if(in_array("S11",$horarios))checked @endif>11h00 - 12h00<br>
                                    <input type="checkbox" name="S12" value="D" @if(in_array("S12",$horarios))checked @endif>12h00 - 13h00<br>
                                    <input type="checkbox" name="S13" value="D" @if(in_array("S13",$horarios))checked @endif>13h00 - 14h00<br>
                                    <input type="checkbox" name="S14" value="D" @if(in_array("S14",$horarios))checked @endif>14h00 - 15h00<br>
                                    <input type="checkbox" name="S15" value="D" @if(in_array("S15",$horarios))checked @endif>15h00 - 16h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="S16" value="D" @if(in_array("S16",$horarios))checked @endif>16h00 - 17h00<br>
                                    <input type="checkbox" name="S17" value="D" @if(in_array("S17",$horarios))checked @endif>17h00 - 18h00<br>
                                    <input type="checkbox" name="S18" value="D" @if(in_array("S18",$horarios))checked @endif>18h00 - 19h00<br>
                                    <input type="checkbox" name="S19" value="D" @if(in_array("S19",$horarios))checked @endif>19h00 - 20h00<br>
                                    <input type="checkbox" name="S20" value="D" @if(in_array("S20",$horarios))checked @endif>20h00 - 21h00<br>
                                    <input type="checkbox" name="S21" value="D" @if(in_array("S21",$horarios))checked @endif>21h00 - 22h00<br>
                                    <input type="checkbox" name="S22" value="D" @if(in_array("S22",$horarios))checked @endif>22h00 - 23h00<br>
                                    <input type="checkbox" name="S23" value="D" @if(in_array("S23",$horarios))checked @endif>23h00 - 00h00<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSeven">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                                DOMINGO
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="D0" value="D" @if(in_array("D0",$horarios))checked @endif>00h00 - 01h00<br>
                                    <input type="checkbox" name="D1" value="D" @if(in_array("D1",$horarios))checked @endif>01h00 - 02h00<br>
                                    <input type="checkbox" name="D2" value="D" @if(in_array("D2",$horarios))checked @endif>02h00 - 03h00<br>
                                    <input type="checkbox" name="D3" value="D" @if(in_array("D3",$horarios))checked @endif>03h00 - 04h00<br>
                                    <input type="checkbox" name="D4" value="D" @if(in_array("D4",$horarios))checked @endif>04h00 - 05h00<br>
                                    <input type="checkbox" name="D5" value="D" @if(in_array("D5",$horarios))checked @endif>05h00 - 06h00<br>
                                    <input type="checkbox" name="D6" value="D" @if(in_array("D6",$horarios))checked @endif>06h00 - 07h00<br>
                                    <input type="checkbox" name="D7" value="D" @if(in_array("D7",$horarios))checked @endif>07h00 - 08h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="D8" value="D" @if(in_array("D8",$horarios))checked @endif>08h00 - 09h00<br>
                                    <input type="checkbox" name="D9" value="D" @if(in_array("D9",$horarios))checked @endif>09h00 - 10h00<br>
                                    <input type="checkbox" name="D10" value="D" @if(in_array("D10",$horarios))checked @endif>10h00 - 11h00<br>
                                    <input type="checkbox" name="D11" value="D" @if(in_array("D11",$horarios))checked @endif>11h00 - 12h00<br>
                                    <input type="checkbox" name="D12" value="D" @if(in_array("D12",$horarios))checked @endif>12h00 - 13h00<br>
                                    <input type="checkbox" name="D13" value="D" @if(in_array("D13",$horarios))checked @endif>13h00 - 14h00<br>
                                    <input type="checkbox" name="D14" value="D" @if(in_array("D14",$horarios))checked @endif>14h00 - 15h00<br>
                                    <input type="checkbox" name="D15" value="D" @if(in_array("D15",$horarios))checked @endif>15h00 - 16h00<br>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="D16" value="D" @if(in_array("D16",$horarios))checked @endif>16h00 - 17h00<br>
                                    <input type="checkbox" name="D17" value="D" @if(in_array("D17",$horarios))checked @endif>17h00 - 18h00<br>
                                    <input type="checkbox" name="D18" value="D" @if(in_array("D18",$horarios))checked @endif>18h00 - 19h00<br>
                                    <input type="checkbox" name="D19" value="D" @if(in_array("D19",$horarios))checked @endif>19h00 - 20h00<br>
                                    <input type="checkbox" name="D20" value="D" @if(in_array("D20",$horarios))checked @endif>20h00 - 21h00<br>
                                    <input type="checkbox" name="D21" value="D" @if(in_array("D21",$horarios))checked @endif>21h00 - 22h00<br>
                                    <input type="checkbox" name="D22" value="D" @if(in_array("D22",$horarios))checked @endif>22h00 - 23h00<br>
                                    <input type="checkbox" name="D23" value="D" @if(in_array("D23",$horarios))checked @endif>23h00 - 00h00<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>

@endsection