<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok App</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-yellow-100 text-gray-800 font-sans flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-yellow-400 shadow-md sticky top-0 z-50 w-full">
        <div class="flex justify-between items-center w-full px-6 md:px-10 py-4">
            <h1 class="text-xl md:text-2xl font-bold text-gray-800 tracking-wide">JOYBOY</h1>
            <div class="flex flex-wrap justify-end gap-3 md:gap-6">
                {{-- <a href="#" class="text-gray-800 font-medium hover:text-gray-900 transition">Home</a>
                <a href="{{ route('login') }}" class="text-gray-800 font-medium hover:text-gray-900 transition">Login</a>
                <a href="{{ route('register') }}" class="text-gray-800 font-medium hover:text-gray-900 transition">Register</a> --}}
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-yellow-300 py-16 md:py-24 flex items-center justify-center flex-col text-center px-4">
        <div class="max-w-3xl">
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">Kelola Stok dengan Mudah</h2>
            <p class="text-base md:text-lg text-gray-800 mb-8">
                Aplikasi stok berbasis Laravel 12 untuk mengelola barang dengan cepat, aman, dan efisien.
            </p>
            <a href="{{ route('login') }}"
               class="bg-gray-900 text-yellow-300 font-semibold py-3 px-8 rounded-lg hover:bg-gray-700 transition-all duration-200">
               Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="flex-grow py-16 bg-yellow-50">
        <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">
            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-12">Fitur Utama</h3>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-yellow-200 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-200">
                    <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Manajemen Barang</h4>
                    <p class="text-gray-700 text-sm md:text-base">CRUD data barang dengan mudah dan cepat.</p>
                </div>
                <div class="bg-yellow-200 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-200">
                    <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Laporan Stok</h4>
                    <p class="text-gray-700 text-sm md:text-base">Pantau laporan stok harian dan bulanan secara real-time.</p>
                </div>
                <div class="bg-yellow-200 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-200">
                    <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Keamanan Data</h4>
                    <p class="text-gray-700 text-sm md:text-base">Sistem login dengan role admin dan pegawai.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-yellow-400 py-6 text-center text-gray-900 font-medium mt-auto">
        © 2025 StokApp. Semua Hak Dilindungi.
    </footer>

</body>
</html>
