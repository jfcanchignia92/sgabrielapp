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
            <ol class="breadcrumb col-md-8">
                <b>Usted esta aqui: &nbsp;</b>
                <li><a href="{{url('adminpage/Inicio')}}">Inicio</a></li>
                <li><a href="{{url('adminpage/Boletin')}}">Bolet&iacute;n Informativo</a></li>
                <li class="active">Nuevo Bolet&iacute;n</li>
            </ol>
        </div>
        <h4 class="col-md-12">Nuevo Bolet&iacute;n </h4><br>
        @if($errors->any())
            <br><div>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p>Por favor corrige los siquientes errores!</p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#vacio" aria-controls="vacio" role="tab" data-toggle="tab">Solo Imagen</a></li>
                <li role="presentation"><a href="#detalles" aria-controls="detalles" role="tab" data-toggle="tab">Con Detalles</a></li>

            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="vacio">
                    <form role="form" method="POST" action="{{ url('adminpage/Boletin') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row" hidden>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombre">Tipo: </label>
                                    <select name="NT_TIPO" class="form-control" id="tipo">
                                        <option value="vacio" selected>Solo Imagen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Descripcion">Disponible en la P&aacute;gina Principal: </label>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="NT_VISIBLE" value="SI" checked readonly>Si</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Imagen a mostrar :</label>
                                    <div class="alert alert-success">
                                        <p>Para poder visualizar correctamente la imagen es necesario que su imagen sea tipo rectangular con el lado horizontal mas grande que el lado vertical.<br>Se recomienda una medida de 800x350</p>
                                    </div>
                                    <div>
                                        <input type="file" class="form-control" id="imagen" name="NT_IMAGEN" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a type="button" class="btn btn-default" href="{{url('adminpage/Boletin')}}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="detalles">
                    <form role="form" method="POST" action="{{ url('adminpage/Boletin') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row" hidden>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombre">Tipo: </label>
                                    <select name="NT_TIPO" class="form-control" id="tipo">
                                        <option value="detalle" selected>Con Detalles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Descripcion">Disponible en la P&aacute;gina Principal: </label>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="NT_VISIBLE" value="SI" checked readonly>Si</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombre">T&iacute;tulo: </label>
                                    <input type="text" class="form-control" id="titulo" name="NT_TITULO" required/>
                                </div>
                                <div class="form-group">
                                    <label> Imagen a mostrar : (Opcional)</label>
                                    <div class="alert alert-success">
                                        <p>Si no elige una imagen, se pondra una por defecto.</p>
                                        <p>Para poder visualizar correctamente la imagen es necesario que su imagen sea tipo rectangular con el lado horizontal mas grande que el lado vertical.<br>Se recomienda una medida de 800x350</p>
                                    </div>
                                    <div>
                                        <input type="file" class="form-control" id="imagen" name="NT_IMAGEN">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Contenido de la noticia: </label>
                                    <div>
                                        <textarea class="summernote" id="informacion" name="NT_CONTENIDO" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a type="button" class="btn btn-default" href="{{url('adminpage/Boletin')}}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
        <div><br><br><br></div>
    </div>
@endsection