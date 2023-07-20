<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="@if (Auth::check() && Auth::user()->role == 'admin')
			{{ route('admin.dashboard') }}
			@else
			{{ route('user.dashboard') }}
			
		@endif" class="brand-link">
		<img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
			style="opacity: .8">
		<span class="brand-text font-weight-light">VISION INTERN</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="javascript:void(0)" class="d-block">{{ Auth::user()->name }}</a>
			</div>
		</div>


		<!-- Sidebar Menu -->

		@if (Auth::check() && Auth::user()->role == 'admin')
		@include('layouts.backend.layouts.admin')
		@else
		@include('layouts.backend.layouts.user')
		@endif

		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>