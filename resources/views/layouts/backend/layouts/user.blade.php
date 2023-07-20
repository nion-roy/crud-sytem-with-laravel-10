<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
		<li class="nav-header">EXAMPLES</li>
		<li class="nav-item">
			<a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->is('user/dashboard*') ? 'active' : '' }}">
				<i class="nav-icon fas fa-home"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('user.course.index') }}" class="nav-link {{ request()->is('user/course*') ? 'active' : '' }}">
				<i class="nav-icon fas fa-address-card"></i>
				<p>
					Purchase Course
				</p>
			</a>
		</li>


		<li class="nav-header">SYSTEM</li>
		<li class="nav-item">
			<a href="{{ route('user.destroy') }}" class="nav-link">
				<i class="nav-icon fas fa-power-off"></i>
				<p>
					Logout
				</p>
			</a>
		</li>
	</ul>
</nav>