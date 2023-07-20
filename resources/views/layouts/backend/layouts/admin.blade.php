<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
		<li class="nav-header">EXAMPLES</li>
		<li class="nav-item">
			<a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : ''}}">
				<div class="d-flex align-items-center">
					<span class="material-symbols-outlined nav-icon">
						dashboard
					</span>
					<p>
						Dashboard
					</p>
				</div>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.course.index') }}" class="nav-link {{ request()->is('admin/course*') ? 'active' : ''}}">
				<div class="d-flex align-items-center">
					<span class="material-symbols-outlined nav-icon">
						view_timeline
					</span>
					<p>
						Course
					</p>
				</div>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.enroll.index') }}" class="nav-link  {{ request()->is('admin/enroll*') ? 'active' : ''}}">
				<div class="d-flex align-items-center">
					<span class="material-symbols-outlined nav-icon">
						shop_two
					</span>
					<p>
						Enroll Course
					</p>
				</div>
			</a>
		</li>

		<li class="nav-item">
			<a href="{{ route('admin.user.index') }}" class="nav-link  {{ request()->is('admin/user*') ? 'active' : ''}}">
				<div class="d-flex align-items-center">
					<span class="material-symbols-outlined nav-icon">
						person
					</span>
					<p>
						All Users
					</p>
				</div>
			</a>
		</li>


		<li class="nav-header">SYSTEM</li>
		<li class="nav-item">
			<a href="{{ route('admin.destroy') }}" class="nav-link">
				<div class="d-flex align-items-center">
					<span class="material-symbols-outlined nav-icon">
						power_settings_new
					</span>
					<p>
						Logout
					</p>
				</div>
			</a>
		</li>
	</ul>
</nav>