<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>WARTOL</title>

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
        <!-- Main content tulis disini -->
        <div class="content pos-design p-0">
            <div class="row align-items-start pos-wrapper">
                <div class="col-md-12 col-lg-8">
                    <div class="pos-categories tabs_wrapper">
                        <div class="row d-flex justify-content-between mb-3 position-relative" style="z-index: 2;">
                            <div class="col-6">
                                <h5>Categories</h5>
                                <p>Select From Below Categories</p>
                            </div>
                            <div class="col-6 d-flex justify-content-end mt-2 mt-md-0">
                                @auth
                                    {{-- KONDISI: SUDAH LOGIN --}}
                                    {{-- Tampilkan tombol Logout yang mengarah ke route auth.logout --}}
                                    <form action="{{ route('auth.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <span class="me-1 d-flex align-items-center justify-content-center">
                                                {{-- Ikon Log Out --}}
                                                <i data-feather="log-out" class="feather-16 me-3"></i>Logout
                                            </span>
                                        </button>
                                    </form>
                                @else
                                    {{-- KONDISI: BELUM LOGIN --}}
                                    {{-- Tampilkan tombol Login (Buka Modal) --}}
                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#loginModal">
                                        <span class="me-1 d-flex align-items-center justify-content-center">
                                            {{-- Ikon User --}}
                                            <i data-feather="user" class="feather-16 me-3"></i>Login
                                        </span>
                                    </button>
                                @endauth
                            </div>
                        </div>

        <div class="row d-flex justify-content-between mb-3 position-relative" style="z-index: 2;">
            <div class="col-6">
                <h5>Categories</h5>
                <p>Select From Below Categories</p>
            </div>
            <div class="col-6 d-flex justify-content-end mt-2 mt-md-0">
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <span class="me-1 d-flex align-items-center justify-content-center">
                        <i data-feather="user" class="feather-16 me-3"></i>Login
                    </span>
                </button>
            </div>
        </div>

        <ul class="tabs owl-carousel pos-category">
            <li id="all">
                <a href="javascript:void(0);">
                    <img src="assets/img/categories/category-01.png" alt="Categories">
                </a>
                <h6><a href="javascript:void(0);">All Categories</a></h6>
                <span>{{ $products->count() }} Items</span>
            </li>

            @foreach($categories as $category)
                <li id="{{ $category }}">
                    <a href="javascript:void(0);">
                        <img src="assets/img/categories/category-0{{ $loop->iteration + 1 }}.png" alt="Categories">
                    </a>
                    <h6><a href="javascript:void(0);">{{ $category }}</a></h6>
                    <span>{{ $products->where('kategori', $category)->count() }} Items</span>
                </li>
            @endforeach
        </ul>

        <div class="pos-products">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-3">Products</h5>
            </div>

            <div class="tabs_container">

      
                <div class="tab_content active" data-tab="all">
                    <div class="row g-3">

                        @foreach($products as $product)
                        <div class="col-6 col-md-6 col-lg-3 pe-2">

                            <div class="product-info default-cover card h-100 d-flex flex-column"
                                 data-id="{{ $product->id }}"
                                 data-price="{{ $product->harga }}">

                                <a href="javascript:void(0);" class="img-bg mb-2 position-relative">
                                    <img src="{{ $product->gambar ? asset($product->gambar) : asset('assets/img/products/default.png') }}"
                                         alt="{{ $product->nama_produk }}"
                                         class="w-100"
                                         style="height:180px; object-fit:cover;"
                                         onerror="this.onerror=null;this.src='{{ asset('assets/img/products/default.png') }}'">
                                </a>

                                <h6 class="cat-name text-truncate">
                                    <a href="javascript:void(0);">{{ $product->kategori ?? '-' }}</a>
                                </h6>

                                <h6 class="product-name text-truncate">
                                    <a href="javascript:void(0);">{{ $product->nama_produk }}</a>
                                </h6>

                                <div class="d-flex align-items-center justify-content-between mt-auto price">
                                    <span>{{ $product->stok }} Pcs</span>

                                    <!-- FIX: hanya data-price, TIDAK ADA lagi data-id -->
                                    <p class="unit-price" data-price="{{ $product->harga }}">
                                        Rp{{ number_format($product->harga, 0, ',', '.') }}
                                    </p>
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>


                @foreach($categories as $category)
                <div class="tab_content" data-tab="{{ $category }}">
                    <div class="row g-3">

                        @foreach($products->where('kategori', $category) as $product)
                        <div class="col-6 col-md-6 col-lg-3 pe-2">

                            <div class="product-info default-cover card h-100 d-flex flex-column"
                                 data-id="{{ $product->id }}"
                                 data-price="{{ $product->harga }}">

                                <a href="javascript:void(0);" class="img-bg mb-2 position-relative">
                                    <img src="{{ $product->gambar ? asset($product->gambar) : asset('assets/img/products/default.png') }}"
                                         alt="{{ $product->nama_produk }}"
                                         class="w-100"
                                         style="height:180px; object-fit:cover;"
                                         onerror="this.onerror=null;this.src='{{ asset('assets/img/products/default.png') }}'">
                                </a>

                                <h6 class="cat-name text-truncate">
                                    <a href="javascript:void(0);">{{ $product->kategori ?? '-' }}</a>
                                </h6>

                                <h6 class="product-name text-truncate">
                                    <a href="javascript:void(0);">{{ $product->nama_produk }}</a>
                                </h6>

                                <div class="d-flex align-items-center justify-content-between mt-auto price">
                                    <span>{{ $product->stok }} Pcs</span>

                                    <!-- FIX: tidak ada data-id -->
                                    <p class="unit-price" data-price="{{ $product->harga }}">
                                        Rp{{ number_format($product->harga, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</div>



                <div class="col-md-12 col-lg-4 ps-0">
    <aside class="product-order-list">
        <div class="head d-flex align-items-center justify-content-between w-100">
            <div class="">
                <h5>Order List</h5>
                <span id=""></span>
            </div>
        </div>

        <!-- Input nomor telepon wajib -->
        <div class="mb-3">
            <label for="phoneInput" class="form-label">Nomor Telepon</label>
            <input type="text" id="phoneInput" class="form-control" placeholder="Masukkan nomor telepon" required>
        </div>

        <!-- Input jadwal pickup opsional -->
        <div class="mb-3">
            <label for="schedulePickup" class="form-label">Jadwal Pickup (opsional)</label>
            <input type="datetime-local" id="schedulePickup" class="form-control">
        </div>

        <div class="product-added block-section">
            <div class="head-text d-flex align-items-center justify-content-between">
                <h6 class="d-flex align-items-center mb-0">Product Added</h6>
                <a href="javascript:void(0);" id="clearAllProducts" class="d-flex align-items-center text-danger">
                    <span class="me-1"><i data-feather="x" class="feather-16"></i></span>Clear all
                </a>
            </div>
            <div class="product-wrap">
                <!-- Produk akan ditambahkan di sini oleh JS -->
            </div>
        </div>

        <br>
        <div class="btn-row d-sm-flex align-items-center justify-content-between">
            <button id="paymentTotalBtn" class="btn btn-success btn-icon flex-fill" type="button">
    <span class="me-1 d-flex align-items-center">
        <i data-feather="credit-card" class="feather-16"></i>
    </span>
    Payment Total Rp0
</button>
        </div>
    </aside>
</div>

            </div>
        </div>
    </div>

    <!-- /Main Wrapper -->
    <!-- modals -->
    <div class="modal fade modal-default" id="tax" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Tax</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Order Tax <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select</option>
                                <option>No Tax</option>
                                <option>@10</option>
                                <option>@15</option>
                                <option>VAT</option>
                                <option>SLTAX</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-default" id="shipping" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shipping Cost</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Shipping Cost <span class="text-danger">*</span></label>
                            <input type="text" class="form-control number-separator" inputmode="numeric"
                                pattern="[0-9]*">
                            <input type="hidden" class="result-input" id="shipping-cost">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-default" id="discount" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Discount </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Order Discount Type <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select</option>
                                <option>Flat</option>
                                <option>Percentage</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Value <span class="text-danger">*</span></label>
                            <input type="text" class="form-control number-separator" inputmode="numeric"
                                pattern="[0-9]*">
                            <input type="hidden" class="result-input" id="discount">
                        </div>
                    </div>
                    <div class=" modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Payment Completed -->
    <div class="modal fade modal-default" id="payment-completed" aria-labelledby="payment-completed">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="pos.html">
                        <div class="icon-head">
                            <a href="javascript:void(0);">
                                <i data-feather="check-circle" class="feather-40"></i>
                            </a>
                        </div>
                        <h4>Payment Completed</h4>
                        <p class="mb-0">Do you want to Print Receipt for the Completed Order</p>
                        <div class="modal-footer d-sm-flex justify-content-between">
                            <button type="button" class="btn btn-primary flex-fill" data-bs-toggle="modal"
                                data-bs-target="#print-receipt">Print Receipt<i
                                    class="feather-arrow-right-circle icon-me-5"></i></button>
                            <button type="submit" class="btn btn-secondary flex-fill">Next Order<i
                                    class="feather-arrow-right-circle icon-me-5"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Payment Completed -->

   
    {{-- toast --}}
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 2000;">
        <div id="cartToast" class="toast align-items-center text-bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Item berhasil ditambahkan ke keranjang!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    {{-- toast --}}


    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="pos.html">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Phone</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Country</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>City</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Address</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hold -->
    <div class="modal fade modal-default pos-modal" id="hold-order" aria-labelledby="hold-order">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5>Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="pos.html">
                        <h2 class="text-center p-4">4500.00</h2>
                        <div class="input-block">
                            <label>Order Reference</label>
                            <input class="form-control" type="text" value="" placeholder="">
                        </div>
                        <p>The current order will be set on hold. You can retreive this order from the pending order
                            button. Providing a reference to it might help you to identify the order more quickly.</p>
                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Hold -->


    <!-- payment -->
    <div class="modal fade modal-default" id="payment-cash">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalize Sale</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                <select class="select select-payment">
                                    <option value="credit">Credit Card</option>
                                    <option value="cash" selected>Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="points">Points</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
                                            <i class="ti ti-currency-dollar"></i>
                                        </span>
                                        <input type="text" class="form-control number-separator"
                                            inputmode="numeric" pattern="[0-9]*" value="1800">
                                        <input type="hidden" class="result-input" id="paying-amount"
                                            value="1800">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Total<span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
                                            <i class="ti ti-currency-dollar"></i>
                                        </span>
                                        <input type="text" class="form-control number-separator no-border bg-light"
                                            inputmode="numeric" pattern="[0-9]*" value="1800" disabled>
                                        <input type="hidden" class="result-input" id="paying" value="1800">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="change-item mb-3">
                                    <label class="form-label">Change</label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
                                            <i class="ti ti-currency-dollar"></i>
                                        </span>
                                        <input type="text" class="form-control number-separator no-border bg-light"
                                            inputmode="numeric" pattern="[0-9]*" value="0" disabled>
                                        <input type="hidden" class="result-input" id="change" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Total Due (<a href="#">D-423827</a>)</label>
                                    <input type="text" class="form-control number-separator no-border bg-light"
                                        inputmode="numeric" pattern="[0-9]*" value="1800" disabled>
                                    <input type="hidden" class="result-input" id="total-due" value="1800">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Sale Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Staff Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="point-wrap payment-content mb-3">
                            <div
                                class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary" data-bs-toggle="modal"
                            data-bs-target="#payment-completed">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- payment -->

  

    {{-- modal login --}}
    <!-- LOGIN MODAL -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Tab Header -->
                    <ul class="nav nav-tabs nav-tabs-top nav-justified mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="#login-user" data-bs-toggle="tab">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#login-admin" data-bs-toggle="tab">Admin</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- USER LOGIN -->
                        <div class="tab-pane show active" id="login-user">
                            <form action="{{ route('auth.send.otp') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="081234567890">
                                    @error('phone')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button class="btn btn-primary w-100" type="submit">
                                    Kirim Kode OTP
                                </button>
                            </form>
                        </div>

                        <!-- ADMIN LOGIN -->
                        <div class="tab-pane" id="login-admin">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="admin">
                                    </div>
                                    @error('username')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-warning">
                                    Masuk
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal login --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-p90Xji3FUa_ai4zv"></script>
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



{{-- 
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const clearAllBtn = document.getElementById("clearAllProducts");
            const productWrap = document.querySelector(".product-wrap");
            const paymentTotalBtn = document.getElementById("paymentTotalBtn");

            if (clearAllBtn) {
                clearAllBtn.addEventListener("click", function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        showCancelButton: true,
                        confirmButtonColor: '#f39c12',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // hapus semua produk
                            productWrap.innerHTML = "";

                            // reset total payment ke Rp0
                            paymentTotalBtn.innerHTML = `
							<span class="me-1 d-flex align-items-center">
								<i data-feather="credit-card" class="feather-16"></i>
							</span>
							Payment Total Rp0
						`;

                            // re-render feather icon biar muncul lagi
                            if (feather) feather.replace();

                            Swal.fire(
                                'Deleted!',
                                'All products have been cleared.',
                                'success'
                            );
                        }
                    });
                });
            }
        });
    </script> --}}



    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productSearch = document.getElementById("productSearch");
            const productDropdownMenu = document.querySelector("#product-dropdown .dropdown-menu.search-dropdown");
            const productList = document.getElementById("productList");
            const clearProductSearch = document.getElementById("clearProductSearch");

            // 🔎 Fungsi filter produk
            function filterProducts(keyword = "") {
                let found = false;
                const filter = keyword.toLowerCase();

                // --- filter list di dropdown ---
                productList.querySelectorAll("li").forEach(li => {
                    const name = li.querySelector(".product-name")?.textContent.toLowerCase() || "";
                    const price = li.querySelector(".product-price")?.textContent.toLowerCase() || "";

                    if (filter.length >= 3) {
                        if (name.includes(filter) || price.includes(filter)) {
                            li.style.display = "";
                            found = true;
                        } else {
                            li.style.display = "none";
                        }
                    } else {
                        li.style.display = "";
                        found = true;
                    }
                });

                // --- filter produk utama (semua product-info di pos-products & tabs_container) ---
                document.querySelectorAll(".product-info").forEach(prod => {
                    const cat = prod.querySelector(".cat-name a")?.textContent.toLowerCase() || "";
                    const name = prod.querySelector(".product-name a")?.textContent.toLowerCase() || "";
                    const price = prod.querySelector(".price p")?.textContent.toLowerCase() || "";
                    const qty = prod.querySelector(".price span")?.textContent.toLowerCase() || "";

                    // wrapper card (biar hide 1 kotak penuh)
                    const wrapper = prod.closest(".col-sm-2, .col-md-6, .col-lg-3, .col-xl-3");

                    if (filter.length >= 3) {
                        if (
                            cat.includes(filter) ||
                            name.includes(filter) ||
                            price.includes(filter) ||
                            qty.includes(filter)
                        ) {
                            if (wrapper) wrapper.style.display = "";
                            found = true;
                        } else {
                            if (wrapper) wrapper.style.display = "none";
                        }
                    } else {
                        if (wrapper) wrapper.style.display = "";
                        found = true;
                    }
                });

                return found;
            }

            // Event listener: saat user mengetik
            productSearch.addEventListener("input", function() {
                const found = filterProducts(productSearch.value);
                if (productDropdownMenu) {
                    if (found) {
                        productDropdownMenu.classList.add("show");
                    } else {
                        productDropdownMenu.classList.remove("show");
                    }
                }
            });

            // Auto show list saat input fokus
            productSearch.addEventListener("focus", function() {
                filterProducts(productSearch.value);
                productDropdownMenu.classList.add("show");
            });

            // Pilih produk dari dropdown
            productList.addEventListener("click", function(e) {
                const li = e.target.closest("li");
                if (li) {
                    const name = li.querySelector(".product-name")?.textContent.trim() || "";
                    const price = li.querySelector(".product-price")?.textContent.trim() || "";
                    productSearch.value = `${name} - ${price}`;
                    productDropdownMenu.classList.remove("show");
                }
            });

            // Clear search
            if (clearProductSearch) {
                clearProductSearch.addEventListener("click", function(e) {
                    e.preventDefault();
                    productSearch.value = "";
                    filterProducts("");
                    productDropdownMenu.classList.remove("show");
                    productSearch.focus();
                });
            }

            // Klik luar → tutup dropdown
            document.addEventListener("click", function(event) {
                if (!event.target.closest("#product-dropdown")) {
                    productDropdownMenu.classList.remove("show");
                }
            });
        });
    </script> --}}
    <!-- clear product added -->
   

    {{-- js midtrans snap --}}
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
    const paymentBtn = document.getElementById("paymentTotalBtn");
    const productWrap = document.querySelector(".product-wrap");
    const phoneInput = document.querySelector("#phoneInput");
    const scheduleInput = document.querySelector("#schedulePickup");

    if(!paymentBtn || !productWrap) return;

    // ======= Helper =======
    function parsePrice(text) {
        if(!text) return 0;
        return parseInt(text.replace(/[^\d]/g,'')) || 0;
    }

    function collectCartItems() {
        return [...productWrap.querySelectorAll(".product-list")].map(item => ({
            product_id: item.querySelector(".product-id")?.textContent.replace("PT","") || null,
            qty: parseInt(item.querySelector('input[name="qty"]').value || "1", 10),
            price: parsePrice(item.querySelector(".unit-price")?.textContent || "0")
        }));
    }

    function updatePaymentTotal() {
        let total = 0;
        collectCartItems().forEach(item => total += item.qty * item.price);
        paymentBtn.innerHTML = `
            <span class="me-1 d-flex align-items-center">
                <i data-feather="credit-card" class="feather-16"></i>
            </span>
            Payment Total Rp${total.toLocaleString("id-ID")}
        `;
        if(window.feather) feather.replace();
    }

    // ======= Quantity / Delete =======
    document.addEventListener("click", function(e){
        const dec = e.target.closest(".dec");
        const inc = e.target.closest(".inc");
        const del = e.target.closest(".delete-icon");
        if(!dec && !inc && !del) return;

        const productList = (dec||inc||del).closest(".product-list");
        const input = productList.querySelector('input[name="qty"]');

        if(dec){
            let v = parseInt(input.value||"1",10);
            if(v>1) v--;
            input.value=v;
        }
        if(inc){
            let v = parseInt(input.value||"1",10);
            v++;
            input.value=v;
        }
        if(del){
            productList.remove();
        }

        updatePaymentTotal();
    });

    document.addEventListener("input", function(e){
        if(e.target.name === "qty"){
            let v = parseInt(e.target.value||"1",10);
            if(v<1 || isNaN(v)) v=1;
            e.target.value=v;
            updatePaymentTotal();
        }
    });

    // ======= Payment =======
    paymentBtn.addEventListener("click", function() {
        const phone = phoneInput?.value?.trim();
        if(!phone){
            alert("Masukkan nomor telepon terlebih dahulu!");
            return;
        }

        const items = collectCartItems();
        if(items.length === 0){
            alert("Keranjang kosong!");
            return;
        }

        const schedule = scheduleInput?.value || null;

        // Kirim ke backend untuk generate Snap token
        fetch("/penjual/pos/checkout", {
            method: "POST",
            headers: {
                "Content-Type":"application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                phone: phone,
                schedule_pickup: schedule,
                items: items
            })
        })
        .then(res => res.json())
        .then(data => {
            if(data.snap_token){
                snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        alert("Pembayaran sukses!");
                        console.log(result);
                        window.location.reload();
                    },
                    onPending: function(result){
                        alert("Pembayaran pending!");
                        console.log(result);
                    },
                    onError: function(result){
                        alert("Pembayaran gagal!");
                        console.log(result);
                    }
                });
            } else {
                alert("Gagal membuat transaksi.");
                console.error(data);
            }
        })
        .catch(err => {
            console.error(err);
            alert("Terjadi kesalahan server.");
        });
    });
    });
</script> --}}

    {{-- js midtrans snap --}}




    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productWrap = document.querySelector(".product-wrap");
            const paymentBtn = document.getElementById("paymentTotalBtn");
            if (!productWrap || !paymentBtn) return;

            // === Fungsi TOAST ===
            const toastEl = document.getElementById('cartToast');
            const cartToast = new bootstrap.Toast(toastEl, {
                delay: 3000
            });

            function showToast(message = "Item berhasil ditambahkan ke keranjang!") {
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

            function updateItemTotal(itemElement) {
                const priceEl = itemElement.querySelector(".info p");
                const unitPrice = parseFloat(priceEl?.getAttribute("data-price")) || 0;
                const qty = parseInt(itemElement.querySelector('input[name="qty"]')?.value || "1", 10) || 1;
                const newTotal = unitPrice * qty;
                return newTotal;
            }

            function updatePaymentTotal() {
                const items = productWrap.querySelectorAll(".product-list");
                let total = 0;
                items.forEach(item => {
                    const price = parsePrice(item.querySelector(".info p")?.textContent || "");
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
            }

            document.querySelectorAll(".product-info").forEach(card => {
                card.addEventListener("click", function() {
                    const img = this.querySelector("img")?.getAttribute("src") ||
                        "assets/img/products/brosur.png";
                    const nameEl = this.querySelector(".product-name a, .product-name") ||
                        this.querySelector(".cat-name a, .cat-name");
                    const name = (nameEl?.textContent || "Product").trim();
                    const priceText = (this.querySelector(".price p")?.textContent ||
                        this.querySelector(".price")?.textContent || "$0");
                    const rawPrice = parsePrice(priceText);

                    // ✅ CEK APAKAH ITEM SUDAH ADA
                    const exist = [...productWrap.querySelectorAll(".product-list")].find(el =>
                        el.querySelector("h6 a")?.textContent.trim() === name
                    );

                    if (exist) {
                        const qtyInput = exist.querySelector('input[name="qty"]');
                        qtyInput.value = parseInt(qtyInput.value) + 1;
                        updatePaymentTotal();
                        showToast(`Jumlah ${name} ditambah ke keranjang`);
                        return;
                    }

                    // ✅ ITEM BARU
                    const newProduct = document.createElement("div");
                    newProduct.className =
                        "product-list align-items-center justify-content-between";
                    newProduct.innerHTML = `
                <div class="d-flex align-items-center product-info w-100">
                    <a href="javascript:void(0);" class="img-bg">
                        <img src="${img}" alt="Products">
                    </a>
                    <div class="info">
                        <span class="product-id">PT${String(Math.floor(Math.random()*90000)+10000)}</span>
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
                        <a class="btn-icon delete-icon confirm-text"><i data-feather="trash-2" class="feather-14"></i></a>
                    </div>
                </div>
            `;

                    productWrap.appendChild(newProduct);
                    if (window.feather) feather.replace();
                    updatePaymentTotal();
                    showToast(`${name} ditambahkan ke keranjang`);
                });
            });

            // delegasi qty + delete
            document.addEventListener("click", function(e) {
                const dec = e.target.closest(".dec");
                const inc = e.target.closest(".inc");
                const del = e.target.closest(".delete-icon");
                let productList;

                if (dec) {
                    productList = dec.closest(".product-list");
                    const input = productList.querySelector("input[name='qty']");
                    let v = parseInt(input.value || "1", 10);
                    if (v > 1) v--;
                    input.value = v;
                    updateItemTotal(productList);
                    updatePaymentTotal();
                }

                if (inc) {
                    productList = inc.closest(".product-list");
                    const input = productList.querySelector("input[name='qty']");
                    let v = parseInt(input.value || "1", 10);
                    v++;
                    input.value = v;
                    updateItemTotal(productList);
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
                    let v = parseInt(e.target.value || "1", 10);
                    if (v < 1 || isNaN(v)) v = 1;
                    e.target.value = v;
                    updateItemTotal(productList);
                    updatePaymentTotal();
                }
            });
        });
    </script> --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    
    const clearAllBtn = document.getElementById("clearAllProducts");
    const productWrap = document.querySelector(".product-wrap");
    const paymentBtn = document.getElementById("paymentTotalBtn");
    const phoneInput = document.querySelector("#phoneInput");
    const scheduleInput = document.querySelector("#schedulePickup");
    const toastEl = document.getElementById('cartToast');
    const cartToast = toastEl ? new bootstrap.Toast(toastEl, {delay: 3000}) : null;

    if (!productWrap || !paymentBtn) return;

    /* ==============================
        HELPER FUNCTIONS
    ============================== */
    function parsePrice(text) {
        if (!text) return 0;
        const cleaned = String(text).replace(/[^\d]/g, "");
        return parseInt(cleaned, 10) || 0;
    }

    function formatPrice(number) {
        return Number(number).toLocaleString("id-ID", {minimumFractionDigits: 0});
    }

    function parseId(raw) {
        if (!raw) return null;
        const str = String(raw).trim();
        // Hanya terima angka murni
        if (/^\d+$/.test(str)) {
            const id = parseInt(str, 10);
            return (id > 0) ? id : null;
        }
        return null;
    }

    /* ==============================
        COLLECT CART ITEMS (VALIDASI KETAT)
    ============================== */
    function collectCartItems() {
        const items = [...productWrap.querySelectorAll(".product-list")]
            .map(item => {
                const pidEl = item.querySelector(".product-id");
                const rawId = pidEl?.dataset?.id;
                const product_id = parseId(rawId);

                // ✅ Skip jika ID tidak valid
                if (!product_id || product_id <= 0) {
                    console.warn("⚠️ Item diabaikan - ID tidak valid:", {rawId, element: item});
                    return null;
                }

                const unitEl = item.querySelector(".unit-price");
                const price = parsePrice(unitEl?.dataset?.price || unitEl?.textContent || "0");
                const qty = parseInt(item.querySelector('input[name="qty"]')?.value || "1", 10);

                // ✅ Skip jika qty invalid
                if (qty < 1 || isNaN(qty)) {
                    console.warn("⚠️ Item diabaikan - Qty tidak valid:", {product_id, qty});
                    return null;
                }

                console.log("✅ Item valid:", {product_id, qty, price});
                return {product_id, qty, price};
            })
            .filter(i => i !== null);

        return items;
    }

    function calculateTotal(items) {
        return items.reduce((acc, i) => acc + (i.qty * i.price), 0);
    }

    function updatePaymentTotal() {
        const items = collectCartItems();
        const total = calculateTotal(items);
        paymentBtn.innerHTML = `
            <span class="me-1 d-flex align-items-center">
                <i data-feather="credit-card" class="feather-16"></i>
            </span>
            Payment Total Rp${formatPrice(total)}
        `;
        if (window.feather) feather.replace();
    }

    function showToast(msg) {
        if (!cartToast) return;
        const body = toastEl.querySelector('.toast-body');
        if (body) body.textContent = msg;
        cartToast.show();
    }

    function showCustomAlert(message) {
        console.error("🚨 ALERT:", message);
        const modalEl = document.getElementById('infoModal');
        if (modalEl) {
            const modalBody = modalEl.querySelector('.modal-body');
            if (modalBody) modalBody.textContent = message;
            new bootstrap.Modal(modalEl).show();
        } else {
            // Fallback visual alert
            const body = document.querySelector('body');
            const tempAlert = document.createElement('div');
            tempAlert.style.cssText = 'position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);padding:20px;background:#dc3545;color:white;z-index:9999;border-radius:8px;box-shadow:0 4px 6px rgba(0,0,0,0.3);max-width:400px;text-align:center;';
            tempAlert.textContent = message;
            body.appendChild(tempAlert);
            setTimeout(() => tempAlert.remove(), 4000);
        }
    }

    /* ==============================
        DEBUG: CLEANUP HIDDEN BUGS
    ============================== */
    const hiddenBugs = document.querySelectorAll('.product-info[data-id="10023"], .product-info[data-id=""]');
    if (hiddenBugs.length > 0) {
        console.error("🐛 BUG: Ditemukan", hiddenBugs.length, "elemen dengan ID tidak valid. Elemen dihapus!");
        hiddenBugs.forEach(el => el.remove());
        showCustomAlert(`BUG: Ditemukan ${hiddenBugs.length} produk dengan ID tidak valid. Elemen telah dihapus otomatis.`);
    }

    /* ==============================
        ADD PRODUCT TO CART
    ============================== */
    document.querySelectorAll(".product-info").forEach(card => {
        card.addEventListener("click", function() {
            const img = this.querySelector("img")?.getAttribute("src") || "/assets/img/products/default.png";
            const nameEl = this.querySelector(".product-name a, .product-name");
            const name = (nameEl?.textContent || "Produk").trim();

            const rawId = this.dataset?.id?.trim();
            const productId = parseId(rawId);

            // ✅ VALIDASI: ID harus valid
            if (!productId) {
                console.error("❌ Produk tidak punya ID valid:", {rawId, element: this});
                showCustomAlert("Produk ini tidak memiliki ID valid! Hubungi admin.");
                return;
            }

            const rawPrice = parsePrice(this.dataset?.price || this.querySelector(".unit-price")?.dataset?.price || "0");

            // ✅ Cek apakah sudah ada di cart
            const exist = [...productWrap.querySelectorAll(".product-list")]
                .find(el => {
                    const existId = parseId(el.querySelector(".product-id")?.dataset?.id);
                    return existId === productId;
                });

            if (exist) {
                const qtyInput = exist.querySelector('input[name="qty"]');
                qtyInput.value = parseInt(qtyInput.value || 1) + 1;
                updatePaymentTotal();
                showToast(`Jumlah ${name} bertambah`);
                return;
            }

            // ✅ Tambah item baru
            const newProduct = document.createElement("div");
            newProduct.className = "product-list align-items-center justify-content-between";
            newProduct.innerHTML = `
                <div class="d-flex align-items-center product-info w-100">
                    <a href="javascript:void(0);" class="img-bg">
                        <img src="${img}" alt="Products">
                    </a>
                    <div class="info">
                        <span class="product-id" data-id="${productId}">PT${productId}</span>
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
            showToast(`${name} ditambahkan`);
        });
    });

    /* ==============================
        QTY CONTROLS & DELETE
    ============================== */
    document.addEventListener("click", function(e) {
        const dec = e.target.closest(".dec");
        const inc = e.target.closest(".inc");
        const del = e.target.closest(".delete-icon");

        if (!dec && !inc && !del) return;

        const item = (dec || inc || del).closest(".product-list");
        if (!item) return;

        const input = item.querySelector('input[name="qty"]');

        if (del) {
            item.remove();
        } else if (dec) {
            input.value = Math.max(1, parseInt(input.value || 1) - 1);
        } else if (inc) {
            input.value = parseInt(input.value || 1) + 1;
        }

        updatePaymentTotal();
    });

    document.addEventListener("input", function(e) {
        if (e.target.name === "qty") {
            let v = parseInt(e.target.value || 1);
            e.target.value = (v < 1 || isNaN(v)) ? 1 : v;
            updatePaymentTotal();
        }
    });

    /* ==============================
        CLEAR ALL PRODUCTS
    ============================== */
    if (clearAllBtn) {
        clearAllBtn.addEventListener("click", function(e) {
            e.preventDefault();
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Hapus Semua?',
                    text: "Keranjang akan dikosongkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f39c12',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        productWrap.innerHTML = "";
                        updatePaymentTotal();
                        Swal.fire('Terhapus!', 'Keranjang telah dikosongkan.', 'success');
                    }
                });
            } else {
                if (confirm("Hapus semua produk dari keranjang?")) {
                    productWrap.innerHTML = "";
                    updatePaymentTotal();
                }
            }
        });
    }

    /* ==============================
        MIDTRANS CHECKOUT
    ============================== */
    paymentBtn.addEventListener("click", async function() {
        const phone = phoneInput?.value?.trim();
        if (!phone) {
            return showCustomAlert("Masukkan nomor telepon terlebih dahulu!");
        }

        const items = collectCartItems();

        // ✅ DEBUGGING: Log items
        console.log("📦 Items yang akan dikirim ke server:", items);

        // ✅ VALIDASI: Keranjang tidak boleh kosong
        if (items.length === 0) {
            return showCustomAlert("Keranjang kosong! Tambahkan produk terlebih dahulu.");
        }

        // ✅ VALIDASI: Cek apakah ada ID yang mencurigakan (sesuaikan dengan range ID database Anda)
        const invalidIds = items.filter(i => i.product_id > 100); // Sesuaikan: jika ID Anda max 100
        if (invalidIds.length > 0) {
            console.error("❌ ID tidak valid ditemukan:", invalidIds);
            return showCustomAlert("Ada produk dengan ID tidak valid di keranjang. Refresh halaman dan coba lagi!");
        }

        const schedule = scheduleInput?.value || null;

        // ✅ Disable button saat proses
        paymentBtn.disabled = true;
        const originalHTML = paymentBtn.innerHTML;
        paymentBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Processing...`;
        if (window.feather) feather.replace();

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
            if (!csrfToken) {
                throw new Error("CSRF token tidak ditemukan!");
            }

            const response = await fetch("/createorderjs", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({
                    phone: phone,
                    schedule_pickup: schedule,
                    items: items
                }),
                credentials: "same-origin"
            });

            let data = null;
            try {
                data = await response.json();
            } catch (parseError) {
                console.error("❌ JSON parse error:", parseError);
                throw new Error("Server tidak mengirim response JSON yang valid.");
            }

            console.log("📥 Response dari server:", data);

            if (!response.ok) {
                const errorMsg = data?.error || data?.message || `Server error: ${response.status}`;
                console.error("❌ Server error:", data);
                throw new Error(errorMsg);
            }

            if (!data?.snap_token) {
                console.error("❌ Snap token tidak ditemukan:", data);
                throw new Error("Snap token tidak ditemukan dalam response.");
            }

            // ✅ Cek apakah Midtrans Snap sudah loaded
            if (typeof snap === "undefined") {
                throw new Error("Midtrans Snap belum loaded! Pastikan script Midtrans sudah dimuat.");
            }

            // ✅ Open Midtrans payment popup
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    console.log("✅ Payment success:", result);
                    showCustomAlert("Pembayaran berhasil!");
                    setTimeout(() => location.reload(), 1500);
                },
                onPending: function(result) {
                    console.log("⏳ Payment pending:", result);
                    showCustomAlert("Pembayaran tertunda. Silakan selesaikan pembayaran Anda.");
                },
                onError: function(result) {
                    console.error("❌ Payment error:", result);
                    showCustomAlert("Pembayaran gagal. Silakan coba lagi.");
                },
                onClose: function() {
                    console.log("👋 Payment popup closed");
                }
            });

        } catch (error) {
            console.error("❌ Checkout error:", error);
            showCustomAlert(`Gagal membuat transaksi: ${error.message}`);
        } finally {
            // ✅ Re-enable button
            paymentBtn.disabled = false;
            paymentBtn.innerHTML = originalHTML;
            if (window.feather) feather.replace();
        }
    });

    /* ==============================
        CREATE INFO MODAL IF NOT EXISTS
    ============================== */
    if (!document.getElementById('infoModal')) {
        const modalHTML = `
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Message will be inserted here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        `;
        document.body.insertAdjacentHTML('beforeend', modalHTML);
    }

    // ✅ Initialize payment total on load
    updatePaymentTotal();
});
</script>





    <!-- custom ukuran -->
</body>


</html>
