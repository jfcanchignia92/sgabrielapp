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
                <li><a href="{{url('adminpage/ArchivoParroquial/RegistrosMatrimoniales')}}">Registros Matrimoniales</a></li>
                <li class="active">Nuevo Registro</li>
            </ol>
        </div>
        <h4 class="col-md-12">Nuevo Registro Matrimonial</h4><br>
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
            <div class="modal-body row">
                <form role="form" method="POST" action="{{ url('adminpage/ArchivoParroquial/RegistrosMatrimoniales') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-primary col-md-6" style="padding:0">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten de los conyugues</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="esposo"  class="label label-default">Datos del Esposo: </label>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="PrimerNombre">Primer Nombre: </label>
                                    <input type="text" name="ESPOSO_N1" class="form-control" value="{{old('ESPOSO_N1')}}" required/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="SegundoNombre">Segundo Nombre: </label>
                                    <input type="text" name="ESPOSO_N2" class="form-control" value="{{old('ESPOSO_N2')}}"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="ApellidoPaterno">Apellido Paterno: </label>
                                    <input type="text" name="ESPOSO_A1" class="form-control" value="{{old('ESPOSO_A1')}}" required/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="ApellidoMaterno">Apellido Materno: </label>
                                    <input type="text" name="ESPOSO_A2" class="form-control" value="{{old('ESPOSO_A2')}}" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="esposa"  class="label label-default">Datos de la Esposa: </label>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="PrimerNombre">Primer Nombre: </label>
                                    <input type="text" name="ESPOSA_N1" class="form-control" value="{{old('ESPOSA_N1')}}" required/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="SegundoNombre">Segundo Nombre: </label>
                                    <input type="text" name="ESPOSA_N2" class="form-control" value="{{old('ESPOSA_N2')}}"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="ApellidoPaterno">Apellido Paterno: </label>
                                    <input type="text" name="ESPOSA_A1" class="form-control" value="{{old('ESPOSA_A1')}}" required/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="ApellidoMaterno">Apellido Materno: </label>
                                    <input type="text" name="ESPOSA_A2" class="form-control" value="{{old('ESPOSA_A2')}}" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="testigos"  class="label label-default">Datos de los Testigos: </label>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="testigos">Nombres de los Testigos: </label>
                                    <input type="text" name="RGT_TESTIGOS" class="form-control" placeholder="Ingrese los testigos de la forma testigo1; testigo2; ..." value="{{old('RGT_TESTIGOS')}}" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1" style="width: 25px"></div>
                    <div class="panel panel-primary col-md-5" style="padding:0">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del registro de matrimonio</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="tomo">Tomo #: </label>
                                    <input type="number" name="RGT_TOMO" min="1" class="form-control" value="{{old('RGT_TOMO')}}" required />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="pagina">Pagina #: </label>
                                    <input type="number" name="RGT_PAGINA" min="1" class="form-control" value="{{old('RGT_PAGINA')}}" required />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="registro">Registro #: </label>
                                    <input type="number" name="RGT_NUMERO" class="form-control" value="{{$count}}" readonly  required/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div><label for="FechaMatrimonio">Fecha de Matrimonio: </label></div>
                                    <input type="date" name="RGT_FECHA" class="form-control" value="{{old('RGT_FECHA')}}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div><label for="tipo">Tipo: </label></div>
                                    <select name="MISSAM" class="form-control">
                                        @if(old('MISSAM') == "Intra")
                                            <option selected>Intra</option>
                                            <option>Extra</option>
                                        @else
                                            <option>Intra</option>
                                            <option selected>Extra</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="CuraBautismo">Sacerdote responsable del matrimonio: </label>
                                    <input type="text" name="PARROCO" class="form-control" value="{{old('PARROCO')}}"  required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn btn-primary" value="Crear">
                                    <button type="reset" class="btn btn-default" id="clear">Limpiar</button>
                                    <a type="button" class="btn btn-default" href="{{url('adminpage/ArchivoParroquial/RegistrosMatrimoniales')}}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection