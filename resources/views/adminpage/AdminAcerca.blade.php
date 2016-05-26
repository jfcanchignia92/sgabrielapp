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
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> La Parroquia <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('adminpage/Ministerios')}}">Ministerios</a></li>
                                    <li><a href="{{url('adminpage/Acerca')}}">Acerca de la Parroquia</a></li>
                                    <li><a href="{{url('adminpage/Boletin')}}">Bolet&iacute;n Informativo</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('adminpage/ArchivoParroquial')}}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Archivo Parroquial</a></li>
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
            <ol class="breadcrumb col-md-6">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('adminpage/Inicio')}}">Inicio</a></li>
                <li class="active">La Parroquia</li>
                <li class="active">Acerca de la Parroquia</li>
            </ol>
            <div class="col-md-5"> </div>
            <div class="col-md-1"><a href="../Inicio" class="btn btn-info"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda</a></div>

        </div>
        <h3>Acerca de la Parroquia</h3>
        <div class="alert alert-info" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Esta pagina le permite modificar la informaci&oacute;n de la parroquia y del parroco actual.
            <br>NOTA:<br><li>La informaci&oacute;n del parroco debe estar siempre actualizada ya que los certificados parroquiales salen con el nombre del parroco actual.</li>
            <li>Los datos de correo, tel&eacute;fono tambien deben estar actualizados ya que sirven para que los feligreses esten en contacto con la parroquia.</li></p>
        </div>
        <a href="{{url('adminpage/Acerca/1/edit')}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar Informaci&oacute;n</a>
        @if(Session::has('notice'))
            <div class="alerta" id="alerta">
                <br>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="glyphicon glyphicon-info-sign"></span>
                    <strong> {{ Session::get('notice') }} </strong>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <h3>Informaci&oacute;n del P&aacute;rroco</h3>
                <div class="form-group">
                    <label for="Nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" name="INF_NOMBREPARROCO" readonly value="{{$info->INF_NOMBREPARROCO}}"/>
                </div>
                <div class="form-group">
                    <label for="Descripcion">Informaci&oacute;n: </label>
                    <textarea class="form-control" id="descripcion" name="INF_PARROCO" readonly>{{$info->INF_PARROCO}}</textarea>
                </div>
                <div class="form-group">
                    <label> Imagen Actual: </label>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalImgParroquia"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Ver</button>
                    <div class="modal fade" id="modalImgParroquia" tabindex="-1" role="dialog"
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
                                        Imagen Actual
                                    </h4>
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form role="form">
                                        <img src="{{url('images/ministerios/'.$info->INF_PARROCOIMG)}}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Informaci&oacute;n de la Parroquia</h3>
                <div class="form-group col-md-6">
                    <label for="Nombre">Correo Electr&oacute;nico: </label>
                    <input type="text" class="form-control" id="nombre" name="INF_EMAIL" readonly value="{{$info->INF_EMAIL}}"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="Nombre">Cuenta de Facebook: </label>
                    <input type="text" class="form-control" id="nombre" name="INF_FACEBOOK" readonly value="{{$info->INF_FACEBOOK}}"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="Nombre">Tel&eacute;fono: </label>
                    <input type="text" class="form-control" id="nombre" name="INF_TELEFONO" readonly value="{{$info->INF_TELEFONO}}"/>
                </div>
                <div class="form-group col-md-12">
                    <label for="Nombre">Acerca de la Parroquia: </label>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfoParroquia"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Ver</button>
                    <div class="modal modal-wide" id="modalInfoParroquia" tabindex="-1" role="dialog"
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
                                        Informaci&oacute;n Detallada
                                    </h4>
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form role="form">
                                        <div style="text-align: justify;">{!!$info->INF_PARROQUIA!!}</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection