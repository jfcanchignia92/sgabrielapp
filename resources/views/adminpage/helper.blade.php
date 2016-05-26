/*Ministerio*/

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

<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateModal{{$ministerio->MNT_ID}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button><br>
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

/*Controllador ministerio*
/*$ministerio = new Ministerio();
$ministerio->MNT_NOMBRE = Input::get('nombre');
$ministerio->MNT_DESCRIPCION = Input::get('descripcion');
$file= Input::file('imagen');
$nombre_img = $file->getClientOriginalName();
$nombre =  str_replace(' ', '', Input::get('nombre'));
$ministerio->MNT_IMG = 'image_'.$nombre;
$ministerio->MNT_INFORMACION = Input::get('informacion');
$ministerio->save();
\Storage::disk('local')->put('image_'.$nombre, \File::get($file));*/



/*$ministerio = Ministerio::find($id);
$ministerio->MNT_NOMBRE = Input::get('nombre');
$file = Input::file('imagen');
if ($file != null) {
$nombre_img = $file->getClientOriginalName();
$ministerio->MNT_IMG = $nombre_img;
}
$ministerio->MNT_INFORMACION = Input::get('informacion');
DB::table('ministerios')->where('MNT_ID', '=', $id)->update(array(
'MNT_NOMBRE' => $ministerio->MNT_NOMBRE,
'MNT_DESCRIPCION' => $ministerio->MNT_DESCRIPCION,
'MNT_IMG' => $ministerio->MNT_IMG,
'MNT_INFORMACION' => $ministerio->MNT_INFORMACION
));*/


/*informacion parroquial model*/
public function setInfoParroquiaimgsAttribute($file){
$this->attributes['INF_PARROQUIAIMGS'] = 'image_parroquia';
$nombre = 'image_parroquia';
\Storage::disk('local')->put($nombre, \File::get($file));
}


/*home slides*/
<div class="item active">
    <img data-src="holder.js/900x800/auto/#777:#777" alt="Imagen no disponible" src="{{url('images/redes.jpg')}}" data-holder-rendered="true">
    <div class="carousel-caption">
        <h3>Bienvenidos!</h3>
        <p><h5>Al sitio web de nuestra Parroquia San Gabriel de los Chillos.</h5></p>
        <a href="http://www.google.com.ec"><b><h5>Leer mas!</h5></b></a>
    </div>
</div>
<div class="item">
    <img data-src="holder.js/900x800/auto/#666:#666" alt="Imagen no disponible" src="{{url('images/ministerios/slide.jpg')}}" data-holder-rendered="true">

</div>
<div class="item">
    <img data-src="holder.js/900x800/auto/#555:#555" alt="Imagen no disponible" src="{{url('images/boletin.jpg')}}" data-holder-rendered="true">
    <div class="carousel-caption">
        <h3 style="color: #080808">Third slide label</h3>
        <p><h5 style="color: #080808">Nulla vitae elit libero, a pharetra augue mollis interdum.</h5></p>
        <a href="http://www.google.com.ec"><h5><b>Leer mas!</b></h5></a>
    </div>
</div>



/*Registros bautismales nuevo form*/
<button id="nuevo" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Registro</button>
<!-- Modal nuevo-->
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
                    Nuevo Registro Bautismal
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                @if($errors->any())
                    <div class="alerta" id="alerta">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <form id="FormNuevo" role="form" method="POST" action="{{ url('adminpage/ArchivoParroquial/RegistrosBautismales') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="PrimerNombre">Primer Nombre: </label>
                                    <input name="NOMBRE1" type="text" class="form-control" required value="{{old('NOMBRE1')}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="SegundoNombre">Segundo Nombre: </label>
                                    <input name="NOMBRE2" type="text" class="form-control" required value="{{old('NOMBRE2')}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoPaterno">Apellido Paterno: </label>
                                    <input name="APELLIDO1"type="text" class="form-control" required value="{{old('APELLIDO1')}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoMaterno">Apellido Materno: </label>
                                    <input name="APELLIDO2" type="text" class="form-control" required value="{{old('APELLIDO2')}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <div><label for="Sexo">Sexo: </label></div>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="SEXO" value="H" {{ (old('SEXO') == 'H') ? 'checked' : '' }}>Hombre</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="SEXO" value="M" {{ (old('SEXO') == 'M') ? 'checked' : '' }}>Mujer</label>
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="ciudad">Ciudad de Nacimiento: </label></div>
                                    <input type="text" name="CIUDAD" class="form-control" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                    <input type="date" name="FECHA_NACIMIENTO" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="Padre">Nombre del Padre: </label>
                                    <input name="PADRE" type="text" class="form-control" required/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madre">Nombre de la Madre: </label>
                                    <input name="MAADRE" type="text" class="form-control"  required/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="padrino">Nombre del Padrino: </label>
                                    <input name="PADRINO" type="text" class="form-control"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madrina">Nombre de la Madrina: </label>
                                    <input name="MADRINA" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del registro bautismal</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <label for="tomo">Tomo #: </label>
                                    <input name="RGT_TOMO" type="number" min="1" class="form-control" required/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="pagina">Pagina #: </label>
                                    <input name="RGT_PAGINA" type="number" min="1" class="form-control" required/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="registro">Registro #: </label>
                                    <input name="RGT_NUMERO" type="number"  class="form-control" value="{{$data['BC']}}" readonly/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                    <input name="RGT_FECHA" type="date" name="bday" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                    <input name="PARROCO" type="text" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Crear">
                    <button type="reset" id="limpiarNuevo" class="btn btn-default">Limpiar</button>
                    <button type="button"  id="CancelarNuevo" class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

/*Registros bautismales Actualizar form*/
<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
<!-- Modal Update-->
<div class="modal fade modal-wide" id="updateModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                    Modificar Registro Bautismal #: {{$RB->RGT_NUMERO}}
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form" method="POST" action="{{ url('adminpage/RegistrosB/'.$RB->RGT_NUMERO)}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="PrimerNombre">Primer Nombre: </label>
                                    <input id="Bnombre1" name="Bnombre1" type="text" class="form-control" required value="{{$RB->NOMBRE1}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="SegundoNombre">Segundo Nombre: </label>
                                    <input id="Bnombre2" name="Bnombre2" type="text" class="form-control" required value="{{$RB->NOMBRE2}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoPaterno">Apellido Paterno: </label>
                                    <input id="Bapellido1" name="Bapellido1"type="text" class="form-control" required value="{{$RB->APELLIDO1}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoMaterno">Apellido Materno: </label>
                                    <input id="Bapellido2" name="Bapellido2" type="text" class="form-control" required value="{{$RB->APELLIDO2}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div><label for="Sexo">Sexo: </label></div>
                                    @if($RB->SEXO == 'H')
                                        <div class="radio-inline">
                                            <label><input type="radio" name="sexo" value="H" checked>Hombre</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="sexo" value="M">Mujer</label>
                                        </div>
                                    @else
                                        <div class="radio-inline">
                                            <label><input type="radio" name="sexo" value="H">Hombre</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="sexo" value="M" checked>Mujer</label>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                    <input id="BfechaN" type="date" name="BfechaN" required value="{{$RB->FECHA_NACIMIENTO}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="Padre">Nombre del Padre: </label>
                                    <input id="Bpadre" name="Bpadre" type="text" class="form-control" value="{{$RB->PADRE}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madre">Nombre de la Madre: </label>
                                    <input id="Bmadre" name="Bmadre" type="text" class="form-control" value="{{$RB->MADRE}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="padrino">Nombre del Padrino: </label>
                                    <input id="Bpadrino" name="Bpadrino" type="text" class="form-control" value="{{$RB->PADRINO}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madrina">Nombre de la Madrina: </label>
                                    <input id="Bmadrina" name="Bmadrina" type="text" class="form-control" value="{{$RB->MADRINA}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del registro de bautizo</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <label for="tomo">Tomo #: </label>
                                    <input id="Btomo" name="Btomo" type="number" min="1" class="form-control" required value="{{$RB->RGT_TOMO}}"/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="pagina">Pagina #: </label>
                                    <input id="Bpagina" name="Bpagina" type="number" min="1" class="form-control" required value="{{$RB->RGT_PAGINA}}"/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="registro">Registro #: </label>
                                    <input id="Bnumero" name="Bnumero" type="number"  class="form-control" value="{{$RB->RGT_NUMERO}}" readonly/>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                    <input id="Bfecha" name="Bfecha" type="date" name="bday" required value="{{$RB->RGT_FECHA}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                    <input id="Bparroco" name="Bparroco" type="text" class="form-control" required value="{{$RB->PARROCO}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
<!-- Modal Update-->
<div class="modal fade modal-wide" id="updateModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                    Modificar Registro Bautismal #: {{$RB->RGT_NUMERO}}
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form" method="POST" action="{{ url('adminpage/ArchivoParroquial/RegistrosBautismales/'.$RB->RGT_NUMERO)}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del Bautizado</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="PrimerNombre">Primer Nombre: </label>
                                    <input name="NOMBRE1" type="text" class="form-control" required value="{{$RB->NOMBRE1}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="SegundoNombre">Segundo Nombre: </label>
                                    <input name="NOMBRE2" type="text" class="form-control" required value="{{$RB->NOMBRE2}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoPaterno">Apellido Paterno: </label>
                                    <input name="APELLIDO1"type="text" class="form-control" required value="{{$RB->APELLIDO1}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ApellidoMaterno">Apellido Materno: </label>
                                    <input name="APELLIDO2" type="text" class="form-control" required value="{{$RB->APELLIDO2}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <div><label for="Sexo">Sexo: </label></div>
                                    @if($RB->SEXO == 'H')
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="H" checked>Hombre</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="M">Mujer</label>
                                        </div>
                                    @else
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="H">Hombre</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="SEXO" value="M" checked>Mujer</label>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="Ciudad">Ciudad de Nacimiento: </label></div>
                                    <input type="text" name="CIUDAD" class="form-control" required value="{{$RB->CIUDAD}}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="FechaNacimiento">Fecha de Nacimiento: </label></div>
                                    <input type="date" name="FECHA_NACIMIENTO" class="form-control" required value="{{$RB->FECHA_NACIMIENTO}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="Padre">Nombre del Padre: </label>
                                    <input name="PADRE" type="text" class="form-control" value="{{$RB->PADRE}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madre">Nombre de la Madre: </label>
                                    <input name="MADRE" type="text" class="form-control" value="{{$RB->MADRE}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="padrino">Nombre del Padrino: </label>
                                    <input name="PADRINO" type="text" class="form-control" value="{{$RB->PADRINO}}"/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="Madrina">Nombre de la Madrina: </label>
                                    <input name="MADRINA" type="text" class="form-control" value="{{$RB->MADRINA}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informaci&oacuten del registro de bautizo</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <label for="tomo">Tomo #: </label>
                                    <input name="RGT_TOMO" type="number" min="1" class="form-control" required value="{{$RB->RGT_TOMO}}"/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="pagina">Pagina #: </label>
                                    <input name="RGT_PAGINA" type="number" min="1" class="form-control" required value="{{$RB->RGT_PAGINA}}"/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="registro">Registro #: </label>
                                    <input name="RGT_NUMERO" type="number" class="form-control" value="{{$RB->RGT_NUMERO}}" readonly/>
                                </div>
                                <div class="col-md-3 form-group">
                                    <div><label for="FechaBautismo">Fecha de Bautismo: </label></div>
                                    <input name="RGT_FECHA" type="date" name="bday" class="form-control" required value="{{$RB->RGT_FECHA}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="CuraBautismo">Sacerdote responsable del bautizo: </label>
                                    <input name="PARROCO" type="text" class="form-control" required value="{{$RB->PARROCO}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

/*Registros bautismales delete form*/
<!-- Modal Delete-->
<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
<div class="modal fade" id="deleteModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                    Eliminar Resgistro Bautismal: {{$RB->RGT_NUMERO}}
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ url()}}" method="POST" >
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

<!-- Modal Delete-->
<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$RB->RGT_NUMERO}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
<div class="modal fade" id="deleteModal{{$RB->RGT_NUMERO}}" tabindex="-1" role="dialog"
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
                    Eliminar Resgistro Bautismal: {{$RB->RGT_NUMERO}}
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ url()}}" method="POST" >
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




