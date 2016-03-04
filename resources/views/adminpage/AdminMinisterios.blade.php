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
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> La Parroquia <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../adminpage/Ministerios">Ministerios</a></li>
                                    <li><a href="#">Acerca de la Parroquia</a></li>
                                    <li><a href="#">Contactos</a></li>
                                    <li><a href="#">Noticias</a></li>
                                    <li><a href="#">Eventos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
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
        <blockquote><h2>La Parroquia</h2></blockquote>
        <h3>Ministerios</h3>
        <div class="alert alert-info" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Esta pagina le permite gestionar los ministerios o servicios que existen en la parroquia</p></div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar ministerio</button>
        <!-- Modal -->
        <div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog"
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
                            Nuevo Ministerio
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form role="form" method="POST" action="">
                            <div class="form-group">
                                <label for="Nombre">Nombre: </label>
                                <input type="text" class="form-control" id="nombre"/>
                            </div>
                            <div class="form-group">
                                <label for="Descripcion">Descripcion: </label>
                                <textarea class="form-control" id="descripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <label> Imagen Principal: </label>
                                <div>
                                    <input type="file" class="form-control" name="file" id="imagen">
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Informacion Completa: </label>
                                <div>
                                    <textarea class="summernote" id="informacion"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Crear
                            </button>
                        </form>
                    </div>
                </div>
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
                @foreach ($ministerios as $ministerio)
                <tr>
                    <td>{{$ministerio->MNT_ID}}</td>
                    <td><b>{{$ministerio->MNT_NOMBRE}}</b></td>
                    <td><p>{{$ministerio->MNT_DESCRIPCION}}</p></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalImage{{$ministerio->MNT_ID}}"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Ver imagen</button>
                        <div class="modal fade" id="modalImage{{$ministerio->MNT_ID}}" tabindex="-1" role="dialog"
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
                                            Imagen Principal: {{$ministerio->MNT_NOMBRE}}
                                        </h4>
                                    </div>
                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <form role="form">
                                            <div class="form-group"><img src="../../public/images/{{$ministerio->MNT_IMG}}"></div>
                                        </form>
                                    </div>
                                 </div>
                            </div>
                         </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo{{$ministerio->MNT_ID}}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Ver Informacion</button>
                        <div class="modal fade" id="modalInfo{{$ministerio->MNT_ID}}" tabindex="-1" role="dialog"
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
                                            Informacion Completa: {{$ministerio->MNT_NOMBRE}}
                                        </h4>
                                    </div>
                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <form role="form">
                                            <div>{!!$ministerio->MNT_INFORMACION!!}</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
                        <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
