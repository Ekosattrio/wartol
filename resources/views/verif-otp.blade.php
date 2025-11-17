<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-900">Verifikasi OTP</h2>
        <p class="text-center text-gray-600">
            Kami telah mengirimkan kode OTP ke nomor <strong>{{ session('phone_for_verification') }}</strong>
        </p>

        <!-- HANYA UNTUK DEVELOPMENT / TESTING -->
        @if (session('development_otp'))
            <div class="p-4 text-sm text-blue-700 bg-blue-100 rounded-lg">
                <strong>Mode Development:</strong> Kode OTP Anda adalah
                <strong>{{ session('development_otp') }}</strong>
            </div>
        @endif
        <!-- HAPUS BLOK DI ATAS DI PRODUKSI -->


        <form method="POST" action="{{ route('auth.verify.otp') }}" class="space-y-6">
            @csrf

            <div>
                <label for="otp" class="block text-sm font-medium text-gray-700">Kode OTP (6 Digit)</label>
                <div class="mt-1">
                    <input id="otp" name="otp" type="text" inputmode="numeric" pattern="\d{6}"
                        maxlength="6" required
                        class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="123456">
                </div>
                @error('otp')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Verifikasi & Login
                </button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                Salah nomor? Kembali
            </a>
        </div>
    </div>

</body>

</html>