/*registro bautismal controller*/

/*update*/
/*
$registro = RegistroBautismal::find($id);
$registro->RGT_TOMO = Input::get('Btomo');
$registro->RGT_PAGINA = Input::get('Bpagina');
$registro->RGT_NUMERO = Input::get('Bnumero');
$registro->RGT_FECHA = Input::get('Bfecha');
$registro->FECHA_NACIMIENTO = Input::get('BfechaN');
$registro->CIUDAD = Input::get('Bcuidad');
$registro->PADRE = Input::get('Bpadre');
$registro->MADRE = Input::get('Bmadre');
$registro->PADRINO = Input::get('Bpadrino');
$registro->MADRINA = Input::get('Bmadrina');
$registro->PARROCO = Input::get('Bparroco');
$registro->SEXO = Input::get('sexo');
$registro->NOMBRE1 = Input::get('Bnombre1');
$registro->NOMBRE2 = Input::get('Bnombre2');
$registro->APELLIDO1 = Input::get('Bapellido1');
$registro->APELLIDO2 = Input::get('Bapellido2');
DB::table('registros_bautismales')->where('RGT_NUMERO', '=', $id)->update(array(
'RGT_NUMERO' => $registro->RGT_NUMERO,
'RGT_TOMO' => $registro->RGT_TOMO,
'RGT_PAGINA' => $registro->RGT_PAGINA,
'RGT_FECHA' => $registro->RGT_FECHA,
'FECHA_NACIMIENTO' => $registro->FECHA_NACIMIENTO,
'CIUDAD'=>$registro->CIUDAD,
'PADRE' => $registro->PADRE,
'MADRE' => $registro->MADRE,
'PADRINO' => $registro->PADRINO,
'MADRINA' => $registro->MADRINA,
'PARROCO' =>$registro->PARROCO,
'SEXO' => $registro->SEXO,
'NOMBRE1' => $registro->NOMBRE1,
'NOMBRE2' => $registro->NOMBRE2,
'APELLIDO1' => $registro->APELLIDO1,
'APELLIDO2' => $registro->APELLIDO2
));*/

