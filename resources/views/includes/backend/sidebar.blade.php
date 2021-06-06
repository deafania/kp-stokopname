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
				<a href="#" class="d-block">{{ auth()->user()->name }} ( {{ auth()->user()->role }} )</a>
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

				@hasrole('operator')
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
							<a href="{{ route('item.type.index') }}" class="nav-link {{ ( request()->is('databarang/nama') || request()->is('databarang/nama/create') ) ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Nama Barang</p>
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
				@endhasrole

				<li class="nav-item {{ ( request()->is('databarang/pengelolaan/*') ) ? 'menu-is-opening menu-open' : '' }} ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-folder"></i>
						<p>
							Pengelolaan Barang
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('item.management-incoming.index') }}" class="nav-link {{ ( request()->is('databarang/pengelolaan/barang-masuk') ) ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Barang Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('item.management-outcoming.index') }}" class="nav-link {{ request()->is('databarang/pengelolaan/barang-keluar') ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Barang Keluar</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item {{ ( request()->is('databarang/laporan-masuk') || request()->is('databarang/laporan-masuk/create') || request()->is('databarang/laporan-keluar')  ) ? 'menu-is-opening menu-open' : '' }} ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-folder"></i>
						<p>
							Laporan
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('item.report-incoming.index') }}" class="nav-link {{ ( request()->is('databarang/laporan-masuk') || request()->is('databarang/laporan-masuk/create') ) ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Barang Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('item.report-outcoming.index') }}" class="nav-link {{ request()->is('databarang/laporan-keluar') ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Barang Keluar</p>
							</a>
						</li>
					</ul>
				</li>

				@hasrole('admin')
				<li class="nav-item">
					<li class="nav-item">
						<a href="{{ route('user.index') }}" class="nav-link {{ ( request()->is('manajemen-user') || request()->is('manajemen-user/create') ) ? 'active' : ''}}">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Manajemen User
								<span class="badge badge-info right"></span>
							</p>
						</a>
					</li>
				</li>
				<li class="nav-item">
					<li class="nav-item">
						<a href="{{ route('qr_code') }}" class="nav-link {{ ( request()->is('qrcode') || request()->is('qrcode/create') ) ? 'active' : ''}}">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Qr Code
								<span class="badge badge-info right"></span>
							</p>
						</a>
					</li>
				</li>
				@endhasrole
			</li>
		</ul>
	</nav>
	<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>