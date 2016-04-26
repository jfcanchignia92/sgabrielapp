<html>
<head>
    <title>San Gabriel de Los Chillos</title>
    <link rel="icon" type="image/png" href="../public/images/sgabriel2.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/footer-distributed-with-address-and-phones.css" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <!--font-Awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapProp = {
                center:new google.maps.LatLng(-0.291982, -78.456773),
                zoom:17,
                mapTypeId:google.maps.MapTypeId.HYBRID
            };
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker=new google.maps.Marker({
                position:new google.maps.LatLng(-0.291982, -78.456773),
                animation:google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
            google.maps.event.addListener(marker,'click',function() {
                map.setZoom(18);
                map.setCenter(marker.getPosition());
            });
            var stvProp={
                position: new google.maps.LatLng(-0.2921519,-78.4568797)
            }
            var panorama = new google.maps.StreetViewPanorama(document.getElementById("googlePanorama"),stvProp);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <link href="../public//css/responsive-calendar.css" rel="stylesheet">
    <script src="../public/js/responsive-calendar.js"></script>
    <script type="text/javascript">
        var d = new Date();
        var year = d.getFullYear();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var fechaActual = ''+year+'-'+month+'-'+day;
        $(document).ready(function () {
            $(".responsive-calendar").responsiveCalendar({
                time: ''+year+'-'+month+'',
                events: {
                    "2016-03-02": {"number": 5, "url": "/noticia"},
                    "2016-02-26": {"number": 1, "url": "http://w3widgets.com"},
                    "2016-02-03":{"number": 1},
                    "2016-05-15":{"number": 1},
                    "2016-02-11": {}}
            });
        });
    </script>
    <script src="../public/js/jquery.event.move.js"></script>
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
            <div class="col-md-2"><img class="logo" src="images/sgabriel2.png"></div>
            <div class="col-md-10">
                <h1>Parroquia Catolica</h1>
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
            <a href="http://www.facebook.com"><i class="fa fa-phone-square"></i></a>
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
            <div class="sponsor"><a href="http://www.arquidiocesisdequito.com.ec/"><img src="../public/images/Arquidiosesis.jpg"></a></div>
            <div class="sponsor"><a href="http://www.conferenciaepiscopal.ec"><img src="../public/images/Conferencia.jpg"></a></div>
            <div class="sponsor"><a href="http://w2.vatican.va/content/vatican/es.html"><img src="../public/images/Papado.jpg"></a></div>
        </p>
    </div>
    <p class="footer-company-name">Parroquia San Gabriel de los Chillos &copy; 2016</p>
</footer>
</body>
</html>