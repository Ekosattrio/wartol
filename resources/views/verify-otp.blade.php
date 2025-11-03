<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Bapa dafa</title>
</head>
<body>
    <h1>Masukan Kode otp anda</h1>
    <P> disini akan ada button untuk verify otp nya, baru lanjut ke payment gateway</P>


<form action="/verify-otp" method="POST">
    @csrf
    <input type="text" name="otp" required>
    <button type="submit">Verify & Checkout</button>
</form>
</form>
</body>
</html>