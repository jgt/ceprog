<!DOCTYPE html>

<!-- El template.login es el cuerpo html en donde se incluyen todas las vistas del home.

	todas las vistas del home extienden de este template, las vistas son las sigueintes.

	*welcome
	*inscripcionOnline
	*resolicitud

	En este template se inserta el link del framework bootstrap y el script del framework jquery


 -->

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Portal UC</title>
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	

</head>
<body>
	
	@include('flash::message')

	
	<div class="contenedor">

	<header>
		
	</header>

	<section>
		
		@yield('content')

	</section>


	<footer>
		
	@yield('footer')

	</footer>

	</div>

	
	<!-- Scripts -->
	<script src="{{ asset('/js/all.js') }}"></script>

	@yield('scripts')

	@include('script.flash')

	
</body>
</html>
