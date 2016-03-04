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
                                    <ul class="dropdown-menu media-right" role="menu">
                                        <li><a href="#">Cambiar Contrase&ntildea</a></li>
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
        <blockquote><h2>Servicios Online</h2></blockquote>
        <h3>Certificados</h3>
        <div class="alert alert-info" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Esta pagina le permite gestionar los registros sacramentales que almacena la parroquia</p></div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#bautizos">Bautizos</a></li>
            <li><a data-toggle="tab" href="#matrimonios">Matrimonios</a></li>
        </ul>
        <div class="tab-content">
            <div id="bautizos" class="tab-pane fade in active">
                <h3>Bautizos</h3>
                <div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-search"></span> Buscar Certificado <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Por A&ntildeo</a></li>
                            <li><a href="#">Por Fecha Nacimiento</a></li>
                            <li><a href="#">Por Fecha Bautizo</a></li>
                            <li><a href="#">Por Nombre</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Certificado</button>
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
                                        Nuevo Certificado
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form role="form" action="action_page.php">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
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
                                                        <input type="date" name="bday" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 form-group">
                                                        <label for="Padre">Nombre del Padre: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="Madre">Nombre de la Madre: </label>
                                                        <input type="text" class="form-control"  required/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="padrino">Nombre del Padrino: </label>
                                                        <input type="text" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label for="Madrina">Nombre de la Madrina: </label>
                                                        <input type="text" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Informaci&oacuten del registro de bautizo</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-2 form-group">
                                                        <label for="libro">Libro #: </label>
                                                        <input type="number" min="1" class="form-control" required/>
                                                    </div>
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
                                                        <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                                        <input type="date" name="bday" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="CuraBautismo">Sacerdote que bautizo: </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="CuraCertifica">Sacerdote que certifica </label>
                                                        <input type="text" class="form-control" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary">
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
            <div id="matrimonios" class="tab-pane fade">
                <h3>Matrimonios</h3>
                <p>Some content in menu 1.</p>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen Principal</th>
                    <th>Informacion Completa</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection