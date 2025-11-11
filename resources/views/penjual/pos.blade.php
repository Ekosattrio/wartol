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
{{-- 
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
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
	 <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.theme.default.min.css') }}">

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

			<div class="content container-fluid mt-4  pos-design p-0">
				<meta name="csrf-token" content="{{ csrf_token() }}">

				{{-- <style>
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
				</style> --}}
				
				{{-- <div class="row">
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
							</div>
						</div>
					</div>
				</div> --}}

				{{-- ubah eko --}}
				<div class="row align-items-start pos-wrapper">
					<div class="col-md-12 col-lg-8">
						<div class="pos-categories tabs_wrapper">
							<div class="row d-flex justify-content-between mb-3 position-relative" style="z-index: 2;">
								<div class="col-6">
									<h5>Categories</h5>
									<p>Select From Below Categories</p>
								</div>
								
							</div>

							<!-- KATEGORI (STATIS) -->
							<ul class="tabs owl-carousel pos-category">
								<li id="all" class="active">
										<a href="javascript:void(0);">
											<img src="{{ asset('assets/img/categories/category-01.png') }}" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">All Categories</a></h6>
										<span>{{ count($products) }} Items</span>
									</li>
									<li id="Ayam">
										<a href="javascript:void(0);">
											<img src="{{ asset('assets/img/categories/category-02.png') }}" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Ayam</a></h6>
										<span>—</span>
									</li>
									<li id="Ikan">
										<a href="javascript:void(0);">
											<img src="{{ asset('assets/img/categories/category-03.png') }}" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Ikan</a></h6>
										<span>—</span>
									</li>
									<li id="Sayur">
										<a href="javascript:void(0);">
											<img src="{{ asset('assets/img/categories/category-04.png') }}" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Sayur</a></h6>
										<span>—</span>
									</li>
									<li id="Lainnya">
										<a href="javascript:void(0);">
											<img src="{{ asset('assets/img/categories/category-05.png') }}" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Lainnya</a></h6>
										<span>—</span>
									</li>

							</ul>

							<!-- PRODUK -->
							<div class="pos-products">
								<div class="d-flex align-items-center justify-content-between">
									<h5 class="mb-3">Products</h5>
								</div>

								<div class="tabs_container">
									<div class="tab_content active" data-tab="all">
										<div class="row">
											@forelse($products as $product)
												<div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-id="{{ $product->id }}"
													data-name="{{ $product->nama_produk }}" data-price="{{ $product->harga }}"
													data-stock="{{ $product->stok }}" data-bs-toggle="modal"
													data-bs-target="#add-product">
													<div class="product-info default-cover card">
														<a href="javascript:void(0);" class="img-bg">
															<img src="{{ asset('assets/img/products/default.png') }}" alt="Products">
														</a>
														<h6 class="cat-name">
															<a href="javascript:void(0);">{{ $product->kategori ?? 'Tanpa Kategori' }}</a>
														</h6>
														<h6 class="product-name">
															<a href="javascript:void(0);">{{ $product->nama_produk }}</a>
														</h6>
														<div
															class="d-flex align-items-center justify-content-between price text-nowrap">
															<span>{{ $product->stok }} Pcs</span>
															<p>Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
														</div>
													</div>
												</div>
											@empty
												<div class="col-12 text-center text-muted">Belum ada produk.</div>
											@endforelse
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- KANAN / KERANJANG -->
					<div class="col-md-12 col-lg-4 ps-0">
						<aside class="product-order-list">
							<div class="head d-flex align-items-center justify-content-between w-100">
								<div>
									<h5>Order List</h5>
									<span>Transaction ID : #{{ rand(10000,99999) }}</span>
								</div>
							</div>

							<div class="product-added block-section">
								<div class="head-text d-flex align-items-center justify-content-between">
									<h6 class="d-flex align-items-center mb-0">Product Added</h6>
									<a href="javascript:void(0);" id="clearAllProducts"
										class="d-flex align-items-center text-danger">
										<span class="me-1"><i data-feather="x" class="feather-16"></i></span>Clear all
									</a>
								</div>
								<div class="product-wrap">
								</div>
							</div>

							<br>
							<div class="btn-row d-sm-flex align-items-center justify-content-between">
								<button id="paymentTotalBtn" type="button" class="btn btn-success btn-icon flex-fill">
									<span class="me-1 d-flex align-items-center">
										<i data-feather="credit-card" class="feather-16"></i>
									</span>
									Payment Total Rp0
								</button>
							</div>
						</aside>
					</div>
			</div>

				{{-- ubah eko --}}
				
				{{-- Modal untuk menampilkan struk --}}
				<div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Struk Pembayaran</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							</div>
							<div class="modal-body" id="receipt-content">
								{{-- Content will be injected by JS --}}
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
								<button type="button" class="btn btn-primary" id="print-receipt-btn">Cetak Struk</button>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- /Page Wrapper -->
	</div>
	{{-- toast --}}
	<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
    <div id="cartToast" class="toast text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">Item berhasil ditambahkan ke keranjang!</div>
    </div>
</div>
	{{-- toast --}}
	<!-- /Main Wrapper -->
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
	<!-- Scripts -->
		{{-- <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/js/feather.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script> --}}


	{{-- eko baru --}}
	<script>
document.addEventListener("DOMContentLoaded", function() {
	const productWrap = document.querySelector(".product-wrap");
	const paymentBtn = document.getElementById("paymentTotalBtn");
	const clearAllBtn = document.getElementById("clearAllProducts");
	const receiptModal = document.getElementById("receiptModal");
	if (!productWrap || !paymentBtn) return;

	const toastEl = document.getElementById('cartToast');
	const cartToast = toastEl ? new bootstrap.Toast(toastEl, { delay: 2000 }) : null;

	function showToast(message, type = 'success') {
		if (!toastEl || !cartToast) return;

		toastEl.classList.remove('bg-success', 'bg-danger');
		if (type === 'success') {
			toastEl.classList.add('bg-success');
		} else {
			toastEl.classList.add('bg-danger');
		}

		toastEl.querySelector('.toast-body').textContent = message;
		cartToast.show();
	}

	function parsePrice(text) {
		if (!text) return 0;
		const cleanedText = text.replace(/[^\d.,]/g, '');
		const priceString = cleanedText.replace(/\./g, '').replace(/,/g, '.');
		return parseFloat(priceString) || 0;
	}

	function formatPrice(number) {
		return number.toLocaleString("id-ID", {
			minimumFractionDigits: 0,
			maximumFractionDigits: 2
		});
	}

	function updatePaymentTotal() {
		const items = productWrap.querySelectorAll(".product-list");
		let total = 0;
		items.forEach(item => {
			const price = parseFloat(item.querySelector(".unit-price")?.dataset.price || 0);
			const qty = parseInt(item.querySelector('input[name="qty"]')?.value || "1", 10) || 1;
			total += price * qty;
		});

		paymentBtn.innerHTML = `
			<span class="me-1 d-flex align-items-center">
				<i data-feather="credit-card" class="feather-16"></i>
			</span>
			Payment Total Rp${total.toLocaleString("id-ID")}
		`;
		if (window.feather) feather.replace();
		return total;
	}

	// === Tambah produk ke keranjang ===
	document.querySelectorAll(".product-info").forEach(card => {
		card.addEventListener("click", function() {
			const parentCard = this.closest("[data-id]");
			const stock = parseInt(parentCard.dataset.stock, 10);
			const productId = parseInt(parentCard.dataset.id, 10);
			const name = (this.querySelector(".product-name a")?.textContent || "Product").trim();

			const exist = [...productWrap.querySelectorAll(".product-list")].find(el =>
				el.querySelector(".product-id")?.dataset.productId == productId
			);

			if (exist) {
				const qtyInput = exist.querySelector('input[name="qty"]');
				const currentQty = parseInt(qtyInput.value, 10);
				if (currentQty >= stock) {
					showToast('Stok tidak mencukupi!', 'error');
					return;
				}
				qtyInput.value = currentQty + 1;
				updatePaymentTotal();
				showToast(`Jumlah ${name} ditambah ke keranjang`);
				return;
			}

			if (stock < 1) {
				showToast('Stok produk habis!', 'error');
				return;
			}
			
			const img = this.querySelector("img")?.getAttribute("src") || "assets/img/products/default.png";
			const priceText = this.querySelector(".price p")?.textContent || "Rp0";
			const rawPrice = parsePrice(priceText);

			const newProduct = document.createElement("div");
			newProduct.className = "product-list align-items-center justify-content-between";
			newProduct.innerHTML = `
				<div class="d-flex align-items-center product-info w-100">
					<a href="javascript:void(0);" class="img-bg">
						<img src="${img}" alt="Products">
					</a>
					<div class="info">
						<span class="product-id" data-product-id="${productId}"></span>
						<h6><a href="javascript:void(0);">${name}</a></h6>
						<p class="unit-price" data-price="${rawPrice}">Rp${formatPrice(rawPrice)}</p>
					</div>
				</div>
				<div class="d-flex justify-content-end">
					<div class="qty-item text-center">
						<a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center">
							<i data-feather="minus-circle" class="feather-14"></i>
						</a>
						<input type="text" class="form-control text-center" name="qty" value="1">
						<a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center">
							<i data-feather="plus-circle" class="feather-14"></i>
						</a>
					</div>
					<div class="d-flex align-items-center action">
						<a class="btn-icon delete-icon confirm-text">
							<i data-feather="trash-2" class="feather-14"></i>
						</a>
					</div>
				</div>
			`;

			productWrap.appendChild(newProduct);
			if (window.feather) feather.replace();
			updatePaymentTotal();
			showToast(`${name} ditambahkan ke keranjang`);
		});
	});

	// === Aksi tombol +, -, hapus produk ===
	document.addEventListener("click", function(e) {
		const dec = e.target.closest(".dec");
		const inc = e.target.closest(".inc");
		const del = e.target.closest(".delete-icon");

		if (dec) {
			const productList = dec.closest(".product-list");
			const input = productList.querySelector("input[name='qty']");
			let v = parseInt(input.value || "1", 10);
			if (v > 1) v--;
			input.value = v;
			updatePaymentTotal();
		}

		if (inc) {
			const productList = inc.closest(".product-list");
			const productId = parseInt(productList.querySelector(".product-id").dataset.productId, 10);
			const productCard = document.querySelector(`[data-id='${productId}']`);
			const stock = parseInt(productCard.dataset.stock, 10);
			const input = productList.querySelector("input[name='qty']");
			let v = parseInt(input.value || "1", 10);

			if (v >= stock) {
				showToast('Stok tidak mencukupi!', 'error');
				return;
			}
			v++;
			input.value = v;
			updatePaymentTotal();
		}

		if (del) {
			del.closest(".product-list")?.remove();
			updatePaymentTotal();
		}
	});

	document.addEventListener("input", function(e) {
		if (e.target.name === "qty") {
			const productList = e.target.closest(".product-list");
			const productId = parseInt(productList.querySelector(".product-id").dataset.productId, 10);
			const productCard = document.querySelector(`[data-id='${productId}']`);
			const stock = parseInt(productCard.dataset.stock, 10);
			
			let v = parseInt(e.target.value || "1", 10);
			if (isNaN(v) || v < 1) {
				v = 1;
			}
			if (v > stock) {
				v = stock;
				showToast('Stok tidak mencukupi!', 'error');
			}
			e.target.value = v;
			updatePaymentTotal();
		}
	});

	if (clearAllBtn) {
		clearAllBtn.addEventListener("click", function() {
			productWrap.innerHTML = "";
			updatePaymentTotal();
			showToast("Semua produk dihapus dari keranjang", "success");
		});
	}

	// === Checkout lewat tombol Payment Total ===
	paymentBtn.addEventListener("click", async function() {
		const items = [...productWrap.querySelectorAll(".product-list")];
		if (items.length === 0) {
			showToast("Keranjang masih kosong!", "error");
			return;
		}

		const cart = items.map(item => ({
			product_id: parseInt(item.querySelector(".product-id")?.dataset.productId || 0),
			qty: parseInt(item.querySelector('input[name="qty"]')?.value || "1", 10)
		}));

		paymentBtn.disabled = true;
		const originalText = paymentBtn.innerHTML;
		paymentBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Memproses...`;

		try {
			const response = await fetch("{{ route('penjual.pos.checkout') }}", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
				},
				body: JSON.stringify({ cart })
			});

			const result = await response.json();
			if (!result.success) {
				showToast(result.message || "Checkout gagal", "error");
				paymentBtn.innerHTML = originalText;
				paymentBtn.disabled = false;
				return;
			}

			const { receipt } = result;
			const modalBody = receiptModal.querySelector(".modal-body");

			const formatDate = (dateString) => {
					const date = new Date(dateString);
					const day = date.getDate().toString().padStart(2, '0');
					const month = (date.getMonth() + 1).toString().padStart(2, '0');
					const year = date.getFullYear();
					const hours = date.getHours().toString().padStart(2, '0');
					const minutes = date.getMinutes().toString().padStart(2, '0');
					const seconds = date.getSeconds().toString().padStart(2, '0');
					return `${day}/${month}/${year}, ${hours}.${minutes}.${seconds}`;
			};

			modalBody.innerHTML = `
				<div class="text-center mb-3">
						<h4 class="mb-0">Warteg Jaya</h4>
						<p class="mb-0 small text-muted">Alamat</p>
				</div>
				<p class="mb-1"><strong>No. Transaksi:</strong> ${receipt.transaction_code}</p>
				<p class="mb-2"><strong>Tanggal:</strong> ${formatDate(receipt.created_at)}</p>
				<hr class="mt-0">
				<table class="table table-sm table-borderless">
						<thead>
								<tr>
										<th style="width: 40%; padding-left: 0;">Produk</th>
										<th class="text-center">Jumlah</th>
										<th class="text-end">Harga</th>
										<th class="text-end" style="padding-right: 0;">Subtotal</th>
								</tr>
						</thead>
						<tbody>
								${receipt.details.map(i => `
										<tr>
												<td style="padding-left: 0;">${i.product_name}</td>
												<td class="text-center">${i.qty}</td>
												<td class="text-end">Rp${formatPrice(i.price)}</td>
												<td class="text-end" style="padding-right: 0;">Rp${formatPrice(i.subtotal)}</td>
										</tr>
								`).join("")}
						</tbody>
				</table>
				<hr>
				<div class="d-flex justify-content-end align-items-center mb-3">
						<p class="mb-0 me-3"><strong>Total:</strong></p>
						<h5 class="mb-0"><strong>Rp${formatPrice(receipt.total_amount)}</strong></h5>
				</div>
				<div class="text-center mt-3">
						<p class="text-muted">Terima kasih telah berbelanja!</p>
						<p class="text-muted">Silahkan anda screenshoot sebagai bukti pembayaran!</p>
				</div>
			`;

			const receiptModalInstance = new bootstrap.Modal(receiptModal);
			receiptModalInstance.show();

			// Reload page after modal is closed to update stock
			receiptModal.addEventListener('hidden.bs.modal', () => {
				location.reload();
			}, { once: true });

			productWrap.innerHTML = "";
			updatePaymentTotal();
			showToast("Checkout berhasil!");

		} catch (err) {
			console.error(err);
			showToast("Terjadi kesalahan server", "error");
		} finally {
			paymentBtn.innerHTML = originalText;
			paymentBtn.disabled = false;
		}
	});
});
</script>





	{{-- eko baru --}}
</body>
</html>