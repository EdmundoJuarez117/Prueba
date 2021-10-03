<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="{{ asset('favicon.ico') }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- ICONS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<!-- Styles app -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">




	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<script type="text/javascript">
		var appURL = "{{ config('app.url') }}";
	</script>
</head>

<body>

	<div id="app">
		@guest
		@else
		<nav class="sidebar sidebar-animate-left" id="mySidebar">

			<center>
				<h6 class="text-white pt-2"><small>{{ Auth::user()->email }}</small></h6>
			</center>
			<hr>

			<!-- Elements menú -->
			<ul class="accordion accordion-flush ps-0">
				<li class="sidebar-item">
					<a class="sidebar-option-sample" type="button">
						<i class="bi bi-people-fill sidebar-icon"></i>
						Alumnos
					</a>
				</li>
				<li class="sidebar-item accordion-item">
					<a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuOne">
						<i class="bi bi-people-fill sidebar-icon"></i>
						Catálogos
					</a>
					<ul id="menuOne" class="accordion-collapse collapse ps-0 sidebar-submenu">
						@can ('modalidades.index')
							<li class="accordion-body">
								<i class="bi bi-record-fill icon-submenu"></i>
								<a href="{{ route('modalidades.index') }}">Modalidades</a>
							</li>
						@endcan
						@can('planestudios.index')
						<li class="accordion-body">
							<i class="bi bi-record-fill icon-submenu"></i>
							<a href="{{ route('planestudios.index') }}">Planes de estudio</a>
						</li>
						@endcan
						@can('carreras.index')
						<li class="accordion-body">
							<i class="bi bi-record-fill icon-submenu"></i>
							<a href="{{ route('carreras.index') }}">Carreras</a>
						</li>
						@endcan
						@can('escalaevals.index')
						<li class="accordion-body">
							<i class="bi bi-record-fill icon-submenu"></i>
							<a href="{{ route('escalaevals.index') }}">Modalidades de carrera</a>
						</li>
						@endcan
					</ul>
				</li>

				<li class="sidebar-item">
					<a class="sidebar-option-sample" type="button" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();"
					>
						<i class="bi bi-box-arrow-right sidebar-icon"></i>
						Cerrar sesión
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</a>
				</li>

			</ul>
			<!--  -->

		</nav>

		@endguest

		@guest
			<div class="container">
				@yield('content')
			</div>
		@else
		<main id="main" class="page-content main-animate-right">
			<div id="overlay" class="overlay"></div>

			<nav class="navbar navbar-expand-lg py-md-0 nav-in-main">
				<button id="btnSidebar" class="btn rounded-0 h-100 py-2 btn-collapse text-white">
					<i class="bi bi-filter-left"></i>
				</button>
				<div class="mx-auto">
					<h6 class="p-1">{{ config('app.name', '') }}</h6>
				</div>
			</nav>

			<div class="container py-4">
				@yield('content')
			</div>

		</main>
		@endguest


	</div>
	<!-- Scripts -->

	<script src="{{ asset('js/app.js') }}" defer></script>
	@guest
	@else
		<script src="{{ asset('js/sidebar.js') }}"></script>
	@endguest


</body>
</html>
