<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="{{ asset('adminlte/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">STOCK OPNAME </span>
	</a>
	
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="adminlte/dist/img/dea.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Dea Fania</a>
			</div>
		</div>
		
		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>
		
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
					<li class="nav-item has-treeview menu-open">
						<li class="nav-header">DASHBOARD</li>
						@if (Request::segment(1) == 'dashboard')
						<li class="nav-item">
							<a href="{{ route('dashboard')}}" class="nav-link active">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Dashboard
									<span class="badge badge-info right"></span>
								</p>
							</a>
						</li>
						@else
						<li class="nav-item">
							<a href="{{ route('dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Dashboard
									<span class="badge badge-info right"></span>
								</p>
							</a>
						</li> 
						@endif
					</li>
				</li>
				<li class="nav-item">
					<li class="nav-item">
						<a href="{{ route('item.index') }}" class="nav-link {{ ( request()->is('databarang') || request()->is('databarang/create') ) ? 'active' : ''}}">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Data Barang
								<span class="badge badge-info right"></span>
							</p>
						</a>
					</li>
				</li>
				<li class="nav-item {{ ( request()->is('databarang/jenis') || request()->is('databarang/jenis') || request()->is('databarang/jenis/create') || request()->is('databarang/satuan')  ) ? 'menu-is-opening menu-open' : '' }} ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-folder"></i>
						<p>
							Data Master
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('item.type.index') }}" class="nav-link {{ ( request()->is('databarang/jenis') || request()->is('databarang/jenis/create') ) ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Jenis Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('item.unit.index') }}" class="nav-link {{ request()->is('databarang/satuan') ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Satuan Barang</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<li class="nav-item">
						<a href="" class="nav-link">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Pengelolaan Barang
								<span class="badge badge-info right"></span>
							</p>
						</a>
					</li>
				</li>
			</li>
		</ul>
	</nav>
	<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>