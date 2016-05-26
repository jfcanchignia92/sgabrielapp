<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{$data->APELLIDO1}} {{$data->APELLIDO2}} {{$data->NOMBRE1}} {{$data->NOMBRE2}}</title>
    <link href="{{url('css/style_pdf.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<header class="clearfix">
    <table>
        <tr>
            <th>
                <div id="logo">
                    <img src="{{url('images/logocert.jpg')}}">
                </div>
            </th>
            <th class="separador_header"> </th>
            <th>
                <div id="company">
                    <h2 class="name">Arquidi&oacute;sesis de Quito</h2>
                    <h2 class="name">Parroquia "San Gabriel de los Chillos"</h2>
                </div>
            </th>
        </tr>
    </table>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="invoice">
            <br>
            <h1>CERTIFICADO DE BAUTISMO</h1>
        </div>
    </div>
    <div class="date">
        <h3><b>{{$date}}</b></h3>
    </div>
    <div class="content">
        <p>Yo, el infrascrito, certifico en forma legal, a petici&oacute;n de la parte interesada que en el Tomo Nro {{$data->RGT_TOMO}} de Partidas Bautismales de este Archivo Parroquial, P&aacute;gina Nro {{$data->RGT_PAGINA}}, se halla inscrita una con los siguientes datos: </p>
        <div class="row">
            <div class="col-md-2">
                <p>Partida Nro : {{$data->RGT_NUMERO}}</p>
                <p>Nota Marginal: _________</p>
                <br>
            </div>
            <div class="col-md-10">
                <p>El d&iacute;a {{$data->RGT_FECHA[2]}} del mes de {{$data->RGT_FECHA[1]}} del a&ntilde;o del Se&ntilde;or {{$data->RGT_FECHA[0]}}, en la Iglesia Parroquial "San Gabriel de los Chillos", el padre {{$data->PARROCO}} bautiz&oacute; solemnemente a {{$data->NOMBRE1}} {{$data->NOMBRE2}} {{$data->APELLIDO1}} {{$data->APELLIDO2}}, nacido(a) en {{$data->CIUDAD}} el {{$data->FECHA_NACIMIENTO}}; hijo(a) de {{$data->PADRE}} y {{$data->MADRE}} feligreses de esta parroquia.
                    <br><br>Fueron sus padrinos {{$data->PADRINO}} y {{$data->MADRINA}}, a quienes se les advirti&oacute; sus obligaciones y parentesco espiritual.</p><br>
                <p>Son datos fielmente tomados del original, al que me remito en caso necesario.</p>
            </div>
        </div>
        <p>Lo certifica</p>
        <br><br>
        <table>
            <tr>
                <th>
                    <div>
                        <p>____________________________</p>
                        <p class="desc">f: Padre {{$parroco}}</p>
                    </div>
                </th>
                <th class="separador"> </th>
                <th>
                    <div>
                        <p>____________________________</p>
                        <p class="desc">Sello Parroquial</p>
                    </div>
                </th>
            </tr>
        </table>
    </div>
    <br><br><br>
    <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Este documento no es v&aacute;lido sin la firma y el sello de la Parroquia</div>
    </div>
</main>
<footer>
    <div id="company">
        <div>Av. Amazonas y 2da. Transversal - Telf.: 2863-757</div>
        <div>sgabrielchillos@gmail.com</div>
    </div>
</footer>
</body>
</html>