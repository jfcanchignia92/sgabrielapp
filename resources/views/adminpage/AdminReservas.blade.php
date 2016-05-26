@extends('adminpage.app')
@section('header')
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
                <li class="active">Reserva de Horarios</li>
            </ol>
            <div class="col-md-5"> </div>
            <div class="col-md-1"><a href="../Inicio" class="btn btn-info"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda</a></div>
        </div>
        <div class="row">
            <h2 class="col-md-12">Reservas de Horarios</h2>
            <div class="alert alert-warning col-md-12">
                <p>Esta p&aacute;gina le permite agregar a los feligreses a los distintos horarios la sala de oraci&oacute;n.<br>Recuerde:</p>
                <ul>
                    <li>Para cambiar la disponibilidad de los horarios siga el siguiente link: <a href="{{url('adminpage/SalaOracion/Disponibilidad')}}">Disponiblidad de la Sala</a></li>
                    <li>Para visualizar el  horario siga el siguiente link: <a href="{{url('adminpage/SalaOracion/Horario')}}">Ver Horario</a></li>
                </ul>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Reserva</button>
        <!-- Modal Create-->
        <div class="modal fade modal-wide" id="myModalNorm" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Nueva Reserva
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form role="form" method="POST" action="{{ url('adminpage/SalaOracion/Reservas') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Nombre">Nombres: </label>
                                    <input type="text" class="form-control" name="nombres" required/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="apellidos">Apellidos: </label>
                                    <input type="text" class="form-control" name="apellidos" required/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mail">Correo Electronico: </label>
                                    <input type="text" class="form-control" name="mail"/>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Seleccione entre los horarios disponibles:</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group row">
                                        @foreach($disponibles as $dia)
                                            <div class="form-group col-md-2">
                                                <div class="form-group">
                                                    <label for="horarios">{{$dia[0]}}</label>
                                                </div>
                                                @foreach($dia[1] as $horario)
                                                    <input type="checkbox" name="{{$horario->HRO_ID}}" value="D">{{$horario->INICIO}} - {{$horario->FIN}}<br>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Crear
                            </button>
                        </form>
                        <script>
                            $('form').submit(function(e){
                                // si la cantidad de checkboxes "chequeados" es cero,
                                // entonces se evita que se envíe el formulario y se
                                // muestra una alerta al usuario
                                if ($('input[type=checkbox]:checked').length === 0) {
                                    e.preventDefault();
                                    alert('Debe seleccionar al menos un horario');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        @if(Session::has('notice'))
            <div class="alerta" id="alerta">
                <br>
                <div class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="glyphicon glyphicon-info-sign"></span>
                    <strong> {{ Session::get('notice') }} </strong>
                </div>
            </div>
        @endif
        <h4>Existen actualmente {{count($reservas)}} reservas</h4>
        <div class="table-responsive">
            <br>
            <table id="reservas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>D&iacute;a</th>
                    <th>Hora</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{$reserva->RSV_ID}}</td>
                        <td>{{$reserva->NOMBRES}} {{$reserva->APELLIDOS}}</td>
                        <td>{{ucwords(strtolower($reserva->HRO_DIA))}}</td>
                        <td>{{$reserva->INICIO}} - {{$reserva->FIN}}</td>
                        <td><button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$reserva->RSV_ID}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
                            <div class="modal fade" id="deleteModal{{$reserva->RSV_ID}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                Eliminar Reserva
                                            </h4>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form action="{{ url('adminpage/SalaOracion/Reservas/'.$reserva->RSV_ID)}}" method="POST" >
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="alert alert-warning" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Esta seguro de eliminar este elemento?</p></div>
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>

@endsection