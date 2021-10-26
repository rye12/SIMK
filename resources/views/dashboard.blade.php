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
	<div class="col-lg-12">
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
											<rect x="500" y="15" width="153" height="88" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g column-id="menungguVerifikasi">
												<rect x="347" y="15" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="25.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Menunggu Verifikasi</text></g>
												<circle cx="353" cy="21" r="6" stroke="none" stroke-width="0" fill="#2ec7c9"></circle>
											</g>
											<g column-id="menungguPembayaran">
												<rect x="347" y="34" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="44.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Menunggu Pembayaran</text></g>
												<circle cx="353" cy="40" r="6" stroke="none" stroke-width="0" fill="#b6a2de"></circle>
											</g>
											<g column-id="prosesPembayaran">
												<rect x="347" y="53" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="63.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Proses Pembayaran</text></g>
												<circle cx="353" cy="59" r="6" stroke="none" stroke-width="0" fill="#5ab1ef"></circle>
											</g>
											<g column-id="pembayaranSelesai">
												<rect x="347" y="72" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="82.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Pembayaran Selesai</text></g>
												<circle cx="353" cy="78" r="6" stroke="none" stroke-width="0" fill="#ffb980"></circle>
											</g>
											<g column-id="penyerahan">
												<rect x="347" y="91" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="101.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Penyerahan</text></g>
												<circle cx="353" cy="97" r="6" stroke="none" stroke-width="0" fill="#d87a80"></circle>
											</g>
											<g column-id="pergantianPembayaran">
												<rect x="347" y="100" width="153" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
												<g><text text-anchor="start" x="364" y="120.2" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#222222">Pergantian Pembayaran</text></g>
												<circle cx="353" cy="116" r="6" stroke="none" stroke-width="0" fill="#1aff9c"></circle>
											</g>
										</g>
										<g>
											<path d="M189,150L189,15A135,135,0,0,1,223.9405710888403,280.3999865490242L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#2ec7c9"></path>
											<text text-anchor="start" x="278.38378230950497" y="140.32596185374723" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">
												<?php
												$jmlPajak = DB::table('pajak')
													->select('id_verifikasi')
													->count();
												$statusPajak = DB::table('pajak')
													->select('id_verifikasi')
													->where('id_verifikasi', '=', '1')
													->count();
												?>
												<script>
													function persen1() {
														var jml1 = document.querySelector(jmlPajak);
														var sts1 = document.querySelector(statusPajak);
														var hitung1 = (sts1 / jml1) * 100;

														return hitung1;
													}
													document.getElementById("hasil1").innerHTML = persen1();
												</script>
												<a id="hasil1"></a>
											</text>
										</g>
										<g>
											<path d="M189,150L58.60001345097578,184.94057108884033A135,135,0,0,1,189,15L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#d87a80"></path>
											<text text-anchor="start" x="88.46588543482142" y="89.33469248923318" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">
												<?php
												$jmlPajak = DB::table('pajak')
													->select('id_verifikasi')
													->count();
												$statusPajak = DB::table('pajak')
													->select('id_verifikasi')
													->where('id_verifikasi', '=', '2')
													->count();
												?>
												{{$statusPajak}}%
											</text>
										</g>
										<g>
											<path d="M189,150L93.5405845398161,245.45941546018392A135,135,0,0,1,58.60001345097578,184.94057108884033L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#ffb980"></path>
											<text text-anchor="start" x="81.95586138688061" y="208.78508387858582" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">
												<?php
												$jmlPajak = DB::table('pajak')
													->select('id_verifikasi')
													->count();
												$statusPajak = DB::table('pajak')
													->select('id_verifikasi')
													->where('id_verifikasi', '=', '3')
													->count();
												?>
												{{$statusPajak}}%
											</text>
										</g>
										<g>
											<path d="M189,150L154.05942891115967,280.3999865490242A135,135,0,0,1,93.5405845398161,245.45941546018392L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#5ab1ef"></path>
											<text text-anchor="start" x="120.84766500034016" y="250.5926717792545" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">
												<?php
												$jmlPajak = DB::table('pajak')
													->select('id_verifikasi')
													->count();
												$statusPajak = DB::table('pajak')
													->select('id_verifikasi')
													->where('id_verifikasi', '=', '4')
													->count();
												?>
												{{$statusPajak}}%
											</text>
										</g>
										<g>
											<path d="M189,150L223.9405710888403,280.3999865490242A135,135,0,0,1,154.05942891115967,280.3999865490242L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#b6a2de"></path>
											<text text-anchor="start" x="176.50000000000003" y="270.5631889090833" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">
												<?php
												$jmlPajak = DB::table('pajak')
													->select('id_verifikasi')
													->count();
												$statusPajak = DB::table('pajak')
													->select('id_verifikasi')
													->where('id_verifikasi', '=', '5')
													->count();
												?>
												{{$statusPajak}}%
											</text>
										</g>
										<g>
											<path d="M189,150L223.9405710888403,280.3999865490242A135,135,0,0,1,154.05942891115967,280.3999865490242L189,150A0,0,0,0,0,189,150" stroke="#ffffff" stroke-width="1" fill="#b6a2de"></path>
											<text text-anchor="start" x="176.50000000000003" y="270.5631889090833" font-family="Roboto" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">
												<?php
												$jmlPajak = DB::table('pajak')
													->select('id_verifikasi')
													->count();
												$statusPajak = DB::table('pajak')
													->select('id_verifikasi')
													->where('id_verifikasi', '=', '6')
													->count();
												?>
												{{$statusPajak}}%
											</text>
										</g>
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
													<td>Menunggu Verifikasi</td>
													<td>100</td>
												</tr>
												<tr>
													<td>Menunggu Pembayaran</td>
													<td>2</td>
												</tr>
												<tr>
													<td>Proses Pembayaran</td>
													<td>2</td>
												</tr>
												<tr>
													<td>Pembayaran Selesai</td>
													<td>2</td>
												</tr>
												<tr>
													<td>Penyerahan</td>
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

