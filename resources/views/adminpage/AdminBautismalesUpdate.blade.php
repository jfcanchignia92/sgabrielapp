@extends('adminpage.app')
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
                            <li class="active"><a href="{{url('adminpage/ArchivoParroquial')}}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Archivo Parroquial</a></li>
                            <li><a href="{{url('adminpage/SalaOracion')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Sala de Oraci&oacute;n Perpetua</a></li>
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
        <div class="row">
            <ol class="breadcrumb col-md-8">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('adminpage/Inicio')}}">Inicio</a></li>
                <li><a href="{{url('adminpage/ArchivoParroquial')}}">Archivo Parroquial</a></li>
                <li><a href="{{url('adminpage/ArchivoParroquial/RegistrosBautismales')}}">Registros Bautismales</a></li>
                <li class="active">Actualizar Registro</li>
            </ol>
        </div>
        <h4 class="col-md-12">Actualizar Registro Bautismal Nro: {{$RB->RGT_NUMERO}}</h4><br>
        @if($errors->any())
            <div class="alert alert-danger col-md-12">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>Por favor corrige los siquientes errores!</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ url('adminpage/ArchivoParroquial/RegistrosBautismales/'.$RB->RGT_NUMERO)}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="PrimerNombre">Primer Nombre: </label>
                                    <input name="NOMBRE1" type="text" class="form-control" required value="{{$RB->NOMBRE1}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="SegundoNombre">Segundo Nombre: </label>
                                    <input name="NOMBRE2" type="text" class="form-control" required value="{{$RB->NOMBRE2}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoPaterno">Apellido Paterno: </label>
                                    <input name="APELLIDO1"type="text" class="form-control" required value="{{$RB->APELLIDO1}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoMaterno">Apellido Materno: </label>
                                    <input name="APELLIDO2" type="text" class="form-control" required value="{{$RB->APELLIDO2}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <div><label for="Sexo">Sexo: </label></div>
                                    @if($RB->SEXO == 'H')
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="H" checked>Hombre</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="M">Mujer</label>
                                        </div>
                                    @else
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="H">Hombre</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="M" checked>Mujer</label>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="Ciudad">Ciudad de Nacimiento: </label></div>
                                    <input type="text" name="CIUDAD" class="form-control" required value="{{$RB->CIUDAD}}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                    <input type="date" name="FECHA_NACIMIENTO" class="form-control" required value="{{$RB->FECHA_NACIMIENTO}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="Padre">Nombre del Padre: </label>
                                    <input name="PADRE" type="text" class="form-control" value="{{$RB->PADRE}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madre">Nombre de la Madre: </label>
                                    <input name="MADRE" type="text" class="form-control" value="{{$RB->MADRE}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="padrino">Nombre del Padrino: </label>
                                    <input name="PADRINO" type="text" class="form-control" value="{{$RB->PADRINO}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madrina">Nombre de la Madrina: </label>
                                    <input name="MADRINA" type="text" class="form-control" value="{{$RB->MADRINA}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del registro de bautizo</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <label for="tomo">Tomo #: </label>
                                    <input name="RGT_TOMO" type="number" min="1" class="form-control" required value="{{$RB->RGT_TOMO}}"/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="pagina">Pagina #: </label>
                                    <input name="RGT_PAGINA" type="number" min="1" class="form-control" required value="{{$RB->RGT_PAGINA}}"/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="registro">Registro #: </label>
                                    <input name="RGT_NUMERO" type="number" class="form-control" value="{{$RB->RGT_NUMERO}}" readonly/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                    <input name="RGT_FECHA" type="date" name="bday" class="form-control" required value="{{$RB->RGT_FECHA}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                    <input name="PARROCO" type="text" class="form-control" required value="{{$RB->PARROCO}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a type="button" class="btn btn-default" href="{{url('adminpage/ArchivoParroquial/RegistrosBautismales')}}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection