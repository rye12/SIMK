@extends('layouts.master')

@section('content')

<div class="page-header">
	<div class="page-header-content header-elements-lg-inline">
		<div class="page-title d-flex">
			<h4></i> <span class="font-weight-semibold">Dashboard</span></h4>
			<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none text-center text-lg-left mb-3 mb-lg-0">
			<div class="btn-group position-static">
				<button type="button" class="btn btn-primary"><i class="icon-stack2 mr-2"></i>Report</button>
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
				<div class="dropdown-menu dropdown-menu-right" style=>
					<div class="dropdown-header">Export</div>
					<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
					<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="card bg-teal-400">
			<div class="card-body">
				<div class="d-flex">
					<h3 class="font-weight-semibold mb-0">
						<i class="fa fa-users"></i>
						<?php
						$jmlPegawai = DB::table('pegawai')->count();
						?>
						{{$jmlPegawai}}
					</h3>
				</div>

				<div>
					Pegawai
					<div class="font-size-sm opacity-75"></div>
				</div>
			</div>

			<div class="container-fluid">
				<div id="members-online">
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card bg-pink-400">
			<div class="card-body">
				<div class="d-flex">
					<h3 class="font-weight-semibold mb-0">
						<i class="fa fa-table"></i>
						<?php
						$jmlKendaraan = DB::table('kendaraan')->count();
						?>
						{{$jmlKendaraan}}
					</h3>
				</div>

				<div>
					Kendaraan
					<div class="font-size-sm opacity-75"></div>
				</div>
			</div>

			<div id="server-load"></div>
		</div>

	</div>

	<div class="col-lg-4">
		<div class="card bg-blue-400">
			<div class="card-body">
				<div class="d-flex">
					<h3 class="font-weight-semibold mb-0">
						<i class="fa fa-cart-plus"></i>
						<?php
						$jmlServis = DB::table('servis')->count();
						?>
						{{$jmlServis}}
					</h3>
				</div>

				<div>
					Servis
					<div class="font-size-sm opacity-75"></div>
				</div>
			</div>

			<div id="today-revenue"></div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h5 class="card-title">Basic pie chart</h5>
	</div>

	<div class="card-body">
		<div class="chart-container">
			<div class="chart has-fixed-height" id="pie_basic" _echarts_instance_="ec_1635144545550" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;">
				<div style="position: relative; width: 458px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;">
					<canvas data-zr-dom-id="zr_0" width="458" height="400" style="position: absolute; left: 0px; top: 0px; width: 458px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
				</div>
				<div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.75); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 13px / 20px Roboto, sans-serif; padding: 10px 15px; left: 145px; top: 141px; pointer-events: none;">Browsers <br>Chrome: 1548 (60.42%)</div>
			</div>
		</div>
	</div>
</div>

@endsection