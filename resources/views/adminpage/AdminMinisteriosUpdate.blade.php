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
                            <li><a href="{{url('admipage/Usuarios')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
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
                <li><a href="{{url('adminpage/Ministerios')}}">Ministerios</a></li>
                <li class="active">Modificar Ministerio</li>
            </ol>
        </div>
        <h4 class="col-md-12">Modificar Ministerio: {{$ministerio->MNT_NOMBRE}}</h4><br><br>
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
        <form role="form" method="POST" action="{{ url('adminpage/Ministerios/'.$ministerio->MNT_ID)}}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Nombre">Nombre: </label>
                        <input type="text" class="form-control" id="nombre" name="MNT_NOMBRE" required value="{{$ministerio->MNT_NOMBRE}}"/>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Descripcion: </label>
                        <textarea class="form-control" id="descripcion" name="MNT_DESCRIPCION" required>{{$ministerio->MNT_DESCRIPCION}}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Imagen Principal: </label>
                        <div>
                            <p>Imagen Actual</p>
                            <output id="list"><img class="thumbnail" src="{{url('images/ministerios/'.$ministerio->MNT_IMG)}}"></output>
                            <div class="alert alert-success">
                                <p>Para poder visualizar correctamente la imagen procure que esta no sea demasiado grande!</p>
                            </div>
                            <input type="file" class="form-control" id="imagen" name="MNT_IMG">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Informacion Completa: </label>
                        <div>
                            <textarea class="summernote" id="informacion" name="MNT_INFORMACION" required>{!!$ministerio->MNT_INFORMACION!!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <a type="button" class="btn btn-default" href="{{url('adminpage/Ministerios')}}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div><br><br><div></div>
@endsection