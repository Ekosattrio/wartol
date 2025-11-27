<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="POS - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
	<meta name="robots" content="noindex, nofollow">
	<title>Dashboard Wartol</title>

	<!-- Summernote CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

<!-- Animation CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

<!-- Feathericon CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<style>
/* Wartol switch colors: red when off, orange when on */
.form-check-input.wartol-switch {
	background-color: #dc3545; /* red default */
	border-color: #dc3545;
}
.form-check-input.wartol-switch:checked {
	background-color: #ff8a00; /* orange when checked */
	border-color: #ff8a00;
	box-shadow: 0 0 0 .2rem rgba(255,138,0,0.15);
}
.wartol-label { margin-left: .5rem; font-weight:600; }
</style>


</head>

<body>
	<div id="global-loader">
		<div class="loader"> </div>
	</div>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

	 {{-- HEADER --}}
        @include('component.header')

        {{-- SIDEBAR --}}
        @include('component.sidebar')

		<div class="page-wrapper">

			<!-- Main konten tulis disini -->
			<div class="content">
				<!-- Top notice + header -->
				<div class="mb-3">
					<div class="d-flex justify-content-between align-items-center mb-2">
						<div>
							<h3 class="mb-1 mt-2">Welcome, Admin</h3>
						</div>
					</div>
				</div>

				

				<!-- NEW: Sales Statics + Recent Transactions -->
				<div class="row mt-3">
					<div class="col-lg-12">
						<div class="card h-100">
							<div class="card-header d-flex justify-content-between align-items-center">
								<div>
									<h6 class="mb-0">Sales Statics</h6>
								</div>
								<form method="POST" action="{{ route('penjual.toggle-wartol') }}" id="wartolToggleForm" class="d-flex align-items-center wartol-switch">
									@csrf
									<div class="form-check form-switch mb-0">
										<input class="form-check-input wartol-switch" type="checkbox" id="wartolSwitch" name="wartol_open" {{ isset($wartolOpen) && $wartolOpen ? 'checked' : '' }}>
										<label class="form-check-label wartol-label" for="wartolSwitch">{{ isset($wartolOpen) && $wartolOpen ? 'Buka' : 'Tutup' }}</label>
									</div>
								</form>
							</div>
							<div class="card-body">
								<div class="row mb-3">
									<div class="col-md-4">
										<div class="p-3 border rounded h-100 text-center">
											<div class="small text-muted">Total Pemasukan Kotor</div>
											<h5 class="mb-1 text-success">Rp {{ number_format($totalSales ?? 0, 0, ',', '.') }}</h5>
										</div>
									</div>
									<div class="col-md-4">
										<div class="p-3 border rounded h-100 text-center">
											<div class="small text-muted">Total Order</div>
											<h5 class="mb-1">{{ $totalOrders ?? 0 }}</h5>
										</div>
									</div>
									<div class="col-md-4">
										<div class="p-3 border rounded h-100 text-center">
											<div class="small text-muted">Top Seller</div>
											@if(isset($topItems) && $topItems->count())
												<h6 class="mb-1">{{ $topItems->first()->nama_produk }}</h6>
												<small class="text-muted">{{ $topItems->first()->total_qty }} Terjual</small>
											@else
												<div class="text-muted">No sales yet</div>
											@endif
										</div>
									</div>
								</div>
								<div id="sales_statistik"></div>
								<hr>
								<h6>Produk Top Seller</h6>
								<ul class="list-group list-group-flush mt-2">
									@if(isset($topItems) && $topItems->count())
										@foreach($topItems as $item)
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span>{{ $item->nama_produk }}</span>
												<span class="badge bg-primary rounded-pill">{{ $item->total_qty }}</span>
											</li>
										@endforeach
									@else
										<li class="list-group-item text-muted">Belum ada data penjualan.</li>
									@endif
								</ul>
							</div>
						</div>
					</div>

					
				</div>


				
			</div>
		</div>

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.loadtemplate/1.5.10/jquery.loadTemplate.min.js"
	integrity="sha512-T1zx+UG2gXu9mr29wvzaKkNUmAOAie40T32ZPIvcRPJgO5br53+Ocqj8gzguUuix7FK+Z3ncRCJMaZcumnPZzg=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/tableukuran.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>

<script>
	(function() {
		// labels and data passed from controller
		const labels = @json($chartLabels ?? []);
		const data = @json($chartData ?? []);

		if (labels.length && data.length) {
			var options = {
				chart: {
					type: 'area',
					height: 320,
					toolbar: { show: false },
					zoom: { enabled: false },
					selection: { enabled: false },
					events: {
						dataPointSelection: function(e, chartCtx, opts){
							return false; // matikan klik pada data
						},
						click: function(){
							return false; // klik grafik tidak berpengaruh
						}
					}
				},
				colors: ['#FF8A00'],
				series: [{ name: 'Penjualan', data: data }],
				xaxis: {
					categories: labels,
					labels: { rotate: -45 }
				},
				dataLabels: { enabled: false },
				stroke: { curve: 'smooth', width: 2, colors: ['#8B4B0B'] },
				markers: {
					size: 3,
					colors: ['#8B4B0B'],
					strokeColors: '#fff',
					strokeWidth: 1
				},
				fill: {
					type: 'gradient',
					gradient: {
						shade: 'light',
						type: 'vertical',
						shadeIntensity: 0.4,
						gradientToColors: ['#8B4513'],
						inverseColors: false,
						opacityFrom: 0.85,
						opacityTo: 0.2,
						stops: [0, 90, 100]
					}
				},
				yaxis: {
					// set maximum to 3,000,000 and show ticks every 500,000
					min: 0,
					tickAmount: 6,
					forceNiceScale: true,
					labels: {
						formatter: function (val) { return 'Rp ' + Intl.NumberFormat('id-ID').format(val); }
					}
				},
				tooltip: {
					y: {
						formatter: function (val) { return 'Rp ' + Intl.NumberFormat('id-ID').format(val); }
					}
				}
			};

			var chart = new ApexCharts(document.querySelector('#sales_statistik'), options);
			chart.render();
		} else {
			document.querySelector('#sales_statistik').innerHTML = '<div class="text-muted">Tidak ada data penjualan 7 hari terakhir.</div>';
		}
	})();
</script>

<!-- Sweetalert 2 -->
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

<!-- Summernote JS -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/theme-script.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function(){
	const switchEl = document.getElementById('wartolSwitch');
	const form = document.getElementById('wartolToggleForm');
	if(!switchEl || !form) return;

	// remember previous state so we can revert on cancel
	let prev = switchEl.checked;

	switchEl.addEventListener('change', function(e){
		const willOpen = switchEl.checked;
		const msg = willOpen
			? 'Anda yakin membuka wartol? Pengunjung akan dapat mengakses kembali.'
			: 'Anda yakin menutup wartol? Pengunjung akan diarahkan ke halaman tutup.';
		if(confirm(msg)){
			form.submit();
		} else {
			// revert
			switchEl.checked = prev;
		}
	});
});
</script>
</body>

</html>