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
        <div class="row>">
            <ol class="breadcrumb col-md-6">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="../Inicio">Inicio</a></li>
                <li><a href="../ArchivoParroquial">Archivo Parroquial</a></li>
                <li class="active">Registros Matrimoniales</li>
            </ol>
            <div class="col-md-5"> </div>
            <div class="col-md-1"><a href="../Inicio" class="btn btn-info"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda</a></div>
        </div>
        <h3 class="col-md-12">Archivo Parroquial</h3>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#matrimonios"><h4>Registros Matrimoniales</h4></a></li>
        </ul>
        <div class="tab-content">
            <div id="matrimonios" class="tab-pane fade in active">
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
                                                <form role="form" action="{{ url('adminpage/RegistrosM_Date') }}">
                                                    <div class="col-md-4 form-group">
                                                        <label for="dia">D&iacutea: </label>
                                                        <input type="number" name="dia" min="1" max="31" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="Mes">Mes: </label>
                                                        <select name="mes" class="form-control">
                                                            <option selected></option>
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
                                                        <input type="number" name="anio" min="1980" max="{!!date("Y")!!}" class="form-control" required/>
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
                                                <form role="form" action="{{ url('adminpage/RegistrosM_Row') }}">
                                                    <div class="row">
                                                        <div class="col-md-4 form-group">
                                                            <label for="numero">Nro Registro: </label>
                                                            <input type="number" name="numero" min="1" class="form-control" />
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
                    <a type="button" class="btn btn-success" href="{{url('adminpage/ArchivoParroquial/RegistrosMatrimoniales/create')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Registro</a>
                </div>
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
                    <br><h4>Resultados de busqueda</h4>
                    @if(Session::get('resultados'))
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
                                @foreach(Session::get('resultados') as $RB)
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
                                                                        <h3 class="panel-title">Informaci&oacuten del registro matrimonial</h3>
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
                                                                            <label for="FechaMatrimonio" class="label label-default">Fecha de Matrimonio:</label> <label>{{$RB->RGT_FECHA}}</label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="TipoMatrimonio" class="label label-default">Tipo de Matrimonio:</label> <label>{{$RB->MISSAM}}</label>
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
                                            <a href="../ArchivoParroquial/RegistrosM_PDF/{{$RB->RGT_NUMERO}}" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</a>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-warning" href="{{url('adminpage/ArchivoParroquial/RegistrosMatrimoniales/'.$RB->RGT_NUMERO.'/edit')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</a>
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
                                                                        <h3 class="panel-title">Informaci&oacuten del registro matrimonial</h3>
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
                                                                            <label for="FechaMatrimonio" class="label label-default">Fecha de Matrimonio:</label> <label>{{$RB->RGT_FECHA}}</label>
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label for="TipoMatrimonio" class="label label-default">Tipo de Matrimonio:</label> <label>{{$RB->MISSAM}}</label>
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
                                            <a href="../ArchivoParroquial/RegistrosM_PDF/{{$RB->RGT_NUMERO}}" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</a>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-warning" href="{{url('adminpage/ArchivoParroquial/RegistrosMatrimoniales/'.$RB->RGT_NUMERO.'/edit')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
@endsection