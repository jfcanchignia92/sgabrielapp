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
                                    <ul class="dropdown-menu" role="menu">
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
        <h3>Ministerios</h3>
        <div class="alert alert-info" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Esta pagina le permite gestionar los ministerios o servicios que existen en la parroquia</p></div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar ministerio</button>
        <!-- Modal Create-->
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
                            Nuevo Ministerio
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form role="form" method="POST" action="{{ url('adminpage/Ministerios') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="Nombre">Nombre: </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required/>
                            </div>
                            <div class="form-group">
                                <label for="Descripcion">Descripcion: </label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                            </div>
                            <div class="form-group">
                                <label> Imagen Principal: </label>
                                <div>
                                    <input type="file" class="form-control" id="imagen" name="imagen" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Informacion Completa: </label>
                                <div>
                                    <textarea class="summernote" id="informacion" name="informacion" required></textarea>
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
        <!-- Success Message-->
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
        <!-- Table -->
        <div class="table-responsive">
            <br>
            <br>
            <table id='ministerios' class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                <a hidden>{{$num = $ministerios->count()}}</a>
                <a hidden>{{$var = $num-1}}</a>
                @foreach ($ministerios as $ministerio)
                <tr>
                    <td>{{$num-$var}}</td>
                    <a hidden>{{$var= $var-1}}</a>
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
                        <div class="modal fade modal-wide" id="modalInfo{{$ministerio->MNT_ID}}" tabindex="-1" role="dialog"
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
                    <td>
                        <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateModal{{$ministerio->MNT_ID}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
                        <!-- Modal Update-->
                        <div class="modal fade modal-wide" id="updateModal{{$ministerio->MNT_ID}}" tabindex="-1" role="dialog"
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
                                            Modificar: {{$ministerio->MNT_NOMBRE}}
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <form role="form" method="POST" action="{{ url('adminpage/Ministerios/'.$ministerio->MNT_ID)}}" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="Nombre">Nombre: </label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" required value="{{$ministerio->MNT_NOMBRE}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="Descripcion">Descripcion: </label>
                                                <textarea class="form-control" id="descripcion" name="descripcion" required>{{$ministerio->MNT_DESCRIPCION}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label> Imagen Principal: </label>
                                                <div>
                                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                                    <output id="list"><img class="thumbnail" src="../../public/images/{{$ministerio->MNT_IMG}}"></output>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Informacion Completa: </label>
                                                <div>
                                                    <textarea class="summernote" id="informacion" name="informacion" required>{!!$ministerio->MNT_INFORMACION!!}</textarea>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete-->
                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$ministerio->MNT_ID}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
                        <div class="modal fade" id="deleteModal{{$ministerio->MNT_ID}}" tabindex="-1" role="dialog"
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
                                            Eliminar Ministerio: {{$ministerio->MNT_NOMBRE}}
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <form action="{{ url('adminpage/Ministerios/'.$ministerio->MNT_ID)}}" method="POST" >
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
    <footer class="footer"><div class="alert"></div></footer>
    <script>
        document.getElementById('list').empty();
        function archivo(evt) {
            var files = evt.target.imagen; // FileList object
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Insertamos la imagen
                        document.getElementById("list").empty();
                        document.getElementById("list").innerHTML = ['<img class="thumbnail" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);

                reader.readAsDataURL(f);
            }
        }
        document.getElementById('imagen').addEventListener('change', archivo, false);
    </script>
@endsection
