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

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Basic pie chart</h5>
			</div>
			<div class="card-body">
				<div class="chart-container has-scroll text-center">
					<div class="d-inline-block" id="google-pie">
						<div style="position: relative;">
							<div dir="ltr" style="position: relative; width: 500px; height: 300px;">
								<div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="500" height="300" aria-label="A chart." style="overflow: hidden;">
										<defs id="_ABSTRACT_RENDERER_ID_33"></defs>
										<g>
											<rect x="347" y="15" width="153" height="88" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g column-id="Work">
												<rect x="347" y="15" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="25.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Work</text></g>
												<circle cx="353" cy="21" r="6" stroke="none" stroke-width="0" fill="#2ec7c9"></circle>
											</g>
											<g column-id="Eat">
												<rect x="347" y="34" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="44.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Eat</text></g>
												<circle cx="353" cy="40" r="6" stroke="none" stroke-width="0" fill="#b6a2de"></circle>
											</g>
											<g column-id="Commute">
												<rect x="347" y="53" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="63.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Commute</text></g>
												<circle cx="353" cy="59" r="6" stroke="none" stroke-width="0" fill="#5ab1ef"></circle>
											</g>
											<g column-id="Watch TV">
												<rect x="347" y="72" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="82.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Watch TV</text></g>
												<circle cx="353" cy="78" r="6" stroke="none" stroke-width="0" fill="#ffb980"></circle>
											</g>
											<g column-id="Sleep">
												<rect x="347" y="91" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="101.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Sleep</text></g>
												<circle cx="353" cy="97" r="6" stroke="none" stroke-width="0" fill="#d87a80"></circle>
											</g>
										</g>
										<g>
											<path d="M189,150L189,15A135,135,0,0,1,223.9405710888403,280.3999865490242L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#2ec7c9"></path><text text-anchor="start" x="278.38378230950497" y="140.32596185374723" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">45.8%</text>
										</g>
										<g>
											<path d="M189,150L58.60001345097578,184.94057108884033A135,135,0,0,1,189,15L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#d87a80"></path><text text-anchor="start" x="88.46588543482142" y="89.33469248923318" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">29.2%</text>
										</g>
										<g>
											<path d="M189,150L93.5405845398161,245.45941546018392A135,135,0,0,1,58.60001345097578,184.94057108884033L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#ffb980"></path><text text-anchor="start" x="81.95586138688061" y="208.78508387858582" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">8.3%</text>
										</g>
										<g>
											<path d="M189,150L154.05942891115967,280.3999865490242A135,135,0,0,1,93.5405845398161,245.45941546018392L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#5ab1ef"></path><text text-anchor="start" x="120.84766500034016" y="250.5926717792545" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">8.3%</text>
										</g>
										<g>
											<path d="M189,150L223.9405710888403,280.3999865490242A135,135,0,0,1,154.05942891115967,280.3999865490242L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#b6a2de"></path><text text-anchor="start" x="176.50000000000003" y="270.5631889090833" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">8.3%</text>
										</g>
										<g></g>
									</svg>
									<div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
										<table>
											<thead>
												<tr>
													<th>Task</th>
													<th>Hours per Day</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Work</td>
													<td>11</td>
												</tr>
												<tr>
													<td>Eat</td>
													<td>2</td>
												</tr>
												<tr>
													<td>Commute</td>
													<td>2</td>
												</tr>
												<tr>
													<td>Watch TV</td>
													<td>2</td>
												</tr>
												<tr>
													<td>Sleep</td>
													<td>7</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div aria-hidden="true" style="display: none; position: absolute; top: 310px; left: 510px; white-space: nowrap; font-family: Roboto; font-size: 12px;">Sleep</div>
							<div></div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>

@endsection