/*create*/
/*$data = Request::all();
$rules = array(
'RGT_NUMERO' => 'numeric|required|unique:registros_bautismales,RGT_NUMERO',
'RGT_TOMO' => 'numeric|required',
'RGT_PAGINA' => 'numeric|required',
'RGT_FECHA' => 'date|required',
'NOMBRE1' => 'required',
'NOMBRE2' => 'required',
'APELLIDO1' => 'required',
'APELLIDO2' => 'required',
'FECHA_NACIMIENTO' => 'date|required',
'SEXO' => 'in:H,M|required',
'PADRE' => '',
'MADRE' => '',
'PADRINO' => '',
'MADRINA' => '',
'PARROCO' => 'required',
'CIUDAD' => 'required'
);
$v = Validator::make($data,$rules);
if($v->fails())
{
return redirect()->back()->withErrors($v->errors())->withInput(Request::all());
}
$registro =  RegistroBautismal::create($data);*/


/**evangelio del dia/
/*$url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=reading&lang=SP&content=GSP";
$h = fopen($url,"r");
while (!feof($h)) {
$evangelio .= fgets($h);
}
$url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=reading_st&lang=SP&content=PS";
$h = fopen($url,"r");
while (!feof($h)) {
$salmot .= fgets($h);
}
$url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=reading&lang=SP&content=PS";
$h = fopen($url,"r");
while (!feof($h)) {
$salmo .= fgets($h);
}*/

