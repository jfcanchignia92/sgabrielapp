Estimado {{$nombre}}:
Ha realizado una reserva para la Sala de Oraci&oacute;n Perpetua de esta parroquia en los siguientes horarios:

@foreach($horarios as $horario)
    <p>Dias {{$horario->HRO_DIA}}  - Hora: de {{$horario->HRO_HORAINICIO}} a {{$horario->HRO_HORAFIN}} </p>
@endforeach