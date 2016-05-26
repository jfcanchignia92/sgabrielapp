<html>
<head>
    <title>San Gabriel de Los Chillos</title>
    <link rel="icon" type="image/png" href="{{url('images/sgabriel2.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/footer-distributed-with-address-and-phones.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    <!--font-Awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!--<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">-->
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
    <script src="{{url('js/jquery.event.move.js')}}"></script>
    @yield('header')
</head>
<body>
<header class="header-bg">
    <div class="container">
        <br><br><br><br><br><br><br>
        <div class="row header">
            <div class="col-md-2"><img class="logo" src="{{url('images/sgabriel2.png')}}"></div>
            <div class="col-md-10">
                <h1>Parroquia Cat&oacute;lica</h1>
                <h1>San Gabriel de los Chillos</h1>
                <h2>"La verdad engendra verdad, y Dios es verdad; el amor engendra vida, y Dios es vida; el Se&ntildeor crea amor y el amor es el milagro."</h2></p>
            </div>
        </div>
        <br>
    </div>
</header>
@yield('menu')
<br>
<span class="ir-arriba"><p class="arrow">^</p><p>Ir Arriba</p></span>
@yield('content')
<br>
<br>
<footer class="footer-distributed">

    <div class="footer-left">

        <h3>Parroquia<span> San Gabriel de los Chillos</span></h3>

        <p class="footer-links">
            <a href="">Inicio</a>
            -
            <a href="{{url('ministerios')}}">Ministerios</a>
            -
            <a href="{{url('online')}}">Servicios Online</a>
            <br>
            <a href="{{url('acerca')}}">Acerca de la Parroquia</a>
            -
            <a href="{{url('noticias')}}">Noticias</a>
            -
            <a href="{{url('contactenos')}}">Contactenos</a>
        </p>
        <br><br>

    </div>

    <div class="footer-center">

        <div>
            <a href="{{url('contactenos')}}"><i class="fa fa-map-marker"></i></a>
            <p><span>Av. Amazonas y Segunda Transversal</span><span>San Rafael, Valle de los Chillos</span> Quito - Ecuador</p>
        </div>

        <div>
            <a href="http://www.facebook.com"><i class="fa fa-laptop"></i></a>
            <p><a href="{{\App\InformacionParroquial::find(1)->INF_FACEBOOK}}">Siguenos en Facebook</a></p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>{{\App\InformacionParroquial::find(1)->INF_TELEFONO}}</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:{{\App\InformacionParroquial::find(1)->INF_EMAIL}}">{{\App\InformacionParroquial::find(1)->INF_EMAIL}}</a></p>
        </div>

    </div>

    <div class="footer-right">
        <p class="footer-company-about">
            <span>Enlaces de Interes</span>
            <div class="sponsor"><a href="http://www.arquidiocesisdequito.com.ec/" target="_blank"><img src="{{url('images/Arquidiosesis.jpg')}}"></a></div>
            <div class="sponsor"><a href="http://www.conferenciaepiscopal.ec" target="_blank"><img src="{{url('images/Conferencia.jpg')}}"></a></div>
            <div class="sponsor"><a href="http://w2.vatican.va/content/vatican/es.html" target="_blank"><img src="{{url('images/Papado.jpg')}}"></a></div>
        </p>
    </div>
    <p class="footer-company-name">Parroquia San Gabriel de los Chillos &copy; 2016<br>Se recomienda el uso de <a href="https://www.google.es/chrome/browser/desktop/" target="_blank">Google Chrome</a> para este sitio.</p>
</footer>
</body>
</html>