<div class="col-md-12">
	<h1 class="text-center">how to create dynamic pie chart in laravel - websolutionstuff.com</h1>
	<div class="col-xl-6" style="margin-top: 30px;">
		<div class="card">
			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="pie_basic"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$status1 = DB::table('pajak')->where('id_verifikasi', '1')->get();
$status2 = DB::table('pajak')->where('id_verifikasi', '2')->get();
$status3 = DB::table('pajak')->where('id_verifikasi', '3')->get();
$status4 = DB::table('pajak')->where('id_verifikasi', '4')->get();
$status5 = DB::table('pajak')->where('id_verifikasi', '5')->get();
$status6 = DB::table('pajak')->where('id_verifikasi', '6')->get();
$status1_count = count($status1);
$status2_count = count($status2);
$status3_count = count($status3);
$status4_count = count($status4);
$status5_count = count($status5);
$status6_count = count($status6);
setcookie('$status1_count,$status2_count,$status3_count,$status4_count,$status5_count,$status6_count');
?>

<script type="text/javascript">
	var pie_basic_element = document.getElementById('pie_basic');
	var x = document.cookie;
	document.write(x);
	if (pie_basic_element) {
		var pie_basic = echarts.init(pie_basic_element);
		pie_basic.setOption({
			color: [
				'#2ec7c9', '#b6a2de', '#5ab1ef', '#ffb980', '#d87a80',
				'#8d98b3', '#e5cf0d', '#97b552', '#95706d', '#dc69aa',
				'#07a2a4', '#9a7fd1', '#588dd5', '#f5994e', '#c05050',
				'#59678c', '#c9ab00', '#7eb00a', '#6f5553', '#c14089'
			],

			textStyle: {
				fontFamily: 'Roboto, Arial, Verdana, sans-serif',
				fontSize: 13
			},

			title: {
				text: 'Pie Chart Example',
				left: 'center',
				textStyle: {
					fontSize: 17,
					fontWeight: 500
				},
				subtextStyle: {
					fontSize: 12
				}
			},

			tooltip: {
				trigger: 'item',
				backgroundColor: 'rgba(0,0,0,0.75)',
				padding: [10, 15],
				textStyle: {
					fontSize: 13,
					fontFamily: 'Roboto, sans-serif'
				},
				formatter: "{a} <br/>{b}: {c} ({d}%)"
			},

			legend: {
				orient: 'horizontal',
				bottom: '0%',
				left: 'center',
				data: ['Fruit', 'Vegitable', 'Grains'],
				itemHeight: 8,
				itemWidth: 8
			},

			series: [{
				name: 'Product Type',
				type: 'pie',
				radius: '70%',
				center: ['50%', '50%'],
				itemStyle: {
					normal: {
						borderWidth: 1,
						borderColor: '#fff'
					}
				},
				data: [{
						value: {
							{
								$status1_count
							}
						},
						name: '1'
					},
					{
						value: {
							{
								$status2_count
							}
						},
						name: '2'
					},
					{
						value: {
							{
								$status3_count
							}
						},
						name: '3'
					},
					{
						value: {
							{
								$status4_count
							}
						},
						name: '4'
					},
					{
						value: {
							{
								$status5_count
							}
						},
						name: '5'
					},
					{
						value: {
							{
								$status6_count
							}
						},
						name: '6'
					}
				]
			}]
		});
	}
</script>

@endsection