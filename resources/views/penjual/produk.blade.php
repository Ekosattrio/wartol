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
    <title>Kelola Produk</title>


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
                            <h4>Makanan</h4>
                            <h6>Kelola Stok Makanan</h6>
                        </div>
                    </div>

                                    <ul class="table-top-head d-flex align-items-center gap-2 p-0 m-0 list-unstyled">

                        <li>
                            <a href="{{ route('penjual.laporan.export.pdf') }}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Pdf">
                                <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img">
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('penjual.laporan.export.excel') }}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Excel">
                                <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="img">
                            </a>
                        </li>

                        <li>
                            <a data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Collapse"
                            id="collapse-header">
                                <i data-feather="chevron-up" class="feather-chevron-up"></i>
                            </a>
                        </li>

                        <li class="ms-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProdukModal">
                            Tambah Produk
                        </button>
                          </li>

                    </ul>

                    {{-- <a href="{{ route('penjual.produk.create') }}" class="btn btn-primary mb-3">
                        Tambah Produk
                    </a> --}}
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
                            </div>
                            {{-- <div class="filters d-flex justify-content-end">
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
                            </div> --}}
                        </div>
                        <!-- /Filter -->
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>No.</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->nama_produk }}</td>
                                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                            <td>{{ $product->stok }}</td>
                                            <td>
                                                {{-- Logika untuk mengganti warna badge status --}}
                                                @if ($product->status == 'aktif')
                                                    <span class="badge bg-soft-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-soft-danger">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- Tombol Aksi (Edit/Hapus) --}}
                                                <button type="button" class="btn btn-light btn-sm p-1"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical" width="14" height="14"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end shadow-sm p-1">
                                                    <li>
                                                        <button
                                                            class="dropdown-item d-flex align-items-center small py-1 btn-edit-produk"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editProdukModal"
                                                            data-id="{{ $product->id }}"
                                                            data-nama="{{ $product->nama_produk }}"
                                                            data-stok="{{ $product->stok }}"
                                                            data-status="{{ $product->status }}">
                                                            <i data-feather="edit" class="me-2" width="14"
                                                                height="14"></i>
                                                            Edit Stok/Status
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            class="dropdown-item d-flex align-items-center small py-1 text-danger btn-delete-produk"
                                                            type="button" data-id="{{ $product->id }}">
                                                            <i data-feather="trash-2" class="me-2" width="14"
                                                                height="14"></i>
                                                            Hapus Produk
                                                        </button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data produk masih kosong.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /product list -->
            </div>
        </div>
    </div>

    {{-- KODE UNTUK MODAL EDIT --}}
    <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProdukModalLabel">Edit Produk:
                        <strong id="editNamaProduk"></strong>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="editProdukForm" method="POST">
                    @csrf
                    @method('PUT') {{-- Method untuk update --}}

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editStok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="editStok" name="stok" required>
                            <div id="editStokError" class="text-danger small mt-1"></div>
                        </div>

                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus" name="status">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
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
    {{-- KODE UNTUK MODAL CREATE --}}
    <div class="modal fade" id="createProdukModal" tabindex="-1" aria-labelledby="createProdukModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProdukModalLabel">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="createProdukForm" action="{{ route('penjual.produk.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Nama Produk</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_produk"
                                    placeholder="Masukan Nama Produk" required>
                                <div id="createNamaProdukError" class="text-danger small mt-1"></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Harga</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" name="harga"
                                    placeholder="Masukan Harga Produk" required>
                                <div id="createHargaError" class="text-danger small mt-1"></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Stok</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" name="stok"
                                    placeholder="Masukan Stok Awal" required>
                                <div id="createStokError" class="text-danger small mt-1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Produk</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- /Main Wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.loadtemplate/1.5.10/jquery.loadTemplate.min.js"
        integrity="sha512-T1zx+UG2gXu9mr29wvzaKkNUmAOAie40T32ZPIvcRPJgO5br53+Ocqj8gzguUuix7FK+Z3ncRCJMaZcumnPZzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    {{-- SCRIPT MODAL UNTUK CREATE --}}
    <script>
        $(document).ready(function() {

            // ... (Kode fitur EDIT Anda ada di sini) ...
            // ... (Kode fitur DELETE Anda ada di sini) ...


            // ===================================
            // BARU: KODE UNTUK FITUR CREATE
            // ===================================
            $('#createProdukForm').on('submit', function(e) {
                e.preventDefault(); // Hentikan submit biasa

                var form = $(this);
                var url = form.attr('action');

                // Bersihkan error lama
                $('#createNamaProdukError').text('');
                $('#createHargaError').text('');
                $('#createStokError').text('');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),

                    // Jika SUKSES
                    success: function(response) {
                        $('#createProdukModal').modal('hide');

                        // Reset form-nya
                        form.trigger('reset');

                        Swal.fire(
                            'Berhasil!',
                            'Produk baru berhasil ditambahkan.',
                            'success'
                        ).then(() => {
                            location.reload(); // Refresh halaman
                        });
                    },

                    // Jika GAGAL (Validasi error)
                    error: function(xhr) {
                        if (xhr.status === 422) { // Error validasi
                            var errors = xhr.responseJSON.errors;

                            if (errors.nama_produk) {
                                $('#createNamaProdukError').text(errors.nama_produk[0]);
                            }
                            if (errors.harga) {
                                $('#createHargaError').text(errors.harga[0]);
                            }
                            if (errors.stok) {
                                $('#createStokError').text(errors.stok[0]);
                            }
                        } else {
                            alert('Terjadi kesalahan, silakan coba lagi.');
                        }
                    }
                });
            });

            // (Opsional) Bersihkan form saat modal ditutup
            $('#createProdukModal').on('hidden.bs.modal', function() {
                $('#createProdukForm').trigger('reset');
                $('#createNamaProdukError').text('');
                $('#createHargaError').text('');
                $('#createStokError').text('');
            });

        }); // <-- Akhir dari $(document).ready()
    </script>

    {{-- SCRIPT JS UNTUK MODAL EDIT --}}
    <script>
        // Pastikan jQuery sudah siap
        $(document).ready(function() {

            // ===========================
            // KODE UNTUK FITUR EDIT
            // ===========================

            // 1. Saat tombol 'Edit Stok/Status' di-klik
            $('.btn-edit-produk').on('click', function() {
                // Ambil data dari tombol
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var stok = $(this).data('stok');
                var status = $(this).data('status');

                // 1. Masukkan data ke form di dalam modal
                $('#editNamaProduk').text(nama);
                $('#editStok').val(stok);
                $('#editStatus').val(status);

                // 2. Buat URL action untuk form
                var url = "{{ route('penjual.produk.update', ':id') }}";
                url = url.replace(':id', id);
                $('#editProdukForm').attr('action', url);

                // 3. Bersihkan pesan error lama (jika ada)
                $('#editStokError').text('');
                $('#editStatusError').text('');
            });


            // 2. Saat form edit di-submit
            $('#editProdukForm').on('submit', function(e) {
                e.preventDefault(); // Hentikan submit form biasa

                var form = $(this);
                var url = form.attr('action');

                // Kirim data via AJAX
                $.ajax({
                    type: "POST", // Method tetap POST, tapi @method('PUT') akan dibaca Laravel
                    url: url,
                    data: form.serialize(),

                    success: function(response) {
                        $('#editProdukModal').modal('hide');
                        alert('Produk berhasil diupdate!');
                        location.reload();
                    },

                    error: function(xhr) {
                        // Bersihkan error lama
                        $('#editStokError').text('');
                        $('#editStatusError').text('');

                        if (xhr.status === 422) { // 422 = Error validasi
                            var errors = xhr.responseJSON.errors;

                            // Tampilkan error di bawah input
                            if (errors.stok) {
                                $('#editStokError').text(errors.stok[0]);
                            }
                            if (errors.status) {
                                $('#editStatusError').text(errors.status[0]);
                            }
                        } else {
                            alert('Terjadi kesalahan, silakan coba lagi.');
                        }
                    }
                });
            });

            // ===========================
            // KODE UNTUK FITUR DELETE
            // ===========================
            $('.btn-delete-produk').on('click', function() {
                var productId = $(this).data('id');
                var url = "{{ route('penjual.produk.destroy', ':id') }}";
                url = url.replace(':id', productId);

                // Tampilkan konfirmasi SweetAlert
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Data produk ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    // Jika user klik "Ya, hapus!"
                    if (result.isConfirmed) {

                        // Kirim request AJAX untuk hapus
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE" // Laravel akan membacanya sebagai DELETE
                            },
                            success: function(response) {
                                // Tampilkan alert sukses
                                Swal.fire(
                                    'Terhapus!',
                                    'Produk berhasil dihapus.',
                                    'success'
                                ).then(() => {
                                    // Refresh halaman setelah alert ditutup
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

        }); // <-- Ini adalah AKHIR dari $(document).ready()
    </script>


</body>

</html>
