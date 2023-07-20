<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title> @yield('title') {{ config('app.name', 'Laravel') }}</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<!-- Toastr css files -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">

	<style>
		.material-symbols-outlined.nav-icon {
			font-size: 22px !important;
			margin-right: 0.4rem !important;
		}
	</style>


	@stack('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		{{--
		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
				height="60" width="60">
		</div> --}}

		<!-- Navbar -->
		@include('layouts.backend.layouts.header')
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		@include('layouts.backend.layouts.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- Main content -->
			<section class="content-header">
				<div class="container-fluid">

					@yield('main_content')

				</div>
				<!--/. container-fluid -->
			</section>
			<!-- /.content -->

		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		@include('layouts.backend.layouts.footer')
	</div>
	<!-- ./wrapper -->




	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>

	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="{{ asset('backend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="{{ asset('backend') }}/plugins/raphael/raphael.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<!-- ChartJS -->
	<script src="{{ asset('backend') }}/plugins/chart.js/Chart.min.js"></script>

	<!-- DataTables  & Plugins -->
	<script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

	<!-- Toastr js files -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<!-- Sweet alert js files -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('backend') }}/dist/js/demo.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset('backend') }}/dist/js/pages/dashboard2.js"></script>

	@include('sweetalert::alert')

	{!! Toastr::message() !!}

	<script>
		@if($errors->any())
			@foreach($errors->all() as $error)
				toastr.error('{{ $error }}','Error',{
					progressBar:'true',
					positionClass: 'toast-top-right',
				});
			@endforeach
    @endif
	</script>


	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip({
				html: true, 
				placement: 'bottom'
			})
		})
	</script>


	<script>
		$(document).on('click', '#delete', function(e){
			e.preventDefault();
			var urlToRedirect = $(this).attr('href');

			swal({
				title: "Are you sure?",
				text: "You won't be able to revert this delete",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = urlToRedirect;
					swal("Poof! Your imaginary file has been deleted!", {
						icon: "success",
					});
				} else {
					swal("Now! Your imaginary file is safe!", {
						icon: "success",
					});
				}
			});
		});
	</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

	@stack('js')
</body>

</html>