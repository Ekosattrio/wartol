<!DOCTYPE html>
<html>

<head>
    <title>Warung Bapa Dafa</title>
</head>

<body>
    <h1>Selamat Datang di Warteg Online</h1>
    <p></p>

    <br><br>

    <p>Di page ini akan ada button untuk login sebagai penjual untuk masuk ke dashboard admin</p>
    <br><br>
    <p> Ini halaman menu awal dimana semua user akan start dari sini. Di page ini akan ada pilihan menu, cart transaksi,
        lalu ada tombol checkout atau bayar dibawahnya,
        Bila pembeli ingin melakukan checkout, maka wajib dengan alert untuk mengisi form dengan data nomor hp
    </p>


    <form action="/fillphonenumber" method="POST">
        @csrf
        <input type="text" name="nomor_hp" required>
        <button type="submit">Bayar</button>
    </form>

</body>

</html>
