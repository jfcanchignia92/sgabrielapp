@extends('adminpage.app')
@section('menu')
    <div class="header_bg">
        <div class="container">
            <div class="row h_menu">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand logo" href="Inicio">
                            <img alt="Brand" src="../../public/images/adminpage.png">
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
                            <li><a href="../adminpage"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> La Parroquia <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../adminpage/Ministerios">Ministerios</a></li>
                                    <li><a href="#">Acerca de la Parroquia</a></li>
                                    <li><a href="#">Contactos</a></li>
                                    <li><a href="#">Noticias</a></li>
                                    <li><a href="#">Eventos</a></li>
                                </ul>
                            </li>
                            <li><a href="ArchivoParroquial"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Archivo Parroquial</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Sala de Oraci&oacuten Perpetua</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                            @else
                                <li class="dropdown" style="text-align: right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bienvenid@, {{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/auth/logout') }}">Cambiar Contrase&ntildea</a></li>
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
        <h3>Bienvenido al Archivo Parroquial</h3>
        <div class="alert alert-info" role="alert"><p>Esta pagina le permite gestionar los registros sacramentales que se almacenan en el Archivo Parroquial, y que sirven para entregar los respectivos certificados.</p></div>
        <p>El Archivo Parroquial cuenta actualmente con {{($data['BC']-1)+($data['MC']-1)}} registros.</p><br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#bautizos"><h4>Bautizos</h4></a></li>
            <li><a data-toggle="tab" href="#matrimonios"><h4>Matrimonios</h4></a></li>
        </ul>
        <div class="tab-content">
            <div id="bautizos" class="tab-pane fade in active">
                <br>
                <p>El Archivo Parroquial cuenta actualemente con {{$data['BC']-1}} registros bautismales.</p>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalSearch"><span class="glyphicon glyphicon-search"></span> Buscar Registros</button>
                    <!-- Modal Buscar -->
                    <div class="modal fade modal-wide" id="myModalSearch" tabindex="-1" role="dialog"
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
                                        Buscar Registros Bautismales
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#Nombre" role="tab" data-toggle="tab">Por Apellidos</a></li>
                                            <li role="presentation"><a href="#FechaBautizo" role="tab" data-toggle="tab">Por Fecha de Bautizo</a></li>
                                            <li role="presentation"><a href="#Tomo" role="tab" data-toggle="tab">Por Numero de Registro</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Nombre">
                                                <br>
                                                <form role="form" method="GET" action="{{ url('adminpage/RegistrosB_Name') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-md-6 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input name="apellido1" type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input name="apellido2" type="text" class="form-control" />
                                                    </div>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                                    <input type="reset" class="btn btn-default" value="Limpiar">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="FechaBautizo">
                                                <br>
                                                <form role="form" method="GET" action="{{ url('adminpage/RegistrosB_Date') }}">
                                                    <div class="col-md-4 form-group">
                                                        <label for="dia">D&iacutea: </label>
                                                        <input name="dia" type="number" min="1" max="31" class="form-control" placeholder="Seleccione el dia"/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="Mes">Mes: </label>
                                                        <select name="mes" class="form-control">
                                                            <option selected value="0">Seleccione el mes</option>
                                                            <option value="01">Enero</option>
                                                            <option value="02">Febrero</option>
                                                            <option value="03">Marzo</option>
                                                            <option value="04">Abril</option>
                                                            <option value="05">Mayo</option>
                                                            <option value="06">Junio</option>
                                                            <option value="07">Julio</option>
                                                            <option value="08">Agosto</option>
                                                            <option value="09">Septiembre</option>
                                                            <option value="10">Octubre</option>
                                                            <option value="11">Noviembre</option>
                                                            <option value="12">Diciembre</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="anio">A&ntildeo: </label>
                                                        <input name="anio" type="number" min="1980" max="{!!date("Y")!!}" class="form-control" required/>
                                                    </div>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                                    <input type="reset" class="btn btn-default" value="Limpiar">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="Tomo">
                                                <br>
                                                <form role="form" method="GET" action="{{ url('adminpage/RegistrosB_Row') }}">
                                                    <div class="row">
                                                        <div class="col-md-4 form-group">
                                                            <label for="numero">Nro Registro: </label>
                                                            <input name="numero" type="number" min="1" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                                    <input type="reset" class="btn btn-default" value="Limpiar">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Registro</button>
                    <!-- Modal nuevo-->
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
                                        Nuevo Registro Bautismal
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form role="form" method="POST" action="{{ url('adminpage/RegistrosB') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 form-group">
                                                        <label for="PrimerNombre">Primer Nombre: </label>
                                                        <input id="Bnombre1" name="Bnombre1" type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="SegundoNombre">Segundo Nombre: </label>
                                                        <input id="Bnombre2" name="Bnombre2" type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input id="Bapellido1" name="Bapellido1"type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input id="Bapellido2" name="Bapellido2" type="text" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 form-group">
                                                        <div><label for="Sexo">Sexo: </label></div>
                                                        <div class="radio-inline">
                                                            <label><input type="radio" name="sexo" value="H" checked>Hombre</label>
                                                        </div>
                                                        <div class="radio-inline">
                                                            <label><input type="radio" name="sexo" value="M">Mujer</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <div><label for="ciudad">Ciudad de Nacimiento: </label></div>
                                                        <input id="Bciudad" type="text" name="Bciudad" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                                        <input id="BfechaN" type="date" name="BfechaN" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 form-group">
                                                        <label for="Padre">Nombre del Padre: </label>
                                                        <input id="Bpadre" name="Bpadre" type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="Madre">Nombre de la Madre: </label>
                                                        <input id="Bmadre" name="Bmadre" type="text" class="form-control"  required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="padrino">Nombre del Padrino: </label>
                                                        <input id="Bpadrino" name="Bpadrino" type="text" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="Madrina">Nombre de la Madrina: </label>
                                                        <input id="Bmadrina" name="Bmadrina" type="text" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Informaci&oacuten del registro bautismal</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-2 form-group">
                                                        <label for="tomo">Tomo #: </label>
                                                        <input id="Btomo" name="Btomo" type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="pagina">Pagina #: </label>
                                                        <input id="Bpagina" name="Bpagina" type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="registro">Registro #: </label>
                                                        <input id="Bnumero" name="Bnumero" type="number"  class="form-control" value="{{$data['BC']}}" readonly/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                                        <input id="Bfecha" name="Bfecha" type="date" name="bday" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                                        <input id="Bparroco" name="Bparroco" type="text" class="form-control" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Crear">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">
                                            Cancelar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                @if(Session::has('notice'))
                    <br><br><div class="alerta" id="alerta">
                        <div class="alert alert-warning">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <span class="glyphicon glyphicon-info-sign"></span>
                            <strong> {{ Session::get('notice') }} </strong>
                        </div>
                    </div>
                @endif
                @if(Session::has('resultados'))
                    <h4>Resultados de busqueda</h4>
                    @if(Session::get('resultados'))
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th># Registro</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Informaci&oacuten Completa</th>
                                    <th>Certificado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Session::get('resultados') as $RB)
                                    <tr>
                                        <td>{{$RB->RGT_NUMERO}}</td>
                                        <td>{{$RB->APELLIDO1." ".$RB->APELLIDO2." ".$RB->NOMBRE1." ".$RB->NOMBRE2}}</td>
                                        <td>{{$RB->RGT_FECHA}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Ver Informacion</button>
                                            <div class="modal fade" id="modalInfo{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                                                            <h4 class="modal-title">
                                                                Registro Bautismal #: {{$RB->RGT_NUMERO}}
                                                            </h4>
                                                        </div>
                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <div class="panel panel-primary">
                                                                    <div class="panel-heading">
                                                                        <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="Nombre" class="label label-default">Nombre:</label> <label>{{$RB->APELLIDO1." ".$RB->APELLIDO2." ".$RB->NOMBRE1." ".$RB->NOMBRE2}}</label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            @if($RB->SEXO =='H')
                                                                                <label for="sexo" class="label label-default">Sexo:</label> <label>Masculino</label>
                                                                            @else
                                                                                <label for="sexo" class="label label-default">Sexo:</label> <label>Femenino</label>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="fnacimiento" class="label label-default">Fecha de Nacimiento:</label> <label>{{$RB->FECHA_NACIMIENTO}}</label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="ciudadnacimiento" class="label label-default">Ciudad de Nacimiento:</label> <label>{{$RB->CIUDAD}}</label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="padre" class="label label-default">Nombre del Padre:</label> <label>{{$RB->PADRE}}</Label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="madre" class="label label-default">Nombre de la Madre:</label> <label>{{$RB->MADRE}}</Label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="padrino" class="label label-default">Nombre del Padrino:</label> <label>{{$RB->PADRINO}}</Label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="madrina" class="label label-default">Nombre de la Madrina:</label> <label>{{$RB->MADRINA}}</Label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-primary">
                                                                    <div class="panel-heading">
                                                                        <h3 class="panel-title">Informaci&oacuten del registro de bautizo</h3>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div class="col-md-4 form-group">
                                                                            <p><label for="registro" class="label label-default">Registro #:</label> <label>{{$RB->RGT_NUMERO}}</label></p>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <label for="tomo" class="label label-default">Tomo #:</label> <label>{{$RB->RGT_TOMO}}</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <label for="pagina" class="label label-default">Pagina #:</label> <label>{{$RB->RGT_PAGINA}}</label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <div><label for="FechaBautismo" class="label label-default">Fecha de Bautismo:</label> <label>{{$RB->RGT_FECHA}}</label></div>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="CuraBautismo" class="label label-default">Sacerdote responsable del bautizo:</label> <label>Padre {{$RB->PARROCO}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="ArchivoParroquial/RegistrosB_PDF/{{$RB->RGT_NUMERO}}" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
                                            <!-- Modal Update-->
                                            <div class="modal fade modal-wide" id="updateModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                                                                Modificar Registro Bautismal #: {{$RB->RGT_NUMERO}}
                                                            </h4>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <form role="form" method="POST" action="{{ url('adminpage/RegistrosB/'.$RB->RGT_NUMERO)}}">
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
                                                                                <input id="Bnombre1" name="Bnombre1" type="text" class="form-control" required value="{{$RB->NOMBRE1}}"/>
                                                                            </div>
                                                                            <div class="col-md-3 form-group">
                                                                                <label for="SegundoNombre">Segundo Nombre: </label>
                                                                                <input id="Bnombre2" name="Bnombre2" type="text" class="form-control" required value="{{$RB->NOMBRE2}}"/>
                                                                            </div>
                                                                            <div class="col-md-3 form-group">
                                                                                <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                                                <input id="Bapellido1" name="Bapellido1"type="text" class="form-control" required value="{{$RB->APELLIDO1}}"/>
                                                                            </div>
                                                                            <div class="col-md-3 form-group">
                                                                                <label for="ApellidoMaterno">Apellido Materno: </label>
                                                                                <input id="Bapellido2" name="Bapellido2" type="text" class="form-control" required value="{{$RB->APELLIDO2}}"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 form-group">
                                                                                <div><label for="Sexo">Sexo: </label></div>
                                                                                @if($RB->SEXO == 'H')
                                                                                    <div class="radio-inline">
                                                                                        <label><input type="radio" name="sexo" value="H" checked>Hombre</label>
                                                                                    </div>
                                                                                    <div class="radio-inline">
                                                                                        <label><input type="radio" name="sexo" value="M">Mujer</label>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="radio-inline">
                                                                                        <label><input type="radio" name="sexo" value="H">Hombre</label>
                                                                                    </div>
                                                                                    <div class="radio-inline">
                                                                                        <label><input type="radio" name="sexo" value="M" checked>Mujer</label>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-6 form-group">
                                                                                <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                                                                <input id="BfechaN" type="date" name="BfechaN" required value="{{$RB->FECHA_NACIMIENTO}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-3 form-group">
                                                                                <label for="Padre">Nombre del Padre: </label>
                                                                                <input id="Bpadre" name="Bpadre" type="text" class="form-control" value="{{$RB->PADRE}}"/>
                                                                            </div>
                                                                            <div class="col-md-3 form-group">
                                                                                <label for="Madre">Nombre de la Madre: </label>
                                                                                <input id="Bmadre" name="Bmadre" type="text" class="form-control" value="{{$RB->MADRE}}"/>
                                                                            </div>
                                                                            <div class="col-md-3 form-group">
                                                                                <label for="padrino">Nombre del Padrino: </label>
                                                                                <input id="Bpadrino" name="Bpadrino" type="text" class="form-control" value="{{$RB->PADRINO}}"/>
                                                                            </div>
                                                                            <div class="col-md-3 form-group">
                                                                                <label for="Madrina">Nombre de la Madrina: </label>
                                                                                <input id="Bmadrina" name="Bmadrina" type="text" class="form-control" value="{{$RB->MADRINA}}"/>
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
                                                                                <input id="Btomo" name="Btomo" type="number" min="1" class="form-control" required value="{{$RB->RGT_TOMO}}"/>
                                                                            </div>
                                                                            <div class="col-md-2 form-group">
                                                                                <label for="pagina">Pagina #: </label>
                                                                                <input id="Bpagina" name="Bpagina" type="number" min="1" class="form-control" required value="{{$RB->RGT_PAGINA}}"/>
                                                                            </div>
                                                                            <div class="col-md-2 form-group">
                                                                                <label for="registro">Registro #: </label>
                                                                                <input id="Bnumero" name="Bnumero" type="number"  class="form-control" value="{{$RB->RGT_NUMERO}}" readonly/>
                                                                            </div>
                                                                            <div class="col-md-4 form-group">
                                                                                <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                                                                <input id="Bfecha" name="Bfecha" type="date" name="bday" required value="{{$RB->RGT_FECHA}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 form-group">
                                                                                <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                                                                <input id="Bparroco" name="Bparroco" type="text" class="form-control" required value="{{$RB->PARROCO}}"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="submit" class="btn btn-primary" value="Guardar">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">
                                                                    Cancelar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Delete-->
                                            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
                                            <div class="modal fade" id="deleteModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                                                                Eliminar Resgistro Bautismal: {{$RB->RGT_NUMERO}}
                                                            </h4>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <form action="{{ url()}}" method="POST" >
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
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            <span class="glyphicon glyphicon-info-sign"></span>
                            <strong> No se encontraron resultados! </strong>
                        </div>
                    @endif
                @endif
                <br>
                <h4>Historial</h4>
                <div class="row"><div class="alert alert-success col-md-6" role="alert">Esta secci&oacuten muestra los &uacuteltimos registros a los que se accedi&oacute.<p></p></div></div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th># Registro</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Informaci&oacuten Completa</th>
                            <th>Certificado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['B'] as $RB)
                            <tr>
                                <td>{{$RB->RGT_NUMERO}}</td>
                                <td>{{$RB->APELLIDO1." ".$RB->APELLIDO2." ".$RB->NOMBRE1." ".$RB->NOMBRE2}}</td>
                                <td>{{$RB->RGT_FECHA}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Ver Informacion</button>
                                    <div class="modal fade" id="modalInfo{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                                                    <h4 class="modal-title">
                                                        Registro Bautismal #: {{$RB->RGT_NUMERO}}
                                                    </h4>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-12 form-group">
                                                                    <label for="Nombre" class="label label-default">Nombre:</label> <label>{{$RB->APELLIDO1." ".$RB->APELLIDO2." ".$RB->NOMBRE1." ".$RB->NOMBRE2}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    @if($RB->SEXO =='H')
                                                                        <label for="sexo" class="label label-default">Sexo:</label> <label>Masculino</label>
                                                                    @else
                                                                        <label for="sexo" class="label label-default">Sexo:</label> <label>Femenino</label>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="fnacimiento" class="label label-default">Fecha de Nacimiento:</label> <label>{{$RB->FECHA_NACIMIENTO}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="ciudadnacimiento" class="label label-default">Ciudad de Nacimiento:</label> <label>{{$RB->CIUDAD}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="padre" class="label label-default">Nombre del Padre:</label> <label>{{$RB->PADRE}}</Label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="madre" class="label label-default">Nombre de la Madre:</label> <label>{{$RB->MADRE}}</Label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="padrino" class="label label-default">Nombre del Padrino:</label> <label>{{$RB->PADRINO}}</Label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="madrina" class="label label-default">Nombre de la Madrina:</label> <label>{{$RB->MADRINA}}</Label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Informaci&oacuten del registro de bautizo</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-4 form-group">
                                                                    <p><label for="registro" class="label label-default">Registro #:</label> <label>{{$RB->RGT_NUMERO}}</label></p>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <label for="tomo" class="label label-default">Tomo #:</label> <label>{{$RB->RGT_TOMO}}</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <label for="pagina" class="label label-default">Pagina #:</label> <label>{{$RB->RGT_PAGINA}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <div><label for="FechaBautismo" class="label label-default">Fecha de Bautismo:</label> <label>{{$RB->RGT_FECHA}}</label></div>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="CuraBautismo" class="label label-default">Sacerdote responsable del bautizo:</label> <label>Padre {{$RB->PARROCO}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="ArchivoParroquial/RegistrosB_PDF/{{$RB->RGT_NUMERO}}" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
                                    <!-- Modal Update-->
                                    <div class="modal fade modal-wide" id="updateModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                                                        Modificar Registro Bautismal #: {{$RB->RGT_NUMERO}}
                                                    </h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{ url('adminpage/RegistrosB/'.$RB->RGT_NUMERO)}}">
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
                                                                        <input id="Bnombre1" name="Bnombre1" type="text" class="form-control" required value="{{$RB->NOMBRE1}}"/>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <label for="SegundoNombre">Segundo Nombre: </label>
                                                                        <input id="Bnombre2" name="Bnombre2" type="text" class="form-control" required value="{{$RB->NOMBRE2}}"/>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                                        <input id="Bapellido1" name="Bapellido1"type="text" class="form-control" required value="{{$RB->APELLIDO1}}"/>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                                        <input id="Bapellido2" name="Bapellido2" type="text" class="form-control" required value="{{$RB->APELLIDO2}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 form-group">
                                                                        <div><label for="Sexo">Sexo: </label></div>
                                                                        @if($RB->SEXO == 'H')
                                                                            <div class="radio-inline">
                                                                                <label><input type="radio" name="sexo" value="H" checked>Hombre</label>
                                                                            </div>
                                                                            <div class="radio-inline">
                                                                                <label><input type="radio" name="sexo" value="M">Mujer</label>
                                                                            </div>
                                                                        @else
                                                                            <div class="radio-inline">
                                                                                <label><input type="radio" name="sexo" value="H">Hombre</label>
                                                                            </div>
                                                                            <div class="radio-inline">
                                                                                <label><input type="radio" name="sexo" value="M" checked>Mujer</label>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <div><label for="Ciudad">Ciudad de Nacimiento: </label></div>
                                                                        <input type="text" name="Bcuidad" class="form-control" required value="{{$RB->CIUDAD}}">
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                                                        <input id="BfechaN" type="date" name="BfechaN" class="form-control" required value="{{$RB->FECHA_NACIMIENTO}}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 form-group">
                                                                        <label for="Padre">Nombre del Padre: </label>
                                                                        <input id="Bpadre" name="Bpadre" type="text" class="form-control" value="{{$RB->PADRE}}"/>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <label for="Madre">Nombre de la Madre: </label>
                                                                        <input id="Bmadre" name="Bmadre" type="text" class="form-control" value="{{$RB->MADRE}}"/>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <label for="padrino">Nombre del Padrino: </label>
                                                                        <input id="Bpadrino" name="Bpadrino" type="text" class="form-control" value="{{$RB->PADRINO}}"/>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <label for="Madrina">Nombre de la Madrina: </label>
                                                                        <input id="Bmadrina" name="Bmadrina" type="text" class="form-control" value="{{$RB->MADRINA}}"/>
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
                                                                        <input id="Btomo" name="Btomo" type="number" min="1" class="form-control" required value="{{$RB->RGT_TOMO}}"/>
                                                                    </div>
                                                                    <div class="col-md-2 form-group">
                                                                        <label for="pagina">Pagina #: </label>
                                                                        <input id="Bpagina" name="Bpagina" type="number" min="1" class="form-control" required value="{{$RB->RGT_PAGINA}}"/>
                                                                    </div>
                                                                    <div class="col-md-2 form-group">
                                                                        <label for="registro">Registro #: </label>
                                                                        <input id="Bnumero" name="Bnumero" type="number"  class="form-control" value="{{$RB->RGT_NUMERO}}" readonly/>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                                                        <input id="Bfecha" name="Bfecha" type="date" name="bday" class="form-control" required value="{{$RB->RGT_FECHA}}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                                                        <input id="Bparroco" name="Bparroco" type="text" class="form-control" required value="{{$RB->PARROCO}}"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" value="Guardar">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                            Cancelar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Delete-->
                                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
                                    <div class="modal fade" id="deleteModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                                                        Eliminar Resgistro Bautismal: {{$RB->RGT_NUMERO}}
                                                    </h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form action="{{ url()}}" method="POST" >
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
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="matrimonios" class="tab-pane fade">
                <br>
                <p>El Archivo Parroquial cuenta actualemente con {{$data['MC']-1}} registros matrimoniales.</p>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalSearch2"><span class="glyphicon glyphicon-search"></span> Buscar Registros</button>
                    <!-- Modal Buscar -->
                    <div class="modal fade modal-wide" id="myModalSearch2" tabindex="-1" role="dialog"
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
                                        Buscar Registros Matrimoniales
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#Nombre1" role="tab" data-toggle="tab">Por Apellidos</a></li>
                                            <li role="presentation"><a href="#FechaMatrimonio" role="tab" data-toggle="tab">Por Fecha de Matrimonio</a></li>
                                            <li role="presentation"><a href="#Tomo1" role="tab" data-toggle="tab">Por Numero de Registro</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Nombre1">
                                                <br>
                                                <form role="form" method="GET" action="{{ url('adminpage/RegistrosM_Name') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="alert alert-success" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Solo son necesarios los datos de un conyugue.</p></div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input name="apellido1" type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input name="apellido2" type="text" class="form-control" />
                                                    </div>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                                    <input type="reset" class="btn btn-default" value="Limpiar">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="FechaMatrimonio">
                                                <br>
                                                <form role="form" action="action_page.php">
                                                    <div class="col-md-4 form-group">
                                                        <label for="dia">D&iacutea: </label>
                                                        <input type="number" min="1" max="31" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="Mes">Mes: </label>
                                                        <select name="transporte" class="form-control">
                                                            <option selected></option>
                                                            <option>Enero</option>
                                                            <option>Febrero</option>
                                                            <option>Marzo</option>
                                                            <option>Abril</option>
                                                            <option>Mayo</option>
                                                            <option>Junio</option>
                                                            <option>Julio</option>
                                                            <option>Agosto</option>
                                                            <option>Septiembre</option>
                                                            <option>Octubre</option>
                                                            <option>Noviembre</option>
                                                            <option>Diciembre</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="anio">A&ntildeo: </label>
                                                        <input type="number" min="1980" max="{!!date("Y")!!}" class="form-control" required/>
                                                    </div>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                                    <input type="reset" class="btn btn-default" value="Limpiar">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="Tomo1">
                                                <br>
                                                <form role="form" action="action_page.php">
                                                    <div class="col-md-4 form-group">
                                                        <label for="tomo">Tomo: </label>
                                                        <input type="number" min="1" max="31"  class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="pagina">P&aacutegina: </label>
                                                        <input type="number" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="numero">Nro Certificado: </label>
                                                        <input type="number" class="form-control" />
                                                    </div>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                                    <input type="reset" class="btn btn-default" value="Limpiar">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm1"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Registro</button>
                    <!-- Modal Nuevo-->
                    <div class="modal fade modal-wide" id="myModalNorm1" tabindex="-1" role="dialog"
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
                                        Nuevo Registro Matrimonial
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form role="form" method="POST" action="{{ url('adminpage/RegistrosM') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Informaci&oacuten de los conyugues</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="esposo"  class="label label-default">Datos del Esposo: </label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="PrimerNombre">Primer Nombre: </label>
                                                        <input type="text" name="esposon1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="SegundoNombre">Segundo Nombre: </label>
                                                        <input type="text" name="esposon2" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input type="text" name="esposoa1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input type="text" name="esposoa2" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="esposa"  class="label label-default">Datos de la Esposa: </label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="PrimerNombre">Primer Nombre: </label>
                                                        <input type="text" name="esposan1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="SegundoNombre">Segundo Nombre: </label>
                                                        <input type="text" name="esposan2" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input type="text" name="esposaa1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input type="text" name="esposaa2" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="testigos"  class="label label-default">Datos de los Testigos: </label>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="testigos">Nombres de los Testigos: </label>
                                                        <input type="text" name="testigos" class="form-control" placeholder="Ingrese los testigos de la forma testigo1; testigo2; ..." required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="testigos">Nombres de los Testigos: </label>
                                                        <ul class="list-group" id="testigoslista">
                                                            <li class="list-group-item" id="testigo1List"><input type="text"  name="testigo1" class="form-control" id="testigo1"required/></li>
                                                            <li class="list-group-item" id="testigo2List"><input type="text"  name="testigo2" class="form-control" id="testigo2"required/></li>
                                                        </ul>
                                                        <div id="alert_testigos" class="alert alert-info" hidden>
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <span class="glyphicon glyphicon-info-sign"></span>
                                                            <strong> Son necesarios al menos 2 testigos! </strong>
                                                        </div>
                                                        <button type="button" class="btn btn-info" id="add"><pan class="glyphicon glyphicon-plus"></pan> A&ntildeadir</button>
                                                        <button type="button" class="btn btn-danger" id="remove"><pan class="glyphicon glyphicon-remove"></pan> Quitar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Informaci&oacuten del registro de matrimonio</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-2 form-group">
                                                        <label for="tomo">Tomo #: </label>
                                                        <input type="number" name="tomo" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="pagina">Pagina #: </label>
                                                        <input type="number" name="pagina" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="registro">Registro #: </label>
                                                        <input type="number" name="numero" class="form-control" value="{{$data['MC']}}" readonly/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <div><label for="FechaMatrimonio">Fecha de Matrimonio: </label></div>
                                                        <input type="date" name="mfecha" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <div><label for="tipo">Tipo: </label></div>
                                                        <select name="tipo" class="form-control">
                                                            <option selected>Intra</option>
                                                            <option>Extra</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="CuraBautismo">Sacerdote responsable del matrimonio: </label>
                                                        <input type="text" name="parroco" class="form-control" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Crear">
                                        <button type="reset" class="btn btn-default" id="clear">Limpiar</button>
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">
                                            Cancelar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <br>
                <h4>Historial</h4>
                <div class="row"><div class="alert alert-success col-md-6" role="alert">Esta secci&oacuten muestra los &uacuteltimos registros a los que se accedi&oacute.<p></p></div></div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th># Registro</th>
                            <th>Nombres</th>
                            <th>Fecha</th>
                            <th>Informaci&oacuten Completa</th>
                            <th>Certificado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['M'] as $RB)
                            <tr>
                                <td>{{$RB->RGT_NUMERO}}</td>
                                <td>{{$RB->ESPOSO_A1." ".$RB->ESPOSO_A2." ".$RB->ESPOSO_N1." ".$RB->ESPOSO_N2}} Y {{$RB->ESPOSA_A1." ".$RB->ESPOSA_A2." ".$RB->ESPOSA_N1." ".$RB->ESPOSA_N2}}</td>
                                <td>{{$RB->RGT_FECHA}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfoM{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Ver Informacion</button>
                                    <div class="modal fade" id="modalInfoM{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                                                    <h4 class="modal-title">
                                                        Registro Matrimonial #: {{$RB->RGT_NUMERO}}
                                                    </h4>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Informaci&oacuten de los conyugues</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-12 form-group">
                                                                    <label for="NombreEsposo" class="label label-default">Nombres Esposo:</label> <label>{{$RB->ESPOSO_A1." ".$RB->ESPOSO_A2." ".$RB->ESPOSO_N1." ".$RB->ESPOSO_N2}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="NombreEsposa" class="label label-default">Nombres Esposa:</label> <label>{{$RB->ESPOSA_A1." ".$RB->ESPOSA_A2." ".$RB->ESPOSA_N1." ".$RB->ESPOSA_N2}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="testigos" class="label label-default">Testigos:</label> <label>{{$RB->RGT_TESTIGOS}}</Label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Informaci&oacuten del registro de bautizo</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-4 form-group">
                                                                    <p><label for="registro" class="label label-default">Registro #:</label> <label>{{$RB->RGT_NUMERO}}</label></p>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <label for="tomo" class="label label-default">Tomo #:</label> <label>{{$RB->RGT_TOMO}}</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <label for="pagina" class="label label-default">Pagina #:</label> <label>{{$RB->RGT_PAGINA}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <div><label for="FechaMatrimonio" class="label label-default">Fecha de Matrimonio:</label> <label>{{$RB->RGT_FECHA}}</label></div>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="CuraBautismo" class="label label-default">Sacerdote responsable del bautizo:</label> <label>Padre {{$RB->PARROCO}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="ArchivoParroquial/RegistrosM_PDF/{{$RB->RGT_NUMERO}}" target="_blank" class="btn btn-warning"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</a>
                                </td>
                                <td>{!!date('Y-m-d')!!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var intId = 3;
            $("#add").click(function() {
                var input = "<li class=\"list-group-item\" id=\"testigo"+intId+"List\" ><input type=\"text\" class=\"form-control\" name=\"testigo" + intId + "\" id=\"testigo" + intId + "\"/></li>";
                $("#testigoslista").append(input);
                intId = intId+1;
            });
            $("#remove").click(function() {
                if(intId>3)
                {
                    $("#testigo" + (intId - 1) + "List").remove();
                    intId = intId - 1;
                }
                else{$("#alert_testigos").removeAttr("hidden");}
            });
            $("#clear").click(function() {
                var input = "<li class=\"list-group-item\" class=\"testigo1List\"><input type=\"text\" class=\"form-control\" id=\"testigo1\" name=\"testigo1\"/></li>";
                var input2 = "<li class=\"list-group-item\" class=\"testigo2List\"><input type=\"text\" class=\"form-control\" id=\"testigo2\" name=\"testigo2\"/></li>";
                $("#testigoslista").empty();
                $("#testigoslista").append(input);
                $("#testigoslista").append(input2);
                intId=3;
            });
        });
    </script>
@endsection