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
    <!-- start slider -->
    <link href="../public/css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="../public/js/modernizr.custom.28468.js"></script>
    <script type="text/javascript" src="../public/js/jquery.cslider.js"></script>
    <script type="text/javascript">
        $(function() {

            $('#da-slider').cslider({
                autoplay : true,
                bgincrement : 450
            });

        });
    </script>
    <link rel="stylesheet" href="../public/fonts/css/font-awesome.min.css">
    <!--font-Awesome-->
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header_bg">
    <div class="container">
        <div class="row header">
            <div class="logo navbar-left">
                <p class="main_img"><a href="home"><img src="../public/images/sgabriel2.png"/></a>
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
<footer>
        <div class="footer_bg"><!-- start footer -->
            <div class="container">
                <div class="row  footer">
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