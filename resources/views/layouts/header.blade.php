<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
	<div style="padding-top: 11px; font-family:Helvetica;">
		<a href="#" style="color: white; font-size:large">SIM - KENDARAAN</a>
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>


		</ul>

		<span class="mr-md-auto"></span>

		<ul class="navbar-nav">

			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<span style="text-transform: capitalize;">{{Auth::user()->name}}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="dropdown-item" onclick="return confirm('Ada Akan Logout dari Halaman Ini? Lanjutkan?')">
						<i class="icon-switch2"></i>Logout</button>
					</form>
				</div>
			</li>
		</ul>
	</div>
</div>