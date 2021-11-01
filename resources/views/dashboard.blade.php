@extends('layouts.master')

@section('content')

<div class="page-header">
	<div class="page-header-content header-elements-lg-inline">
		<div class="page-title d-flex">
			<h4></i> <span class="font-weight-semibold">Dashboard</span></h4>
			<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
		</div>

		<!-- <div class="header-elements d-none text-center text-lg-left mb-3 mb-lg-0">
			<div class="btn-group position-static">
				<button type="button" class="btn btn-primary"><i class="icon-stack2 mr-2"></i>Report</button>
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
				<div class="dropdown-menu dropdown-menu-right" style=>
					<div class="dropdown-header">Export</div>
					<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
					<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
				</div>
			</div>
		</div> -->
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

<div class="row">
	<div class="card border-left-primary border-right-primary rounded-0">
		<div class="card-header">
			<h6 class="card-title">Daftar Servise Selanjutnya</h6>
		</div>
								
		<div class="card-body">
			<table class="table table-bordered">
				<tr style="background: #ddd;">
					<th>Nama</th><th>Kilometer</th><th>Bulan</th>
				</tr>
				<tr>
					<td colspan="3">
						Servis Berikutnya
					</td>
				</tr>

				<tr>
					<td>Oli Mesin</td><td>15.567 Km</td><td>Januari 2022</td>
				</tr>
				<tr>
					<td>Oli Transmisi</td><td>20.567 Km</td><td>Juni 2022</td>
				</tr> 
				<tr>
					<td>Oli Gardan</td><td> </td><td></td>
				</tr>
				<tr>
					<td>Minyak Rem</td><td>25.567 Km</td><td>Desember 2022</td>
				</tr>
				<tr>
					<td>Filter Oli</td><td>25.567 Km</td><td>Desember 2022</td>
				</tr>
				<tr>
					<td>Filter Udara</td><td>25.567 Km</td><td>Desember 2022</td>
				</tr>
				



			</table>
		</div>
	</div>
</div>

@endsection