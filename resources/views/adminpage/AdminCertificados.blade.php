@extends('adminpage.app')
@section('menu')
    <div class="header_bg">
        <div class="container">
            <div class="row h_menu">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                            <li><img src="../../public/images/adminpage.png"></li>
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
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Servicios Online<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../adminpage/Certificados">Certificados</a></li>
                                    <li><a href="#">Reservas Sala de Oracion</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                            @else
                                <li class="dropdown" style="text-align: right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
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
        <h3>Entrega de Certificados</h3>
        <div class="alert alert-info" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Esta pagina le permite gestionar los registros sacramentales que se almacenan en el Archivo Parroquial, y que sirven para entregar los respectivos certificados</p></div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#bautizos">Bautizos</a></li>
            <li><a data-toggle="tab" href="#matrimonios">Matrimonios</a></li>
        </ul>
        <div class="tab-content">
            <div id="bautizos" class="tab-pane fade in active">
                <h3>Bautizos</h3>
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
                                            <li role="presentation" class="active"><a href="#Nombre" role="tab" data-toggle="tab">Por Nombre</a></li>
                                            <li role="presentation"><a href="#FechaBautizo" role="tab" data-toggle="tab">Por Fecha de Bautizo</a></li>
                                            <li role="presentation"><a href="#Tomo" role="tab" data-toggle="tab">Por Tomo</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Nombre">
                                                <br>
                                                <form role="form" action="action_page.php">
                                                        <div class="col-md-6 form-group">
                                                            <label for="PrimerNombre">Primer Nombre: </label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="SegundoNombre">Segundo Nombre: </label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                            <input type="text" class="form-control" required/>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="ApellidoMaterno">Apellido Materno: </label>
                                                            <input type="text" class="form-control" />
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
                                            <div role="tabpanel" class="tab-pane" id="Tomo">
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Registro</button>
                    <!-- Modal -->
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
                                                    <div class="col-md-6 form-group">
                                                        <div><label for="Sexo">Sexo: </label></div>
                                                        <div class="radio-inline">
                                                            <label><input type="radio" name="optradio">Hombre</label>
                                                        </div>
                                                        <div class="radio-inline">
                                                            <label><input type="radio" name="optradio">Mujer</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                                        <input id="BfechaN" type="date" name="bday" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 form-group">
                                                        <label for="Padre">Nombre del Padre: </label>
                                                        <input id="Bpadre" type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="Madre">Nombre de la Madre: </label>
                                                        <input id="Bmadre" type="text" class="form-control"  required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="padrino">Nombre del Padrino: </label>
                                                        <input id="Bpadrino" type="text" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="Madrina">Nombre de la Madrina: </label>
                                                        <input id="Bmadrina" type="text" class="form-control"/>
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
                                                        <input id="Btomo" type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="pagina">Pagina #: </label>
                                                        <input id="Bpagina" type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="registro">Registro #: </label>
                                                        <input id="Bnumero" type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                                        <input id="Bfecha" type="date" name="bday" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                                        <input id="Bparroco" type="text" class="form-control" required/>
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
                <br>
                <br>
                <h4>&Uacuteltimos registros bautismales ingresados</h4>
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
                                <td>{{$RB->feligres->FLG_APELLIDO1." ".$RB->feligres->FLG_APELLIDO2." ".$RB->feligres->FLG_NOMBRE1." ".$RB->feligres->FLG_NOMBRE2}}</td>
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
                                                                    <label for="Nombre" class="label label-default">Nombre:</label> <label>{{$RB->feligres->FLG_APELLIDO1." ".$RB->feligres->FLG_APELLIDO2." ".$RB->feligres->FLG_NOMBRE1." ".$RB->feligres->FLG_NOMBRE2}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    @if($RB->feligres->FLG_SEXO =='M')
                                                                        <label for="sexo" class="label label-default">Sexo:</label> <label>Masculino</label>
                                                                    @else
                                                                        <label for="sexo" class="label label-default">Sexo:</label> <label>Femenino</label>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="fnacimiento" class="label label-default">Fecha de Nacimiento:</label> <label>{{$RB->RGT_FECHA_NACIMIENTO}}</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="padre" class="label label-default">Nombre del Padre:</label> <label>{{$RB->RGT_PADRE}}</Label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="madre" class="label label-default">Nombre de la Madre:</label> <label>{{$RB->RGT_MADRE}}</Label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="padrino" class="label label-default">Nombre del Padrino:</label> <label>{{$RB->RGT_PADRINO}}</Label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="madrina" class="label label-default">Nombre de la Madrina:</label> <label>{{$RB->RGT_MADRINA}}</Label>
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
                                                                    <label for="CuraBautismo" class="label label-default">Sacerdote responsable del bautizo:</label> <label>Padre {{$RB->RGT_PARROCO}}</label>
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
                                    <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</button>
                                </td>
                                <td>{!!date('Y-m-d')!!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="matrimonios" class="tab-pane fade">
                <h3>Matrimonios</h3>
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
                                            <li role="presentation" class="active"><a href="#Nombre1" role="tab" data-toggle="tab">Por Nombre</a></li>
                                            <li role="presentation"><a href="#FechaMatrimonio" role="tab" data-toggle="tab">Por Fecha de Matrimonio</a></li>
                                            <li role="presentation"><a href="#Tomo1" role="tab" data-toggle="tab">Por Tomo</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Nombre1">
                                                <br>
                                                <div class="alert alert-success" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Solo son necesarios los datos de un conyugue.</p></div>
                                                <form role="form" action="action_page.php">
                                                    <div class="col-md-6 form-group">
                                                        <label for="PrimerNombre">Primer Nombre: </label>
                                                        <input type="text" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="SegundoNombre">Segundo Nombre: </label>
                                                        <input type="text" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input type="text" class="form-control" />
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
                    <!-- Modal -->
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
                                    <form role="form" action="action_page.php">
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
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="SegundoNombre">Segundo Nombre: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="esposa"  class="label label-default">Datos de la Esposa: </label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="PrimerNombre">Primer Nombre: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="SegundoNombre">Segundo Nombre: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoPaterno">Apellido Paterno: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="ApellidoMaterno">Apellido Materno: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="testigos"  class="label label-default">Datos de los Testigos: </label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="testigos">Nombres de los Testigos: </label>
                                                        <ul class="list-group" id="testigoslista">
                                                            <li class="list-group-item" id="testigo1List"><input type="text" class="form-control" id="testigo1"required/></li>
                                                            <li class="list-group-item" id="testigo2List"><input type="text" class="form-control" id="testigo2"required/></li>
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
                                                        <input type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="pagina">Pagina #: </label>
                                                        <input type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label for="registro">Registro #: </label>
                                                        <input type="number" min="1" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <div><label for="FechaBautismo">Fecha de Matrimonio: </label></div>
                                                        <input type="date" name="bday" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="CuraBautismo">Sacerdote responsable del matrimonio: </label>
                                                        <input type="text" class="form-control" required/>
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
                <br>
                <h4>&Uacuteltimos registros matrimoniales ingresados</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nro Registro</th>
                            <th>Tomo</th>
                            <th>Pagina</th>
                            <th>Fecha</th>
                            <th>Informaci&oacuten de los conyugues</th>
                            <th>Certificado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>

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
                var input = "<li class=\"list-group-item\" id=\"testigo"+intId+"List\" ><input type=\"text\" class=\"form-control\" id=\"testigo" + intId + "\"/></li>";
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
                var input = "<li class=\"list-group-item\" class=\"testigo1List\"><input type=\"text\" class=\"form-control\" id=\"testigo1\"/></li>";
                var input2 = "<li class=\"list-group-item\" class=\"testigo2List\"><input type=\"text\" class=\"form-control\" id=\"testigo2\"/></li>";
                $("#testigoslista").empty();
                $("#testigoslista").append(input);
                $("#testigoslista").append(input2);
                intId=3;
            });
        });

    </script>
@endsection