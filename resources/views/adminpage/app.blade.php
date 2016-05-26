<!DOCTYPE html>
<html lang="es">
<head>
	<title>AdminPage - San Gabriel de los Chillos</title>
	<link rel="icon" type="image/png" href="{{url('images/sgabriel2.png')}}"/>
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!--font-Awesome-->
	<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<!-- include jquery -->
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<!-- include libraries BS3 -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- include summernote -->
	<link rel="stylesheet" href="{{url('css/summernote.css')}}">
	<script type="text/javascript" src="{{url('js/summernote.js')}}"></script>
	<script type="text/javascript" src="{{url('js/summernote-es-ES.js')}}"></script>
	<!-- include dataTable -->
	<link rel="stylesheet" href="{{url('css/jquery.dataTables.min.css')}}"/>
	<script type="text/javascript" src="{{url('js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.summernote').summernote({
				height: 200,
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
				"ordering": false,
				"lengthMenu": [[ 10, -1], [ 10, "Todos"]],
				"language": {
					"url": "{{url('js/Spanish.json')}}"
				}
			} );
			$('#reservas').DataTable( {
				"ordering": true,
				"lengthMenu": [[ 10,20, -1], [ 10,20, "Todos"]],
				"language": {
					"url": "{{url('js/Spanish.json')}}"
				}
			} );
		});
	</script>
	<script type="text/javascript">
		$("#alerta").ready(function() {
			setTimeout(function() {
				$("#alerta").fadeOut(5000);
			},8000);
		});
	</script>
	<link rel="stylesheet" href="{{url("css/adminpage.css")}}">
	@yield('header')
</head>
<body>
	@yield('menu')
	@yield('content')
</body>
</html>
