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
	<title>POS - WARTOL</title>

	<!-- /modals -->
	<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

	<!-- Feather Icon JS -->
	<script src="{{ asset('assets/js/feather.min.js') }}"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

	<!-- Datatable JS -->
	<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Chart JS -->
	<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

	<!-- Daterangepicker JS -->
	<script src="{{ asset('assets/js/moment.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

	<!-- Owl JS -->
	<script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

	<!-- Select2 JS -->
	<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

	<!-- Sweetalert 2 -->
	<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

	<!-- Separator -->
	<script src="{{ asset('assets/js/easy-number-separator.js') }}"></script>

	<!-- Live Search -->
	<script src="{{ asset('assets/js/liveSearch.js') }}"></script>

	<!-- Custom JS -->
	<script src="{{ asset('assets/js/theme-script.js') }}"></script>
	<script src="{{ asset('assets/js/script.js') }}"></script>
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

			<div class="content container-fluid mt-4">
				<meta name="csrf-token" content="{{ csrf_token() }}">

				<style>
						/* Prevent horizontal scroll and handle long product names */
						.product-card .card-body {
								word-wrap: break-word;
								overflow-wrap: break-word;
								hyphens: auto;
						}
						.product-name {
								height: auto;
								min-height: 40px;
								overflow: hidden;
								display: -webkit-box;
								-webkit-line-clamp: 2;
								-webkit-box-orient: vertical;
						}
						#cart-table td {
								max-width: 200px;
								word-wrap: break-word;
								white-space: normal;
						}
						.table-responsive {
								overflow-x: visible;
						}
				</style>

				<div class="row">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Produk</h5>
								<div class="row" id="product-list">
									@forelse($products as $product)
										<div class="col-6 col-md-4 col-lg-3 mb-3">
											<div class="card product-card h-100" data-id="{{ $product->id }}"
												data-name="{{ $product->nama_produk }}" data-price="{{ $product->harga }}"
												data-stock="{{ $product->stok }}">
												<div class="card-body p-2 text-center">
													<h6 class="product-name small">{{ $product->nama_produk }}</h6>
													<div class="small text-muted">Stok: {{ $product->stok }}</div>
													<div class="mt-2 fw-bold">Rp {{ number_format($product->harga,0,',','.') }}</div>
												</div>
											</div>
										</div>
									@empty
										<div class="col-12">Belum ada produk.</div>
									@endforelse
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-3">Keranjang</h5>
								<div class="table-responsive">
									<table class="table table-sm" id="cart-table">
										<thead>
											<tr>
												<th style="width: 40%">Produk</th>
												<th style="width: 25%">Jumlah per item</th>
												<th style="width: 25%">Total per Item</th>
												<th style="width: 10%"></th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>

								<div class="d-flex justify-content-between align-items-center mt-2">
									<div><strong>Total:</strong></div>
									<div><strong id="cart-total">Rp 0</strong></div>
								</div>

								<div class="mt-3 d-grid">
									<button class="btn btn-success" id="checkout-btn">Checkout</button>
								</div>

								<div class="mt-2">
									<small class="text-muted">Setiap checkout akan mengurangi stok dan mengembalikan struk (data mentah JSON).</small>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- Modal untuk menampilkan receipt mentah --}}
				<div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Struk (Data Mentah)</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							</div>
							<div class="modal-body">
								<pre id="receipt-raw" style="white-space:pre-wrap;word-wrap:break-word;"></pre>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- Scripts -->
	<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/feather.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
	<script>
		$(function() {
			// Setup CSRF untuk AJAX
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

			const formatRp = (value) => {
				return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
			};

			let cart = {}; // product_id => {id,name,price,qty,stock}

			function renderCart() {
				const $tbody = $('#cart-table tbody');
				$tbody.empty();
				let total = 0;
				Object.values(cart).forEach(item => {
					const line = item.price * item.qty;
					total += line;
					const $tr = $(
						`<tr data-id="${item.id}">
							<td>${item.name}<br><small class="text-muted">Rp ${item.price}</small></td>
							<td style="width:120px;">
								<div class="input-group input-group-sm">
									<button class="btn btn-outline-secondary btn-decr" type="button">-</button>
									<input type="text" class="form-control text-center qty-input" value="${item.qty}" style="width:50px;">
									<button class="btn btn-outline-secondary btn-incr" type="button">+</button>
								</div>
							</td>
							<td>${formatRp(line)}</td>
							<td><button class="btn btn-sm btn-danger btn-remove">x</button></td>
						</tr>`
					);

					$tr.find('.btn-incr').on('click', () => {
						if (item.qty < item.stock) {
							item.qty++;
							renderCart();
						} else {
							Swal.fire('Stok tidak cukup', '', 'warning');
						}
					});
					$tr.find('.btn-decr').on('click', () => {
						if (item.qty > 1) {
							item.qty--;
							renderCart();
						}
					});
					$tr.find('.qty-input').on('change', function() {
						let v = parseInt($(this).val()) || 1;
						if (v < 1) v = 1;
						if (v > item.stock) {
							Swal.fire('Stok tidak cukup', '', 'warning');
							v = item.stock;
						}
						item.qty = v;
						renderCart();
					});
					$tr.find('.btn-remove').on('click', () => {
						delete cart[item.id];
						renderCart();
					});

					$tbody.append($tr);
				});

				$('#cart-total').text(formatRp(total));
			}

			// Klik pada kartu produk -> tambah ke cart
			$('.product-card').on('click', function() {
				const id = $(this).data('id');
				const name = $(this).data('name');
				const price = parseInt($(this).data('price')) || 0;
				const stock = parseInt($(this).data('stock')) || 0;

				if (!cart[id]) {
					if (stock <= 0) { Swal.fire('Stok kosong', '', 'warning'); return; }
					cart[id] = { id, name, price, qty: 1, stock };
				} else {
					if (cart[id].qty < stock) cart[id].qty++;
					else { Swal.fire('Stok tidak cukup', '', 'warning'); }
				}
				renderCart();
			});

			// Checkout
			$('#checkout-btn').on('click', function() {
				const items = Object.values(cart).map(i => ({ product_id: i.id, qty: i.qty }));
				if (items.length === 0) { Swal.fire('Keranjang kosong', '', 'info'); return; }

				$.post("{{ route('penjual.pos.checkout') }}", { cart: items })
					.done(function(res) {
						if (res.success) {
							// Tampilkan struk mentah
							$('#receipt-raw').text(JSON.stringify(res.receipt, null, 2));
							$('#receiptModal').modal('show');
							// Bersihkan cart
							cart = {};
							renderCart();
						} else {
							Swal.fire(res.message || 'Gagal checkout', '', 'error');
						}
					})
					.fail(function(xhr) {
						const msg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Terjadi kesalahan';
						Swal.fire(msg, '', 'error');
					});
			});
		});
	</script>

</body>
</html>