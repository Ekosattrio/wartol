<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="POS - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Dreams Pos Admin Template</title>

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
								<h6 class="mb-0">Sales Statics</h6>
								<div class="dropdown">
									<a href="javascript:void(0);"
										class="dropdown-toggle btn btn-sm border d-flex align-items-center"
										data-bs-toggle="dropdown" aria-expanded="false">
										2025
									</a>
									<ul class="dropdown-menu p-3">
										<li><a href="javascript:void(0);" class="dropdown-item">2024</a></li>
										<li><a href="javascript:void(0);" class="dropdown-item">2023</a></li>
										<li><a href="javascript:void(0);" class="dropdown-item">2022</a></li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex gap-3 mb-3">
									<div class="p-3 border rounded" style="min-width:160px">
										<div class="small text-muted">Revenue</div>
										<h5 class="mb-1 text-success">Rp12.189</h5>
										<small class="badge bg-success">+25%</small>
									</div>
									<div class="p-3 border rounded" style="min-width:160px">
										<div class="small text-muted">Expense</div>
										<h5 class="mb-1 text-danger">Rp48.988.078</h5>
										<small class="badge bg-danger">-25%</small>
									</div>
								</div>
								<div id="sales_statistik"></div>
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
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

<!-- Sweetalert 2 -->
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

<!-- Summernote JS -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/theme-script.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>