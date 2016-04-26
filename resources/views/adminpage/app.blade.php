<!DOCTYPE html>
<html lang="es">
<head>
	<title>AdminPage - San Gabriel de los Chillos</title>
	<link rel="icon" type="image/png" href="../../public/images/sgabriel2.png"/>
	<!-- Bootstrap --><!--
	<link href="../public/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="../public/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!--<link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" /> -->
	<!-- start plugins --><!--
	<script type="text/javascript" src="../public/js/jquery.min.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../public/js/modernizr.custom.28468.js"></script>
	<link rel="stylesheet" href="../public/fonts/css/font-awesome.min.css"> -->
	<!--font-Awesome-->
	<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<!-- include jquery -->
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<!-- include libraries BS3 -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- include summernote -->
	<link rel="stylesheet" href="../../public/css/summernote.css">
	<script type="text/javascript" src="../../public/js/summernote.js"></script>
	<script type="text/javascript" src="../../public/js/summernote-es-ES.js"></script>
	<!-- include dataTable -->
	<link rel="stylesheet" href="../../public/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" href="../../public/css/dataTables.bootstrap.min.css"/>
	<script type="text/javascript" src="../../public/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="../../public/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.summernote').summernote({
				height: 100,
				tabsize: 2,
				lang: 'es-ES'
			});
			$('.summernote1').summernote({
				height: 400,
				toolbar: false,
				tabsize: 2,
				lang: 'es-ES'
			});
			$('#ministerios').DataTable( {
				"lengthMenu": [[5, 10, -1], [5, 10, "Todos"]],
				"language": {
					"url": "../../public/js/Spanish.json"
				}
			} );
		});
	</script>
	<style>
		body{
			padding-top: 70px;
		}
		.modal-wide .modal-dialog {
			width: 80%;
		}
		.thumb {
			height: 293px;
			width: 350px;
			border: 1px solid #000;
			margin: 10px 5px 0 0;
		}
		.logo{
			height: 95%;
			padding: 0;
			margin: 0;
		}
		.sesion{
			padding-right: 20px;
		}

	</style>
	<script type="text/javascript">
		$("#alerta").ready(function() {
			setTimeout(function() {
				$("#alerta").fadeOut(5000);
			},8000);
		});
	</script>
</head>
<body>
	@yield('menu')
	@yield('content')
</body>
</html>
