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
					<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
					<span style="text-transform: capitalize;">{{Auth::user()->name}}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					<!-- <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a> -->
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
					<!-- <a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a> -->
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="dropdown-item"><i class="icon-switch2"></i>logout</button>
					</form>
				</div>
			</li>
		</ul>
	</div>
</div>