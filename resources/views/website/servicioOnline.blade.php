@extends('website.main')
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
    <div class="main_bg"><!-- start main -->
        <div class="container">
            <br>
            <ol class="breadcrumb">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('home')}}">Inicio</a></li>
                <li><a href="{{url('online')}}">Servicios Online</a></li>
                @if($servicio == 'Certificados')
                <li class="active">Obtenci&oacute;n de Certificados Sacramentales</li>
                @else
                    <li class="active">Reservas Sala de Oraci&oacute;n Perpetua</li>
                @endif
            </ol>
                @if($servicio == 'Certificados')
                <h2>Obtenci&oacute;n de Certificados</h2>
                <br>
                @if(Session::has('resultadosM'))
                    <br><h4>Resultados de busqueda</h4>
                    @if(Session::get('resultadosM'))
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th># Registro</th>
                                    <th>Nombres</th>
                                    <th>Fecha</th>
                                    <th>Informaci&oacuten Completa</th>
                                    <th>Certificado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Session::get('resultadosM') as $RB)
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
                                            <a href="Certificados/RegistrosM_PDF/{{$RB->RGT_NUMERO}}" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</a>
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
                @if(Session::has('resultadosB'))
                    <h4>Resultados de busqueda</h4>
                    @if(Session::get('resultadosB'))
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th># Registro</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Informaci&oacuten Completa</th>
                                    <th>Certificado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Session::get('resultadosB') as $RB)
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
                                            <a href="Certificados/RegistrosB_PDF/{{$RB->RGT_NUMERO}}" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificado</a>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <h5>
                                <p>
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                    <strong> Bienvenido a Obtenci&oacute;n de Certificados.</strong>
                                    <br> Esta p&aacute;gina le permitir&aacute; obtener certificados parroquiales de sacramentos que Ud. haya hecho en esta parroquia.
                                    <br>NOTA:<br>
                                    - Asegurese que los datos que ingresa son correctos<br>
                                    <strong>- En el caso de certificados matrimoniales, son necesarios solo los datos de un conyugue.</strong><br>
                                    - Si no se encuentran resultados en esta p&aacute;gina y esta seguro que tiene un certificado, comuniquese con la parroquia <a href="{{url('contactenos')}}">AQUI</a>
                                </p>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form role="form" method="GET" action="{{ url('online/Certificados/search') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="" for="selectbasic"><h6>Certificado de:</h6></label>
                                <select id="tipo" name="tipo" class="form-control">
                                    <option value="bautismal">Bautismo</option>
                                    <option value="matrimonial">Matrimonio</option>
                                </select>
                            </div>
                            <!-- Apellidos-->
                            <div class="form-group col-md-12">
                                <label class="" for="textinput"><h6>Apellidos:</h6></label>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="apellido1" type="text" placeholder="Primer Apellido" class="form-control col-md-6" required>
                            </div>
                            <div class="form-group col-md-6">
                               <input name="apellido2" type="text" placeholder="Segundo Apellido" class="form-control col-md-6" >
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                                <label class="" for="singlebutton"></label>
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>

                @else
                    <h2>Reservas de sala de oracion perpetua</h2>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-success" role="alert">
                                <h5>
                                    <p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                        <strong>Bienvenido a Reservas de la Sala de Oraci&oacute;n Perpetua.</strong>
                                        <br> Esta p&aacute;gina le permitir&aacute; reservar un horario en la sala de oraci&oacute;n y asi pueda tener un momento entre Ud. y el Santisimo.
                                        <br><br>NOTA:<br>
                                        - Asegurese que los datos que ingresa son correctos<br>
                                        <strong>- Recuerde, Solo algunos horarios estan disponibles</strong><br>
                                        - Si desea que se habilite un horario, comuniquese con la parroquia: <a href="{{url('contactenos')}}">AQUI</a>
                                    </p>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br><br><br>
                            <a href="Reservas/Horario" class="btn btn-info"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Ver Horario</a>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Crear Reserva</button>
                            <!-- Modal Create-->
                            <div class="modal modal-wide" id="myModalNorm" tabindex="-1" role="dialog"
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
                                            <div class="alert alert-info col-md-10">
                                                <h6><p><strong>Selecciona entre los horarios disponibles</strong></p>
                                                <p><strong>NOTA:</strong> - Tu correo electr&oacute;nico es opcional, si lo agregas te enviaremos los datos de tu reserva via correo!</p>
                                                <p> - Si lo agregas verifica que correo electr&oacute;nico sea el correcto</p></h6>
                                            </div>
                                            <form id="formReserva" role="form" method="POST" action="{{ url('online/Reservas/nueva') }}">
                                                <div class="row form-group">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                            Cancelar
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Crear
                                                        </button>
                                                    </div>
                                                </div>
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
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </div>
    <script>
        $('#formReserva').submit(function(e){
            // si la cantidad de checkboxes "chequeados" es cero,
            // entonces se evita que se envíe el formulario y se
            // muestra una alerta al usuario
            if ($('input[type=checkbox]:checked').length === 0) {
                e.preventDefault();
                alert('Debe seleccionar al menos un horario');
            }
        });
    </script>
    <!-- endsection CONTENT -->
@endsection
