<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warteg Tutup</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="d-flex align-items-center justify-content-center min-vh-100 p-3">
    <div class="card shadow-sm" style="max-width:720px; width:100%;">
        <div class="card-body text-center py-5">
            <h2 class="card-title mb-3">Maaf, Warteg Saat Ini Tutup</h2>
            <p class="card-text text-muted">Saat ini layanan kami sedang ditutup sementara oleh pemilik. Silakan coba lagi nanti.</p>

            @if(session('status'))
                <div class="alert alert-info mt-3">{{ session('status') }}</div>
            @endif
        </div>
    </div>
</div>
</body>
</html>