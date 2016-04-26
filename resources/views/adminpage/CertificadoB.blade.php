<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Certificado</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br>
<div class="content-wrapper">
    <div class="inner-container container">
        <div class="row">
            <div class="blog-info col-md-12">
                <div class="box-content">
                    <div class="row ptitle">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h2 class="blog-title">Arquidiosesis de Quito</h2>
                            <h2 class="blog-title">Parroquia "San Gabriel de los Chillos"</h2>
                        </div> <!-- /.logo -->
                        <div class="col-md-3"></div>
                    </div>
                    <br><br>
                    <div class="row ctitle">
                        <h2 class="blog-title">CERTIFICADO DE BAUTISMO</h2>
                    </div>
                    <div class="row date">
                        <h3><b>Quito a, {{date("d")}} de {{date("F")}} del {{date("y")}}</b></h3>
                    </div>
                    <br>
                    <p>Yo, el infrascrito, certifico en forma legal, a peticion de la parte interesada que en el Tomo #{{$RB->RGT_TOMO}} de Partidas Bautismales de este archivo parroquial, pagina #{{$RB->RGT_PAGINA}}, se halla inscrita una con los siguientes datos: </p>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <p>Partida Nro : {{$RB->RGT_NUMERO}}</p>
                            <p>Nota Marginal: </p>
                            <br>
                        </div>
                        <div class="col-md-10">
                            <p>El dia {{$RB->RGT_FECHA}} del mes de Agosto del a&ntildeo del Se&ntildeor 2016, en la Iglesia Parroquial San Gabriel de los Chillos, el padre Elias Ontaneda bautizo solemnemente a Federico Antonio Diaz Carrasco, nacido el 05 de Abril de 1997; hijo de MArco Diaz y Margarita Carrasco feligreses de esta parroquia.<br><br>Fueron sus padrinos Pepito Focas y Maria Pelote, a quienes se les advirtio sus obligaciones y parentesco espiritual.</p><br>
                            <p>Son datos fielmente tomados del original, al que me remito en caso necesario.</p>
                        </div>
                    </div>

                    <br><br>
                    <p>Lo certifico</p>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <p>____________________________</p>
                            <p>Padre {{$IP->INF_PARROCO}}</p>
                        </div>
                        <div class="col-md-6">
                            <p>____________________________</p>
                            <p>Sello Parroquial</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="blog-meta">Este documento no es valido sin la firma y el sello de la Parroquia</span>
                        </div>
                        <div class="col-md-6">
                            <span class="blog-meta">Av. Amazonas y 2da Transversal - Telf:. 2863-757</span>
                        </div>
                    </div>
                </div>
            </div> <!-- /.blog-info -->
        </div> <!-- /.row -->
    </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->
</body>
</html>