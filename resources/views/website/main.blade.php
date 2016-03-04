<html>
<head>
    <title>San Gabriel de Los Chillos</title>
    <link rel="icon" type="image/png" href="../public/images/sgabriel2.png"/>
    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="../public/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <!--font-Awesome-->
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
                    "2016-02-11": {}}
            });
        });
    </script>
    <link href="../public//css/responsive-slider.css" rel="stylesheet" media="screen">
    <script src="../public/js/jquery.event.move.js"></script>
    <script src="../public/js/responsive-slider.js"></script>
    <script>
        $( document ).ready( function() {
            $('.responsive-slider').responsiveSlider({
                autoplay: true,
                interval: 5000,
                transitionTime: 300
            });
        });
    </script>
</head>
<body>
<div class="header_bg">
    <div class="container">
        <div class="row header">
            <div class="logo navbar-left">
                <p class="main_img"><a href="home"><img src="../public/images/sgabriel2.png"/></a></p>
			    <h1><a href="home">Parroquia Eclesi&aacutestica</a></h1>
                <h1><a href="home">"San Gabriel de los Chillos"</a></h1>
			    <h2>"La verdad engendra verdad, y Dios es verdad; el amor engendra vida, y Dios es vida; el Se&ntildeor crea amor y el amor es el milagro."</h2></p>
            </div>
        </div>
    </div>
    </div>
@yield('menu')
<br>
@yield('content')
<br>
<br>
<footer>
        <div class="footer_bg"><!-- start footer -->
            <div class="container">
                <div class="row  footer">
                    <h3>Somos parte de una Gran Iglesia</h3>
                    <br>
                    <div class="col-md-4 sponsor"><a href="http://www.arquidiocesisdequito.com.ec/"><img src="../public/images/Arquidiosesis.jpg"></a></div>
                    <div class="col-md-4 sponsor"><a href="http://www.conferenciaepiscopal.ec"><img src="../public/images/Conferencia.jpg"></a></div>
                    <div class="col-md-4 sponsor"><a href="http://w2.vatican.va/content/vatican/es.html"><img src="../public/images/Papado.jpg"></a></div>
                    <br>
                    <div class="copy text-center">
                        <p class="link">
                            <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
                            <br />
                            <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">San Gabriel Web Page</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons CC BY-SA 4.0</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>