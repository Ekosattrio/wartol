<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Tambah Produk</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href={{ asset('assets/img/favicon.png') }}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.min.css') }}>

    <!-- animation CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/animate.css') }}>

    <!-- Datatable CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/dataTables.bootstrap5.min.css') }}>

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href={{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/fontawesome/css/all.min.css') }}>

    <!-- Main CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        {{-- HEADER --}}
        @include('component.header')

        {{-- SIDEBAR --}}
        @include('component.sidebar')

        <div class="page-wrapper cardhead">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Tambah Produk</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{ route('penjual.produk') }}>Kelola Produk</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Produk</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Produk Baru</h5>
                            </div>
                            <div class="card-body">

                                {{-- Tampilkan error validasi JIKA ADA --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops! Ada kesalahan:</strong>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('penjual.produk.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-form-label col-md-2">Nama Produk</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="nama_produk"
                                                placeholder="Masukan Nama Produk" value="{{ old('nama_produk') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-form-label col-md-2">Harga</label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="harga"
                                                placeholder="Masukan Harga Produk" value="{{ old('harga') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-form-label col-md-2">Stok</label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="stok"
                                                placeholder="Masukan Stok Awal" value="{{ old('stok') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-form-label col-md-2"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">
                                                Simpan Produk
                                            </button>
                                            <a href="{{ route('penjual.produk') }}" class="btn btn-secondary">
                                                Batal
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src={{ asset('assets/js/jquery-3.7.1.min.js') }}></script>

    <!-- Feather Icon JS -->
    <script src={{ asset('assets/js/feather.min.js') }}></script>

    <!-- Slimscroll JS -->
    <script src={{ asset('assets/js/jquery.slimscroll.min.js') }}></script>

    <!-- Datatable JS -->
    <script src={{ asset('assets/js/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('assets/js/dataTables.bootstrap5.min.js') }}></script>

    <!-- Bootstrap Core JS -->
    <script src={{ asset('assets/js/bootstrap.bundle.min.js') }}></script>

    <!-- Custom JS -->
    <script src={{ asset('assets/js/theme-script.js') }}></script>
    <script src={{ asset('assets/js/script.js') }}></script>


</body>

</html>
