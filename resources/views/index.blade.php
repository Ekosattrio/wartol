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
                                <button class="btn btn-secondary " data-bs-toggle="modal" data-bs-target="#loginModal">
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
                                <span>80 Items</span>
                            </li>
                            <li id="Ayam">
                                <a href="javascript:void(0);">
                                    <img src="assets/img/categories/category-02.png" alt="Categories">
                                </a>
                                <h6><a href="javascript:void(0);">Ayam</a></h6>
                                <span>4 Items</span>
                            </li>
                            <li id="Ikan">
                                <a href="javascript:void(0);">
                                    <img src="assets/img/categories/category-03.png" alt="Categories">
                                </a>
                                <h6><a href="javascript:void(0);">Ikan</a></h6>
                                <span>14 Items</span>
                            </li>
                            <li id="Sayur">
                                <a href="javascript:void(0);">
                                    <img src="assets/img/categories/category-04.png" alt="Categories">
                                </a>
                                <h6><a href="javascript:void(0);">Sayur</a></h6>
                                <span>7 Items</span>
                            </li>

                        </ul>
                        <div class="pos-products">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-3">Products</h5>
                            </div>
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="all">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/brosur.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Cetak Full Color</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Brosur</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-07.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Ideapad slim
                                                        7</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-08.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ayam</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Ayam
                                                        Iphone</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-10.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Handphoner</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Iphoner</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-12.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Samsung ROG</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-12.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Samsung ROG</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-12.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Samsung ROG</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal"
                                            data-bs-target="#add-product">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-12.png" alt="Products">
                                                    <!-- <span><i data-feather="check" class="feather-16"></i></span> -->
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a>
                                                </h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Samsung ROG</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="tab_content" data-tab="Ayam">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-05.png" alt="Products">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ayam</a></h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Airpod 2</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>47 Pcs</span>
                                                    <p>Rp5478</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-08.png" alt="Products">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ayam</a></h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">SWAGME</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>14 Pcs</span>
                                                    <p>Rp6587</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab_content" data-tab="Ikan">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-04.png" alt="Products">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a></h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Red Nike
                                                        Angelo</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>78 Pcs</span>
                                                    <p>Rp7800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-06.png" alt="Products">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a></h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Blue White
                                                        OGR</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>54 Pcs</span>
                                                    <p>Rp987</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-18.png" alt="Products">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Ikan</a></h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Green Nike
                                                        Fe</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>78 Pcs</span>
                                                    <p>Rp7847</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab_content" data-tab="Sayur">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-01.png" alt="Products">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Sayur</a></h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">IPhone 14
                                                        64GB</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>Rp15800</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="assets/img/products/pos-product-14.png" alt="Products">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">Sayur</a></h6>
                                                <h6 class="product-name"><a href="javascript:void(0);">Iphone 11</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>14 Pcs</span>
                                                    <p>Rp3654</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 ps-0">
                    <aside class="product-order-list">
                        <div class="head d-flex align-items-center justify-content-between w-100">
                            <div class="">
                                <h5>Order List</h5>
                                <span>Transaction ID : #65565</span>
                            </div>

                        </div>


                        <div class="product-added block-section">
                            <div class="head-text d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center mb-0">Product Added
                                </h6>
                                <a href="javascript:void(0);" id="clearAllProducts"
                                    class="d-flex align-items-center text-danger"><span class="me-1"><i
                                            data-feather="x" class="feather-16"></i></span>Clear all</a>
                            </div>
                            <div class="product-wrap">
                                <div class="product-list align-items-center justify-content-between">

                                </div>

                            </div>
                        </div>



                        <br>
                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                            <!-- ini ada payment complete buat abis modal harusnya -->
                            <a id="paymentTotalBtn" class="btn btn-success btn-icon flex-fill" data-bs-toggle="modal"
                                data-bs-target="#payment-cash">
                                <span class="me-1 d-flex align-items-center">
                                    <i data-feather="credit-card" class="feather-16"></i>
                                </span>
                                Payment Total Rp0
                            </a>
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

    <!-- Print Receipt -->
    <div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end">
                    <button type="button" class="close p-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="icon-head text-center">
                        <a href="javascript:void(0);">
                            <img src="assets/img/logo.png" width="100" height="30" alt="Receipt Logo">
                        </a>
                    </div>
                    <div class="text-center info text-center">
                        <h6>Dreamguys Technologies Pvt Ltd.,</h6>
                        <p class="mb-0">Phone Number: +1 5656665656</p>
                        <p class="mb-0">Email: <a href="mailto:example@gmail.com">example@gmail.com</a></p>
                    </div>
                    <div class="tax-invoice">
                        <h6 class="text-center">Tax Invoice</h6>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="invoice-user-name"><span>Name: </span><span>John Doe</span></div>
                                <div class="invoice-user-name"><span>Invoice No: </span><span>CS132453</span></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="invoice-user-name"><span>Customer Id: </span><span>#LL93784</span></div>
                                <div class="invoice-user-name"><span>Date: </span><span>01.07.2022</span></div>
                            </div>
                        </div>
                    </div>
                    <table class="table-borderless w-100 table-fit">
                        <thead>
                            <tr>
                                <th># Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Red Nike Laser</td>
                                <td>Rp50</td>
                                <td>3</td>
                                <td class="text-end">Rp150</td>
                            </tr>
                            <tr>
                                <td>2. Iphone 14</td>
                                <td>Rp50</td>
                                <td>2</td>
                                <td class="text-end">Rp100</td>
                            </tr>
                            <tr>
                                <td>3. Apple Series 8</td>
                                <td>Rp50</td>
                                <td>3</td>
                                <td class="text-end">Rp150</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <table class="table-borderless w-100 table-fit">
                                        <tr>
                                            <td>Sub Total :</td>
                                            <td class="text-end">Rp700.00</td>
                                        </tr>
                                        <tr>
                                            <td>Discount :</td>
                                            <td class="text-end">-Rp50.00</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping :</td>
                                            <td class="text-end">0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Tax (5%) :</td>
                                            <td class="text-end">Rp5.00</td>
                                        </tr>
                                        <tr>
                                            <td>Total Bill :</td>
                                            <td class="text-end">Rp655.00</td>
                                        </tr>
                                        <tr>
                                            <td>Due :</td>
                                            <td class="text-end">Rp0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Total Payable :</td>
                                            <td class="text-end">Rp655.00</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center invoice-bar">
                        <p>**VAT against this challan is payable through central registration. Thank you for your
                            business!</p>
                        <a href="javascript:void(0);">
                            <img src="assets/img/barcode/barcode-03.jpg" alt="Barcode">
                        </a>
                        <p>Sale 31</p>
                        <p>Thank You For Shopping With Us. Please Come Again</p>
                        <a href="javascript:void(0);" class="btn btn-primary">Print Receipt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Print Receipt -->
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

    <!-- view product -->

    <!-- view product -->

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
                            <form action="/login/user" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" name="phone" class="form-control" placeholder="08xxxx">
                                </div>

                                <button class="btn btn-primary w-100" type="submit">
                                    Login User
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
    </script>



    <script>
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
    </script>
    <!-- clear product added -->



    <script>
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
    </script>


    <!-- custom ukuran -->
</body>


</html>
