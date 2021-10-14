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
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
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
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>User</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="#" class="nav-link active">Daftar User</a></li>
								 	</ul>	
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Kendaraan</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Themes">
								<li class="nav-item"><a href="{{ route('kendaraan.index') }}" class="nav-link active"> Daftar Kendaraan</a></li>
								<!-- <li class="nav-item"><a href="../../../LTR/material/full/index.html" class="nav-link">Tambah Kendaraan</a></li> -->
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-stack"></i> <span>Servis</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
								<li class="nav-item"><a href="../seed/layout_nav_horizontal.html" class="nav-link">Data Servis</a></li>
								<!-- <li class="nav-item"><a href="../seed/sidebar_none.html" class="nav-link">Tambah Servis</a></li> -->
								
							</ul>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-box"></i> <span>Barang</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
								<li class="nav-item"><a href="{{ route('barang.index') }}" class="nav-link">Data Barang</a></li>
								<!-- <li class="nav-item"><a href="../seed/sidebar_none.html" class="nav-link">Tambah Servis</a></li> -->
								
							</ul>
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