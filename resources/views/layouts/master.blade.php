<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Dev App</title>
	@if(!strlen($seccion))
		$seccion = "dashboard";
	@endif

	<!-- Bootstrap (4) -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse skin-yellow accent-dark">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-danger navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
		<a href="/" class="nav-link">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
		<a href="#" class="nav-link">Contact</a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		
		<li class="nav-item d-none d-sm-inline-block">
		<i class="fas fa-sign-out-alt" ></i>
		<a href="{{ route('logout') }}"
		onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		Salir
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
		</li>

	</ul>


	{{-- <ul class="navbar-nav">
		<li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
		<a href="/" class="nav-link">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
		<a href="#" class="nav-link">Contact</a>
		</li>
	</ul> --}}


	
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-light-danger elevation-4">
	<!-- Brand Logo -->
	<a href="/" class="brand-link">
		<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		style="opacity: .8">
		<span class="brand-text font-weight-light">Desarrollo a la Medida</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		{{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
		<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
		<a href="#" class="d-block">Alexander Pierce</a>
		</div>
	</div> --}}

		<!-- Sidebar Menu -->
		<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
			{{-- <li class="nav-item has-treeview menu-open"> --}}

			<li class="nav-item has-treeview">
			<li class="nav-item">
				<a href="{{ route('dashboard') }}" class="nav-link 
				@if($seccion == 'dashboard')
				active 
				@endif
				">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>Dashboard</p>
				</a>
			</li>
			</li>

			<li class="nav-item has-treeview">
			<a href="#" class="nav-link
			@if($seccion == 'administracion')
			active 
			@endif
			">
				<i class="nav-icon fa fa-line-chart"></i>
				<i class="fa fa-line-chart" aria-hidden="true"></i>
				<p>
				Administración
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">

				<li class="nav-item">
				<a href="{{ route('users.index') }}" class="nav-link
				@if(($seccion == 'administracion')&&($subseccion == 'users'))
				active 
				@endif
				">
					<i class="far 
					@if(($seccion == 'administracion')&&($subseccion == 'users'))
					active fa-check-circle 
					@else
					fa-circle
					@endif
					nav-icon"></i>
					<p>Usuarios</p>
				</a>
				</li>

				<li class="nav-item">
				<a href="{{ route('permisos.index') }}" class="nav-link
				@if(($seccion == 'administracion')&&($subseccion == 'permisos'))
				active 
				@endif
				">
					<i class="far  
					@if(($seccion == 'administracion')&&($subseccion == 'permisos'))
					active fa-check-circle 
					@else
					fa-circle
					@endif
					nav-icon"></i>
					<p>Permisos</p>
				</a>
				</li>

				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 3</p>
				</a>
				</li>
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 4</p>
				</a>
				</li>
			</ul>
			</li>

			<li class="nav-item has-treeview">
			<a href="#" class="nav-link
			@if($seccion == 'pages')
			active
			@endif">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
				Pages 1
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 1</p>
				</a>
				</li>
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 2</p>
				</a>
				</li>
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 3</p>
				</a>
				</li>
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 4</p>
				</a>
				</li>
			</ul>
			</li>

			<li class="nav-item has-treeview">
			<a href="#" class="nav-link
			@if($seccion == 'pages2')
			active
			@endif">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
				Pages 2
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 1</p>
				</a>
				</li>
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 2</p>
				</a>
				</li>
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 3</p>
				</a>
				</li>
				<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>Link 4</p>
				</a>
				</li>
			</ul>
			</li>

		</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
	</aside>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<section class="content-header">
		</section>

		<section class="content">

		<div class="card">
			<div class="card-header">
			<h3 class="card-title"><h3>@yield('title')</h3></h3>

			<div class="card-tools">
				{{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>--}}
				{{-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>  --}}
			</div>
			</div>
			<div class="card-body">
				@include('flash::message') @yield('content')
			</div>
		</div>

		</section>
		
	</div>





	</div>
	<!-- /.content-wrapper -->



	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
	{{-- <div class="p-3"> --}}
		{{-- <h5>Title</h5>
		<p>Sidebar content</p> --}}
	{{-- </div> --}}
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	<footer class="main-footer">
	<!-- To the right -->

	<!-- Default to the left -->
	<strong>Copyright 2020 &copy; Todos los derechos reservados.
	</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="js/bootstrap.bundle.min.js"></script>
	<!-- Fontawesome -->
	<script src="js/all.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	{{-- <script src="dist/js/demo.js"></script> --}}
	<script>
		$('#flash-overlay-modal').modal();
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>
</body>

</html>