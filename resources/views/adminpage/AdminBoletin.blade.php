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
                <li class="active">Bolet&iacute;n Informativo</li>
            </ol>
            <div class="col-md-5"> </div>
            <div class="col-md-1"><a href="../Inicio" class="btn btn-info"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda</a></div>
        </div>
        <h3>Bolet&iacute;n Informativo</h3>
        <div class="alert alert-info" role="alert"><p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Esta pagina le permite gestionar los boletines que aparecen en la p&aacute;gina principal de la parroquia.</p>
        </div>
        <a href="{{url('adminpage/Boletin/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Bolet&iacute;n</a>
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
                <table id="ministerios" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha Publicaci&oacute;n</th>
                        <th>T&iacute;tulo</th>
                        <th>Contenido</th>
                        <th>Tipo</th>
                        <th>Visible en Pag. Principal</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <a hidden>{{$num = count($boletines)}}</a>
                    <a hidden>{{$var = $num-1}}</a>
                    @foreach ($boletines as $boletin)
                        <tr>
                            <td>{{$num-$var}}</td>
                            <a hidden>{{$var= $var-1}}</a>
                            <td>{{$boletin->NT_FECHA}}</td>
                            <td><b>@if($boletin->NT_TITULO != null){{$boletin->NT_TITULO}}@else Sin T&iacute;tulo @endif</b></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo{{$boletin->NT_ID}}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Ver Informacion</button>
                                <div class="modal fade modal-wide" id="modalInfo{{$boletin->NT_ID}}" tabindex="-1" role="dialog"
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
                                                    Contenido del Bolet&iacute;n
                                                </h4>
                                            </div>
                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                @if($boletin->NT_CONTENIDO != null)<div>{!!$boletin->NT_CONTENIDO!!}</div>@else<p>Sin Contenido</p>@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>@if($boletin->NT_TIPO == 'vacio') Solo Imagen @else Con Detalles @endif</td>
                            <td>{{$boletin->NT_VISIBLE}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalImage{{$boletin->NT_ID}}"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Ver imagen</button>
                                <div class="modal fade" id="modalImage{{$boletin->NT_ID}}" tabindex="-1" role="dialog"
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
                                                    Imagen del Bolet&iacute;n
                                                </h4>
                                            </div>
                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                @if($boletin->NT_IMAGEN !=null)<form role="form"><div class="form-group"><img src="{{url('images/noticias/'.$boletin->NT_IMAGEN)}}"></div></form>@else <p>Sin Imagen</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($boletin->NT_TIPO == 'detalle') <a href="{{url('adminpage/Boletin/'.$boletin->NT_ID.'/edit')}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</a>@endif
                                <!-- Modal Delete-->
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$boletin->NT_ID}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
                                <div class="modal fade" id="deleteModal{{$boletin->NT_ID}}" tabindex="-1" role="dialog"
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
                                                    Eliminar boletin:
                                                </h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <form action="{{ url('adminpage/Boletin/'.$boletin->NT_ID)}}" method="POST" >
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
    </div>
@endsection