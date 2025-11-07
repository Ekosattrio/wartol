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


	<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Animation CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

<!-- Mobile CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/intltelinput/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/intltelinput/css/demo.css') }}">

<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

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
			<div class="content container-fluid mt-5">
				<div class="page-header">
					<div class="add-item d-flex">
						<div class="page-title">
							<h4>Sales</h4>
							<h6>Manage Yours sales</h6>
						</div>
					</div>
					<ul class="table-top-head">
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
									src="assets/img/icons/pdf.svg" alt="img"></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
									src="assets/img/icons/excel.svg" alt="img"></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer"
									class="feather-rotate-ccw"></i></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
									data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
									data-feather="chevron-up" class="feather-chevron-up"></i></a>
						</li>
					</ul>
					<div class="page-btn">
						<a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-sels"><i
								data-feather="plus-circle" class="me-2"></i> Add Sales</a>
					</div>
				</div>
				<!-- /product list -->
				<div class="card table-list-card">
					<div class="card-body">
						<!-- Filter -->
						<div class="table-top d-flex align-items-center justify-content-between">
							<!-- Search Input -->
							<div class="search-set d-block d-md-flex">
								<div class="search-input">
									<a href="" class="btn btn-searchset"><i data-feather="search"
											class="feather-search"></i></a>
								</div>
								<!-- Date Range -->
								<div class="my-2">
									<div class="pemilihrentang-container ">
										<input type="text" id="pemilihrentang-input"
											class="pemilihrentang-input form-control" readonly placeholder="Date"
											style="height: fit-content !important;width: 100% !important;">
										<div id="pemilihrentang-panel" class="pemilihrentang-panel">
											<div class="pemilihrentang-isi">
												<div class="opsi-cepat">
													<div data-range="kemarin">Kemarin</div>
													<div data-range="7hari">7 Hari Terakhir</div>
													<div data-range="bulanIni">Bulan Ini</div>
													<div data-range="bulanLalu">Bulan Lalu</div>
													<div data-range="tahunLalu">Tahun Lalu</div>
													<div data-range="kustom">Rentang Kustom</div>
												</div>
												<div class="kalender" id="kalender-view" style="display:none;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="filters d-flex justify-content-end">
								<div class="dropdown w-100 me-2">
									<button class="btn btn-outline-primary dropdown-toggle" type="button"
										data-bs-toggle="dropdown" aria-expanded="false">
										Status
									</button>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Complete</a></li>
										<li><a class="dropdown-item" href="#">Pending</a></li>
										<li><a class="dropdown-item" href="#">Ordered</a></li>
										<li><a class="dropdown-item" href="#">Received</a></li>
									</ul>
								</div>
								<div class="dropdown w-100 me-2">
									<button class="btn btn-outline-primary dropdown-toggle" type="button"
										data-bs-toggle="dropdown" aria-expanded="false">
										Payment Status
									</button>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Paid</a></li>
										<li><a class="dropdown-item" href="#">Unpaid</a></li>
									</ul>
								</div>
								<div class="dropdown w-100 me-2">
									<button class="btn btn-outline-primary dropdown-toggle" type="button"
										data-bs-toggle="dropdown" aria-expanded="false">
										Channel
									</button>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Website</a></li>
										<li><a class="dropdown-item" href="#">POS</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Filter -->
						<div class="table-responsive ">
							<table class="table datanew">
								<thead>
									<tr>
										<th class="no-sort">
											<label class="checkboxs">
												<input type="checkbox" id="select-all">
												<span class="checkmarks"></span>
											</label>
										</th>
										<th>Customer</th>
										<th>Reference</th>
										<th>Date</th>
										<th>Status</th>
										<th>Grand Total</th>
										<th>Paid</th>
										<th>Due</th>
										<th>Channel</th>
										<th>Payment Status</th>
										<th>Biller</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</td>
										<td>Joko</td>
										<td>PT001 </td>
										<td>24 Dec 2024</td>
										<td><span class="badge bg-soft-success">Complete</span></td>
										<td>100.000</td>
										<td>100.000</td>
										<td>125.000</td>
										<td>Website</td>
										<td><span class="badge bg-outline-success">Paid</span></td>
										<td>Admin</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sale-detail-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>
									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Joko</td>
										<td>PT001</td>
										<td>24 Dec 2024</td>
										<td><span class="badge bg-soft-success">Complete</span></td>
										<td>100.000</td>
										<td>100.000</td>
										<td>125.000</td>
										<td>Website</td>
										<td><span class="badge bg-outline-success">Paid</span></td>
										<td>Admin</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Siti</td>
										<td>PT002</td>
										<td>02 Jan 2025</td>
										<td><span class="badge bg-soft-warning">Pending</span></td>
										<td>200.000</td>
										<td>150.000</td>
										<td>250.000</td>
										<td>Mobile App</td>
										<td><span class="badge bg-outline-danger">Unpaid</span></td>
										<td>Staff</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Budi</td>
										<td>PT003</td>
										<td>10 Jan 2025</td>
										<td><span class="badge bg-soft-success">Complete</span></td>
										<td>300.000</td>
										<td>280.000</td>
										<td>350.000</td>
										<td>E-Commerce</td>
										<td><span class="badge bg-outline-success">Paid</span></td>
										<td>Admin</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Lina</td>
										<td>PT004</td>
										<td>18 Jan 2025</td>
										<td><span class="badge bg-soft-danger">Cancelled</span></td>
										<td>150.000</td>
										<td>0</td>
										<td>180.000</td>
										<td>Website</td>
										<td><span class="badge bg-outline-danger">Unpaid</span></td>
										<td>Staff</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Dewi</td>
										<td>PT005</td>
										<td>25 Jan 2025</td>
										<td><span class="badge bg-soft-success">Complete</span></td>
										<td>120.000</td>
										<td>120.000</td>
										<td>145.000</td>
										<td>Mobile App</td>
										<td><span class="badge bg-outline-success">Paid</span></td>
										<td>Manager</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Andi</td>
										<td>PT006</td>
										<td>30 Jan 2025</td>
										<td><span class="badge bg-soft-warning">Pending</span></td>
										<td>220.000</td>
										<td>100.000</td>
										<td>250.000</td>
										<td>Design</td>
										<td><span class="badge bg-outline-warning">Partial</span></td>
										<td>Admin</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Rina</td>
										<td>PT007</td>
										<td>05 Feb 2025</td>
										<td><span class="badge bg-soft-success">Complete</span></td>
										<td>500.000</td>
										<td>500.000</td>
										<td>600.000</td>
										<td>E-Commerce</td>
										<td><span class="badge bg-outline-success">Paid</span></td>
										<td>Staff</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Agus</td>
										<td>PT008</td>
										<td>12 Feb 2025</td>
										<td><span class="badge bg-soft-success">Complete</span></td>
										<td>350.000</td>
										<td>350.000</td>
										<td>400.000</td>
										<td>Website</td>
										<td><span class="badge bg-outline-success">Paid</span></td>
										<td>Manager</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Nina</td>
										<td>PT009</td>
										<td>20 Feb 2025</td>
										<td><span class="badge bg-soft-warning">Pending</span></td>
										<td>400.000</td>
										<td>200.000</td>
										<td>450.000</td>
										<td>Mobile App</td>
										<td><span class="badge bg-outline-warning">Partial</span></td>
										<td>Staff</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>

									<tr>
										<td><label class="checkboxs"><input type="checkbox"><span
													class="checkmarks"></span></label></td>
										<td>Rudi</td>
										<td>PT010</td>
										<td>28 Feb 2025</td>
										<td><span class="badge bg-soft-danger">Cancelled</span></td>
										<td>250.000</td>
										<td>0</td>
										<td>300.000</td>
										<td>Design</td>
										<td><span class="badge bg-outline-danger">Unpaid</span></td>
										<td>Admin</td>
										<td>
											<button type="button" class="btn btn-light btn-sm p-1"
												data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#sales-details-new">
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Sale Detail
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button" data-bs-toggle="modal"
														data-bs-target="#edit-units">
														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit Units
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#showpayment"
														type="button">
														<i data-feather="dollar-sign" class="me-2" width="14"
															height="14"></i> Show Payments
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														data-bs-toggle="modal" data-bs-target="#createpayment"
														type="button">
														<i data-feather="plus-circle" class="me-2" width="14"
															height="14"></i> Create Payment
													</button>
												</li>
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1"
														type="button">
														<i data-feather="download" class="me-2" width="14"
															height="14"></i> Download PDF
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-sale"
														type="button">
														<i data-feather="trash-2" class="me-2" width="14"
															height="14"></i> Delete Sale
													</button>
												</li>

											</ul>
										</td>
									</tr>


								</tbody>
								<tfoot>
									<tr>
										<td colspan="1"></td>
										<td class="text-start fw-bold">Total</td>
										<!-- gunakan class sum-target dan data-col-index agar reusable -->
										<td colspan="3"></td>
										<td id="amount-total" class="fw-bold sum-target" data-col-index="5">0</td>
										<td id="amount-total" class="fw-bold sum-target" data-col-index="6">0</td>
										<td id="amount-total" class="fw-bold sum-target" data-col-index="7">0</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<!-- /product list -->
			</div>
		</div>

	</div>
	<!-- /Main Wrapper -->
	<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.loadtemplate/1.5.10/jquery.loadTemplate.min.js"
	integrity="sha512-T1zx+UG2gXu9mr29wvzaKkNUmAOAie40T32ZPIvcRPJgO5br53+Ocqj8gzguUuix7FK+Z3ncRCJMaZcumnPZzg=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<script src="{{ asset('assets/plugins/intltelinput/js/intlTelInput.js') }}"></script>

<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

<script src="{{ asset('assets/js/theme-script.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>