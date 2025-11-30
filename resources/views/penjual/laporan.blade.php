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

			<div class="content container-fluid mt-5">
				<div class="page-header">
					<div class="add-item d-flex">
						<div class="page-title">
							<h4>Laporan Penjualan</h4>
							<h6>Lihat Laporan Penjualan anda</h6>
						</div>
					</div>
					<ul class="table-top-head">
						<li><a href="{{  route('penjual.laporan.export.pdf')}}"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Pdf">
								<img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img"></a></li>


						<li>
							<a href="{{ route('penjual.laporan.export.excel') }}"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Excel">
								<img src="{{ asset('assets/img/icons/excel.svg') }}" alt="img">
							</a>
						</li>



						<li><a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
									data-feather="chevron-up" class="feather-chevron-up"></i></a></li>
					</ul>

				</div>

				<!-- /product list -->
				<div class="card table-list-card">
					<div class="card-body">
						<!-- Filter -->
						<div class="table-top d-flex align-items-center justify-content-between">
							<div class="search-set d-block d-md-flex">

								<div class="my-2">
									<div class="pemilihrentang-container">
										<input type="text" id="pemilihrentang-input"
											class="pemilihrentang-input form-control" readonly placeholder="Cari berdasarkan Tanggal"
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
												<div class="kalender" id="kalender-view" style="display:none;"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="search-input fade">
									<a href="" class="btn btn-searchset"><i data-feather="search"
											class="feather-search"></i></a>
								</div>
								<!-- Date Range -->
							</div>

							<div class="filters d-flex justify-content-end">



							</div>
						</div>
						<!-- /Filter -->

						<div class="table-responsive">
							<table class="table datanew">
								<thead>
									<tr>
										<th>
											<label class="checkboxs">
												<input type="checkbox" id="select-all">
												<span class="checkmarks"></span>
											</label>
										</th>
										<th>Kode Transaksi</th>
										<th>Nomor HP</th>
										<th>Total</th>
										<th>Metode Pembayaran</th>
										<th>Status Pembayaran</th>
										<th>Jadwal Pickup</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($transactions as $trx)
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" value="{{ $trx->id }}">
												<span class="checkmarks"></span>
											</label>
										</td>

										<td>{{ $trx->id }}</td>
										<td>{{ $trx->phone }}</td>
										<td>Rp {{ number_format($trx->total_amount, 0, ',', '.') }}</td>
										<td>{{ $trx->payment_method ?? '-' }}</td>
										<td>
											<span
												class="badge bg-outline-{{ $trx->payment_status === 'pending' ? 'warning' : ($trx->payment_status === 'success' ? 'success' : 'secondary') }}">
												{{ ucfirst($trx->payment_status) }}
											</span>
										</td>
										<td>{{ $trx->schedule_pickup ? \Carbon\Carbon::parse($trx->schedule_pickup)->format('d M Y H:i') : '-' }}</td>
										<td>
											<span class="badge bg-soft-{{ $trx->status === 'pending' ? 'warning' : ($trx->status === 'paid' ? 'success' : 'secondary') }}">
												{{ ucfirst($trx->status) }}
											</span>
										</td>
										<td class="text-end">
											<button type="button" class="btn btn-light btn-sm p-1" data-bs-toggle="dropdown">
												<i data-feather="more-vertical" width="14" height="14"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
												<li>
													<button class="dropdown-item d-flex align-items-center small py-1 lihat-detail" type="button"
														data-bs-toggle="modal"
														data-bs-target="#detailTransaksiModal"

														data-code="{{ $trx->transaction_id }}"
														data-phone="{{ $trx->phone }}"
														data-total="{{ $trx->total_amount }}"
														data-date="{{ $trx->created_at->format('d M Y H:i:s') }}"
														data-status="{{ $trx->status }}"
														data-payment="{{ $trx->payment_status }}"
														data-method="{{ strtoupper($trx->payment_method ?? '-') }}"

														data-items='@json($trx->details->map(fn($d) => [
															"nama_produk" => $d->product->nama_produk ?? "Item",
															"qty" => $d->qty,
															"subtotal" => $d->subtotal
														]))'>
														<i data-feather="eye" class="me-2" width="14" height="14"></i>
														Lihat Detail
													</button>
												</li>
												<li>
													<button
														class="dropdown-item d-flex align-items-center small py-1 btn-edit-laporan"
														type="button"
														data-bs-toggle="modal"
														data-bs-target="#editlaporanModal"
														data-id="{{ $trx->id }}"
														data-nama="{{ $trx->transaction_code }}"
														data-status="{{ $trx->status }}">

														<i data-feather="edit" class="me-2" width="14" height="14"></i>
														Edit
													</button>

												</li>
												<li>
													<form action="{{ route('penjual.laporan.destroy', $trx->id) }}" method="POST"
														onsubmit="return confirm('Yakin hapus transaksi ini?')">
														@csrf
														@method('DELETE')
														<button type="submit"
															class="dropdown-item d-flex align-items-center small py-1 text-danger">
															<i data-feather="trash-2" class="me-2" width="14" height="14"></i>
															Hapus
														</button>
													</form>
												</li>
											</ul>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /product list -->

			</div>
		</div>
	</div>

	<div class="modal fade" id="editlaporanModal" tabindex="-1" aria-labelledby="editlaporanModalLabel"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editlaporanModalLabel">Edit Laporan:
						<strong id="editNamaProduk"></strong>
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<form id="editlaporanForm" method="POST">
					@csrf
					@method('PUT') {{-- Method untuk update --}}

					<div class="modal-body">


						<div class="mb-3">
							<label for="editStatus" class="form-label">Status</label>
							<select class="form-select" id="editStatus" name="status">
								<option value="pending">Pending</option>
								<option value="paid">Paid</option>
								<option value="failed">Failed</option>
								<option value="completed">Completed</option>
							</select>
							<div id="editStatusError" class="text-danger small mt-1"></div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<!-- SATU MODAL DI LUAR LOOP -->
	<div class="modal fade" id="detailTransaksiModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Transaksi</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">

					<div class="card  mb-3">
						<div class="card-body">

							<span class="badge bg-dark fs-12 mb-2" id="strukOrderId"></span>

							<div class="row">
								<div class="col-6">
									<p><b>Cashier:</b> <span id="strukCashier"></span></p>
									<p><b>Total:</b> <span id="strukTotal"></span></p>
								</div>
								<div class="col-6">
									<p><b>Customer:</b> <span id="strukCustomer"></span></p>
									<p><b>Date:</b> <span id="strukDate"></span></p>
								</div>
							</div>

							<p class="mt-2"><b>Payment:</b>
								<span class="badge" id="strukPaymentStatus"></span>
								<small id="strukPaymentMethod"></small>
							</p>

							<p><b>Status Order:</b> <span id="strukStatus"></span></p>

						</div>

						<div class="card-body border-top">
							<h6 class="mb-2">Items</h6>
							<!-- LIST PRODUK DALAM MODAL STRUK -->
							<div id="strukItemList"></div>
						</div>



					</div>
				</div>

			</div>
		</div>
	</div>
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
	<script>
		$(document).ready(function() {
			document.querySelectorAll('.lihat-detail').forEach(btn => {
				btn.addEventListener('click', function() {

					// Ambil data 1 transaksi
					const code = this.dataset.code;
					const phone = this.dataset.phone;
					const total = this.dataset.total;
					const date = this.dataset.date;
					const status = this.dataset.status;
					const payment = this.dataset.payment;
					const method = this.dataset.method;

					// Ambil list produk
					const items = JSON.parse(this.dataset.items);

					// Isi struk sesuai style kamu
					document.getElementById('strukOrderId').textContent = `Order ID : #${code}`;
					document.getElementById('strukCashier').textContent = method.toLowerCase();
					document.getElementById('strukTotal').textContent = `Rp${Number(total).toLocaleString('id-ID')}`;
					document.getElementById('strukCustomer').textContent = phone;
					document.getElementById('strukDate').textContent = date;
					document.getElementById('strukStatus').textContent = status;

					// Badge payment status
					const badge = document.getElementById('strukPaymentStatus');
					badge.textContent = payment;
					badge.className = `badge ${payment.toLowerCase() === 'success' ? 'bg-success' : 'bg-warning'}`;

					document.getElementById('strukPaymentMethod').textContent = `(${method})`;

					// Render list produk ke struk (tanpa mengubah style)
					const itemList = document.getElementById('strukItemList');
					itemList.innerHTML = '';

					items.forEach(i => {
						itemList.innerHTML += `
          <div class="d-flex justify-content-between">
            <span>${i.nama_produk} x${i.qty}</span>
            <span>Rp${Number(i.subtotal).toLocaleString('id-ID')}</span>
          </div>
        `;
					});

				});
			});
		});
	</script>

</body>

</html>