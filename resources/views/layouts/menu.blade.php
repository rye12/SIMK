<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		Navigation
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="card-body">
				<div class="media">
					<div class="mr-3">
						<a href="#"><img src="{{url('global_assets/images/placeholders/placeholder.jpg')}}" width="38" height="38" class="rounded-circle" alt=""></a>
					</div>

					<div class="media-body">
						<div class="media-title font-weight-semibold" style="text-transform: capitalize;">
							{{Auth::user()->name}}
						</div>
						<div class="font-size-xs opacity-50">
							{{Auth::user()->email}}
						</div>
					</div>

					<div class="ml-3 align-self-center">
						<a href="#" class="text-white"><i class="icon-cog3"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<!-- Main -->
				<li class="nav-item-header">
					<div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
				</li>
				<li class="nav-item">
					<a href="{{ route('dashboard') }}" class="nav-link">
						<i class="icon-home4"></i>
						<span>
							Dashboard
						</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('pegawai.index') }}" class="nav-link">
						<i class="icon-user"></i>
						<span>
							Pegawai
						</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="icon-users"></i>
						<span>User</span></a>
				</li>
				<li class="nav-item">
					<a href="{{ route('kendaraan.index') }}" class="nav-link">
						<i class="icon-car"></i>
						<span>Kendaraan</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('servis.index') }}" class="nav-link">
						<i class="icon-wrench"></i>
						<span>Servis</span></a>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-box"></i> <span>Gudang</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
						<li class="nav-item">
							<a href="{{ route('barang.index') }}" class="nav-link">
								<i class="icon-stack-text"></i><span>Data Barang</span></a>
						</li>
					</ul>
					<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
						<li class="nav-item"><a href="{{ route('barang.index') }}" class="nav-link">
								<i class="icon-box-add"></i><span>Barang Masuk</span></a>
						</li>
					</ul>
					<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
						<li class="nav-item">
							<a href="{{ route('barang.index') }}" class="nav-link">
								<i class="icon-box-remove"></i><span>Barang Keluar</span></a>
						</li>
					</ul>
					<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
						<li class="nav-item">
							<a href="{{ route('barang.index') }}" class="nav-link">
								<i class="icon-cabinet"></i><span>Stok Barang</span></a>
						</li>
					</ul>

				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-file-text2"></i> <span>Pengajuan</span></a>

					<ul class="nav nav-group-sub">
						<li class="nav-item">
							<a href="{{ route('item.index') }}" class="nav-link">
								<i class="icon-cube"></i> <span>Pengajuan Barang</span></a>
						</li>
					</ul>
					<ul class="nav nav-group-sub">
						<li class="nav-item">
							<a href="{{ route('pajak.index') }}" class="nav-link">
								<i class="icon-coins"></i> <span>Pengajuan Pajak</span></a></a>
						</li>
					</ul>
					@if(Auth::user()->level === 'admin')
						<ul class="nav nav-group-sub">
							<li class="nav-item">
								<a href="{{ route('bbm.index')}}" class="nav-link">
									<i class="icon-gas"></i> <span>Pengajuan BBM</span></a></a>
							</li>
						</ul>
					@endif
				</li>
				<!-- /main -->

				<!-- Forms -->


				<!-- Components -->


				<!-- Layout -->


				<!-- Data visualization -->


				<!-- Extensions -->


				<!-- Tables -->


				<!-- Page kits -->


			</ul>
		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->

</div>