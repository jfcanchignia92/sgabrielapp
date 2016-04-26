<!DOCTYPE html>
<html>
<head>
    <title>San Gabriel de Los Chillos</title>
    <link rel="icon" type="image/png" href="../../public/images/sgabriel2.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../public/css/footer-distributed-with-address-and-phones.css" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="../../public/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
    <!--font-Awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.ir-arriba').click(function(){
                $('body, html').animate({
                    scrollTop: '0px'
                }, 300);
            });

            $(window).scroll(function(){
                if( $(this).scrollTop() > 5 ){
                    $('.ir-arriba').slideDown(300);
                } else {
                    $('.ir-arriba').slideUp(300);
                }
            });

        });
    </script>
</head>
<body>
<header class="header-bg">
    <div class="container">
        <br><br><br><br><br><br><br>
        <div class="row header">
            <div class="col-md-2"><img class="logo" src="../images/sgabriel2.png"></div>
            <div class="col-md-10">
                <h1>Parroquia Catolica</h1>
                <h1>San Gabriel de los Chillos</h1>
                <h2>"La verdad engendra verdad, y Dios es verdad; el amor engendra vida, y Dios es vida; el Se&ntildeor crea amor y el amor es el milagro."</h2></p>
            </div>
        </div>
        <br>
    </div>
</header>
<!-- section MENU -->
<div class="container">
    <div class="row h_menu">
        <nav class="navbar navbar-default navbar-left" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="../home">Inicio</a></li>
                    <li class="active"><a href="../ministerios">Servicios Parroquiales</a></li>
                    <li><a href="../online">Servicios Online</a></li>
                    <li><a href="../acerca">Acerca de la Parroquia</a></li>
                    <li><a href="../noticia">Noticias</a></li>
                    <li><a href="../contactenos">Contactenos</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<!-- endsection MENU-->
<span class="ir-arriba"><p class="arrow">^</p><p>Ir Arriba</p></span>
<!-- section CONTENT -->
<div class="main_bg"><!-- start main -->
    <div class="container">
        <br>
        <br>
        <ol class="breadcrumb">
            <b>Usted esta aqui: &nbsp;</b>
            <li><a href="../home">Inicio</a></li>
            <li><a href="../ministerios">Servicios Parroquiales</a></li>
            <li class="active">{{$ministerio->MNT_NOMBRE}}</li>
        </ol>
        <div class="row">
                <h1>{{$ministerio->MNT_NOMBRE}}</h1>
                <br>
                <div><img src="../../public/images/{{$ministerio->MNT_IMG}}"></div>
                </br>
                </br>
                <div>{!!$ministerio->MNT_INFORMACION!!}</div>
                @if($ministerio->MNT_ID ==1)
                    <div class="read_more">
                        <a href="../online/Certificados" class="fa-btn btn-1 btn-1e">Obten tu Certificado</a>
                    </div>
                @endif
                @if($ministerio->MNT_ID ==5)
                    <div class="read_more">
                        <a href="../online/Reservas" class="fa-btn btn-1 btn-1e">Reserva tu lugar</a>
                    </div>
                @endif
        </div>
    </div>
</div>
<!-- endsection CONTENT -->
<br>
<br>
<footer class="footer-distributed">

    <div class="footer-left">

        <h3>Parroquia<span> San Gabriel de los Chillos</span></h3>

        <p class="footer-links">
            <a href="home">Inicio</a>
            -
            <a href="ministerios">Ministerios</a>
            -
            <a href="online">Servicios Online</a>
            <br>
            <a href="acerca">Acerca de la Parroquia</a>
            -
            <a href="noticia">Noticias</a>
            -
            <a href="contactenos">Contactenos</a>
        </p>
        <br><br>

    </div>

    <div class="footer-center">

        <div>
            <a href="contactenos"><i class="fa fa-map-marker"></i></a>
            <p><span>Av. Amazonas y Segunda Transversal</span><span>San Rafael, Valle de los Chillos</span> Quito - Ecuador</p>
        </div>

        <div>
            <a href="http://www.facebook.com"><i class="fa fa-phone"></i></a>
            <p><a href="http://www.facebook.com">Siguenos en Facebook</a></p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>(02) 2863757</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">sgabrielchillos@gmail.com</a></p>
        </div>

    </div>

    <div class="footer-right">
        <p class="footer-company-about">
            <span>Enlaces de Interes</span>
        <div class="sponsor"><a href="http://www.arquidiocesisdequito.com.ec/"><img src="../../public/images/Arquidiosesis.jpg"></a></div>
        <div class="sponsor"><a href="http://www.conferenciaepiscopal.ec"><img src="../../public/images/Conferencia.jpg"></a></div>
        <div class="sponsor"><a href="http://w2.vatican.va/content/vatican/es.html"><img src="../../public/images/Papado.jpg"></a></div>
        </p>
    </div>
    <p class="footer-company-name">Parroquia San Gabriel de los Chillos &copy; 2016</p>
</footer>
</body>
</html>