/*pagina de contacto*/
<div class="main_btm"><!-- start main_btm -->
    <div class="container">

        <div class="main row">

            <div class="col-md-8">
                <div class="contact-form">
                    <h2>Contactese con nosotros</h2>
                    <form method="POST" action="{{url('ContactoEnviar')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <span>Nombre</span>
                            <span><input type="username" class="form-control" name="nombre" required></span>
                        </div>
                        <div>
                            <span>e-mail</span>
                            <span><input type="email" class="form-control" name="email" required></span>
                        </div>
                        <div>
                            <span>Asunto</span>
                            <span><textarea name="mensaje" required> </textarea></span>
                        </div>
                        <div>
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Enviar"></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


/*lecturas*/
<br>
<blockquote>Lecturas del dia de hoy, {{date("d")}}/{{date("m")}}/{{date("Y")}}</blockquote>
<p class="lectura">{!! $data['TE'] !!}</p>

/*$today = date('Ymd');
$evangeliot =null;
$evangelio =null;
$salmot =null;
$salmo =null;
$url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=all&lang=SP";
$h = fopen($url,"r");
while (!feof($h)) {
$evangeliot .= fgets($h);
}*/
//$str = array('TE'=>$evangeliot/*,'E'=>$evangelio,'TS'=>$salmot,'S'=>$salmo*/);
