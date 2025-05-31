<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModernFurn - Furniture Modern & Futuristik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .furniture-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .gradient-text {
            background: linear-gradient(90deg, #3B82F6, #8B5CF6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navigation Bar new-->
    <!-- Modifikasi navbar untuk menambahkan ikon notifikasi -->
<nav class="fixed top-0 z-50 w-full glassmorphism">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <span class="text-3xl font-bold gradient-text">ModernFurn</span>
        </div>
        <div class="hidden md:flex space-x-10">
            <a href="#hero" class="text-gray-800 hover:text-blue-500 transition duration-300">Beranda</a>
            <a href="{{ route('collection') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Koleksi</a>
            <a href="#features" class="text-gray-800 hover:text-blue-500 transition duration-300">Fitur</a>
            <a href="#testimonials" class="text-gray-800 hover:text-blue-500 transition duration-300">Testimonial</a>
            <a href="#contact" class="text-gray-800 hover:text-blue-500 transition duration-300">Kontak</a>
            @auth
                <!-- Tambahkan ikon notifikasi -->
                <div class="relative">
                    <a href="{{ route('notifications.index') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">
                        <i class="fas fa-bell"></i>
                        @if(Auth::user()->unreadNotificationsCount() > 0)
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                {{ Auth::user()->unreadNotificationsCount() }}
                            </span>
                        @endif
                    </a>
                </div>
                <span class="text-gray-800">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-blue-500 transition duration-300">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Login</a>
                <a href="{{ route('register') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Register</a>
            @endauth
        </div>
        <div class="md:hidden">
            <button class="text-gray-800">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>
</nav>

    <!-- Navigation Bar old --> 
{{-- <nav class="fixed top-0 z-50 w-full glassmorphism">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <span class="text-3xl font-bold gradient-text">ModernFurn</span>
        </div>
        <div class="hidden md:flex space-x-10">
            <a href="#hero" class="text-gray-800 hover:text-blue-500 transition duration-300">Beranda</a>
            <a href="{{ route('collection') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Koleksi</a>
            <a href="#features" class="text-gray-800 hover:text-blue-500 transition duration-300">Fitur</a>
            <a href="#testimonials" class="text-gray-800 hover:text-blue-500 transition duration-300">Testimonial</a>
            <a href="#contact" class="text-gray-800 hover:text-blue-500 transition duration-300">Kontak</a>
            @auth
                <span class="text-gray-800">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-blue-500 transition duration-300">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Login</a>
                <a href="{{ route('register') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Register</a>
            @endauth
        </div>
        <div class="md:hidden">
            <button class="text-gray-800">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>
</nav> --}}

    <!-- Hero Section -->
    <section id="hero" class="pt-24 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 flex flex-col items-start mt-8 md:mt-0 md:pr-10">
                <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">Furniture <span
                        class="gradient-text">Modern</span> untuk Rumah Masa Depan</h1>
                <p class="text-lg text-gray-600 mb-8">Temukan koleksi furniture futuristik dan modern yang akan mengubah
                    suasana rumah Anda. Desain minimalis dengan sentuhan teknologi.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#collection"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105">
                        Lihat Koleksi
                    </a>
                    <a href="#contact"
                        class="bg-transparent border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-bold py-3 px-8 rounded-full transition duration-300">
                        Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-end">
                <img src="{{ asset('images/hero.png') }}" alt="Modern Furniture" class="rounded-xl shadow-2xl">
            </div>

        </div>
        <div class="w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,32L48,53.3C96,75,192,117,288,117.3C384,117,480,75,576,80C672,85,768,139,864,160C960,181,1056,171,1152,154.7C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- Collection Section -->
    <section id="collection" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-3">Koleksi Unggulan</h2>
            <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Furniture dengan desain futuristik yang
                menggabungkan keindahan estetika dan fungsi praktis.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Furniture Item 1 -->
                <div
                    class="furniture-card bg-white rounded-2xl shadow-lg overflow-hidden transition duration-500 ease-in-out">
                    <img src="{{ asset('images/hero.png') }}" alt="Sofa Minimalis"
                        class="w-full h-64 object-cover object-center">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Sofa Neo Minimalis</h3>
                        <p class="text-gray-600 mb-4">Sofa dengan desain futuristik, dilengkapi dengan lampu LED ambien
                            dan pengisi daya wireless.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">Rp 8.500.000</span>
                            <a href="#" class="detail-btn text-blue-600 hover:text-blue-800" data-id="1">
                                <span>Detail</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Furniture Item 2 -->
                <div
                    class="furniture-card bg-white rounded-2xl shadow-lg overflow-hidden transition duration-500 ease-in-out">
                    <img src="{{ asset('images/hero.png') }}" alt="Meja Hologram"
                        class="w-full h-64 object-cover object-center">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Meja Hologram Touch</h3>
                        <p class="text-gray-600 mb-4">Meja dengan teknologi layar sentuh terintegrasi dan proyeksi
                            hologram untuk pengalaman multimedia.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">Rp 12.750.000</span>
                            <a href="#" class="detail-btn text-blue-600 hover:text-blue-800" data-id="2">
                                <span>Detail</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Furniture Item 3 -->
                <div
                    class="furniture-card bg-white rounded-2xl shadow-lg overflow-hidden transition duration-500 ease-in-out">
                    <img src="{{ asset('images/hero.png') }}" alt="Kursi Smart"
                        class="w-full h-64 object-cover object-center">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Kursi Smart Ergonomis</h3>
                        <p class="text-gray-600 mb-4">Kursi yang dapat menyesuaikan bentuk dengan tubuh Anda, dilengkapi
                            dengan fitur pemanas dan pijat.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">Rp 5.990.000</span>
                            <a href="#" class="detail-btn text-blue-600 hover:text-blue-800" data-id="3">
                                <span>Detail</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Furniture Item 4 -->
                <div
                    class="furniture-card bg-white rounded-2xl shadow-lg overflow-hidden transition duration-500 ease-in-out">
                    <img src="{{ asset('images/hero.png') }}" alt="Lemari Modular"
                        class="w-full h-64 object-cover object-center">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Lemari Modular Futura</h3>
                        <p class="text-gray-600 mb-4">Lemari dengan modul yang dapat diatur sesuai kebutuhan, dilengkapi
                            dengan pengatur suhu otomatis.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">Rp 9.250.000</span>
                            <a href="#" class="detail-btn text-blue-600 hover:text-blue-800" data-id="4">
                                <span>Detail</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Furniture Item 5 -->
                <div
                    class="furniture-card bg-white rounded-2xl shadow-lg overflow-hidden transition duration-500 ease-in-out">
                    <img src="{{ asset('images/hero.png') }}" alt="Lampu Gantung"
                        class="w-full h-64 object-cover object-center">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Lampu Gantung Neon Flex</h3>
                        <p class="text-gray-600 mb-4">Lampu dengan teknologi penyesuaian warna dan intensitas melalui
                            aplikasi smartphone.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">Rp 3.490.000</span>
                            <a href="#" class="detail-btn text-blue-600 hover:text-blue-800" data-id="5">
                                <span>Detail</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Furniture Item 6 -->
                <div
                    class="furniture-card bg-white rounded-2xl shadow-lg overflow-hidden transition duration-500 ease-in-out">
                    <img src="{{ asset('images/hero.png') }}" alt="Rak Levitasi"
                        class="w-full h-64 object-cover object-center">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Rak Levitasi Magnetik</h3>
                        <p class="text-gray-600 mb-4">Rak dengan teknologi levitasi magnetik yang memberikan kesan
                            melayang dan futuristik.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">Rp 7.750.000</span>
                            <a href="#" class="detail-btn text-blue-600 hover:text-blue-800" data-id="6">
                                <span>Detail</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    Lihat Semua Koleksi
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-3">Keunggulan Kami</h2>
            <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Mengapa memilih furniture modern dan futuristik
                dari ModernFurn?</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-6 bg-white rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-paint-brush text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Desain Eksklusif</h3>
                    <p class="text-gray-600">Setiap furniture dirancang secara eksklusif dengan perpaduan seni dan
                        teknologi terkini.</p>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 bg-white rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-cogs text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Integrasi Teknologi</h3>
                    <p class="text-gray-600">Furniture kami dilengkapi dengan teknologi pintar yang mempermudah
                        kehidupan sehari-hari.</p>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 bg-white rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Ramah Lingkungan</h3>
                    <p class="text-gray-600">Menggunakan material berkelanjutan dan proses produksi yang meminimalkan
                        dampak lingkungan.</p>
                </div>

                <!-- Feature 4 -->
                <div class="p-6 bg-white rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-tools text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Kualitas Premium</h3>
                    <p class="text-gray-600">Dibuat dengan material terbaik dan proses produksi yang teliti untuk
                        memastikan ketahanan jangka panjang.</p>
                </div>

                <!-- Feature 5 -->
                <div class="p-6 bg-white rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-truck text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Sistem logistik modern dan efisien untuk memastikan furniture sampai di
                        rumah Anda tepat waktu.</p>
                </div>

                <!-- Feature 6 -->
                <div class="p-6 bg-white rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-headset text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Layanan Pelanggan</h3>
                    <p class="text-gray-600">Tim layanan pelanggan yang responsif dan siap membantu Anda 24/7 melalui
                        berbagai platform.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-3">Testimoni Pelanggan</h2>
            <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Apa kata pelanggan kami tentang pengalaman
                mereka dengan furniture ModernFurn.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="p-6 bg-gray-50 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 font-bold">AP</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold">Annisa Pratiwi</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Sofa Neo Minimalis benar-benar mengubah tampilan ruang tamu kami.
                        Desainnya modern dan LED ambien memberikan suasana yang luar biasa di malam hari."</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="p-6 bg-gray-50 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 font-bold">BS</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold">Budi Santoso</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Kursi Smart Ergonomis sangat membantu pekerjaan saya sebagai programmer.
                        Fitur pijatnya sangat menyegarkan setelah duduk berjam-jam."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="p-6 bg-gray-50 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 font-bold">DP</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold">Dian Permata</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Rak Levitasi Magnetik adalah pusat perhatian di rumah saya. Semua tamu
                        selalu kagum melihat barang-barang tampak melayang di rak!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section old -->
    {{-- <section id="contact" class="py-16 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-3">Hubungi Kami</h2>
            <p class="text-gray-100 text-center mb-12 max-w-2xl mx-auto">Tertarik dengan produk kami? Hubungi kami untuk
                informasi lebih lanjut atau kunjungi showroom kami.</p>

            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <div class="bg-white rounded-2xl p-8 text-gray-800">
                        <h3 class="text-2xl font-bold mb-6">Kritik/Saran</h3>
                        <form>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama
                                    Lengkap</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="name" type="text" placeholder="Nama Anda">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="email" type="email" placeholder="email@contoh.com">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Pesan</label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="message" rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>
                            <div class="flex items-center justify-between">
                                <button
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline transition duration-300"
                                    type="button">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-10">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold mb-4">Informasi Kontak</h3>
                        <div class="flex items-center mb-4">
                            <i class="fas fa-map-marker-alt mr-4 text-xl"></i>
                            <span>Jl. Modern Furniture No. 123, Jakarta Selatan</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <i class="fas fa-phone-alt mr-4 text-xl"></i>
                            <span>+6281358807954</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <i class="fas fa-envelope mr-4 text-xl"></i>
                            <span>info@modernfurn.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-4 text-xl"></i>
                            <span>Senin - Sabtu: 09.00 - 18.00</span>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold mb-4">Hubungi Via WhatsApp</h3>
                        <p class="mb-6">Ingin konsultasi langsung? Hubungi kami melalui WhatsApp untuk respon cepat.</p>
                        <a href="https://wa.me/6281358807954"
                            class="flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 w-max">
                            <i class="fab fa-whatsapp mr-3 text-xl"></i>
                            <span>Hubungi via WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- contact section new --}}
    <!-- Tambahkan di bagian contact section -->
<section id="contact" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-3">Hubungi Kami</h2>
        <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Punya pertanyaan atau ingin memberikan kritik dan saran? Hubungi kami melalui form di bawah ini.</p>
        
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg p-8">
                    <!-- Form Feedback untuk user yang sudah login -->
                    <form id="feedbackForm" class="space-y-6">
                        @csrf
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Kritik & Saran</label>
                            <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="Tulis kritik dan saran Anda di sini..."></textarea>
                            <p id="messageError" class="mt-1 text-sm text-red-600 hidden">Pesan tidak boleh kosong</p>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="submitFeedback" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                                Kirim Feedback
                            </button>
                        </div>
                    </form>
                <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                    <div class="bg-white rounded-xl shadow-lg p-8 max-w-md w-full">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold">Login Diperlukan</h3>
                            <button id="closeLoginModal" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <p class="text-gray-600 mb-6">Anda perlu login terlebih dahulu untuk dapat mengirim feedback.</p>
                        <div class="flex flex-col space-y-4">
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 text-center">
                                Login
                            </a>
                            <p class="text-center text-gray-600">Belum memiliki akun?</p>
                            <a href="{{ route('register') }}" class="bg-transparent border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-bold py-2 px-6 rounded-full transition duration-300 text-center">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-8 md:mb-0">
                    <h3 class="text-3xl font-bold gradient-text mb-4">ModernFurn</h3>
                    <p class="text-gray-400 max-w-xs">Menghadirkan furniture modern dan futuristik berkualitas tinggi
                        untuk rumah masa depan Anda.</p>
                    <div class="flex mt-6 space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-800 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                    <div>
                        <h4 class="text-lg font-bold mb-4">Halaman</h4>
                        <ul class="space-y-2">
                            <li><a href="#hero"
                                    class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                            <li><a href="#collection"
                                    class="text-gray-400 hover:text-white transition duration-300">Koleksi</a></li>
                            <li><a href="#features"
                                    class="text-gray-400 hover:text-white transition duration-300">Fitur</a></li>
                            <li><a href="#testimonials"
                                    class="text-gray-400 hover:text-white transition duration-300">Testimonial</a></li>
                            <li><a href="#contact"
                                    class="text-gray-400 hover:text-white transition duration-300">Kontak</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-4">Kategori</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Sofa
                                    Modern</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Meja
                                    Futuristik</a></li>
                            <!-- Lanjutan dari kode sebelumnya -->
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Kursi
                                    Ergonomis</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Lemari
                                    Modern</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Lampu
                                    Dekoratif</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-4">Legal</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Syarat &
                                    Ketentuan</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Kebijakan
                                    Privasi</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Kebijakan
                                    Pengiriman</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-10 pt-6 text-center">
                <p class="text-gray-500">© 2025 ModernFurn. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Detail Modal -->
    <div id="furnitureModal"
        class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full mx-4 md:mx-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 id="modalTitle" class="text-3xl font-bold gradient-text">Detail Furniture</h3>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2">
                        <img id="modalImage" src="/api/placeholder/500/400" alt="Furniture Detail"
                            class="rounded-xl w-full">
                    </div>
                    <div class="md:w-1/2 md:pl-8 mt-6 md:mt-0">
                        <h4 id="modalName" class="text-2xl font-bold mb-2">Nama Furniture</h4>
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600">(120 ulasan)</span>
                        </div>
                        <p id="modalPrice" class="text-2xl font-bold text-blue-600 mb-4">Rp 0</p>
                        <div class="mb-6">
                            <h5 class="font-bold mb-2">Deskripsi:</h5>
                            <p id="modalDescription" class="text-gray-600">Deskripsi furniture akan ditampilkan di sini.
                            </p>
                        </div>
                        <div class="mb-6">
                            <h5 class="font-bold mb-2">Spesifikasi:</h5>
                            <ul id="modalSpecs" class="list-disc pl-5 text-gray-600">
                                <li>Dimensi: <span id="modalDimensions">-</span></li>
                                <li>Material: <span id="modalMaterial">-</span></li>
                                <li>Warna: <span id="modalColor">-</span></li>
                                <li>Fitur Khusus: <span id="modalFeatures">-</span></li>
                                <li>Garansi: <span id="modalWarranty">-</span></li>
                            </ul>
                        </div>
                        <div class="flex space-x-4">
                            <a id="modalWhatsapp" href="#"
                                class="flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300">
                                <i class="fab fa-whatsapp mr-2"></i>
                                <span>Hubungi via WhatsApp</span>
                            </a>
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                <span>Tambah ke Keranjang</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-8 right-8 bg-blue-600 hover:bg-blue-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transform transition duration-300 hover:scale-110 opacity-0 invisible">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Sample furniture data - In a real application, this would come from your Laravel backend
        const furnitureData = [
            {
                id: 1,
                name: "Sofa Neo Minimalis",
                price: "Rp 8.500.000",
                description: "Sofa futuristik dengan desain minimalis yang cocok untuk ruang tamu modern. Dilengkapi dengan lampu LED ambien yang dapat diubah warnanya sesuai suasana dan pengisi daya wireless terintegrasi di sandaran tangan.",
                image: "/api/placeholder/500/400",
                dimensions: "250cm x 90cm x 85cm",
                material: "Kulit Sintetis Premium, Rangka Aluminium",
                color: "Abu-abu, Putih, Hitam",
                features: "Lampu LED Ambient, Pengisi Daya Wireless, Koneksi Bluetooth",
                warranty: "5 Tahun"
            },
            {
                id: 2,
                name: "Meja Hologram Touch",
                price: "Rp 12.750.000",
                description: "Meja futuristik dengan teknologi layar sentuh terintegrasi dan kemampuan proyeksi hologram. Permukaan meja dapat digunakan sebagai layar sentuh interaktif untuk berbagai keperluan multimedia.",
                image: "/api/placeholder/500/400",
                dimensions: "120cm x 80cm x 75cm",
                material: "Kaca Tempered, Aluminium, Komponen Elektronik",
                color: "Hitam, Transparan",
                features: "Layar Sentuh, Proyeksi Hologram, Konektivitas Wi-Fi",
                warranty: "3 Tahun"
            },
            {
                id: 3,
                name: "Kursi Smart Ergonomis",
                price: "Rp 5.990.000",
                description: "Kursi pintar yang dapat menyesuaikan bentuk dengan tubuh pengguna. Dilengkapi dengan fitur pemanas dan pijat yang dapat dikontrol melalui aplikasi smartphone.",
                image: "/api/placeholder/500/400",
                dimensions: "65cm x 70cm x 110cm",
                material: "Memory Foam, Kulit Premium, Rangka Karbon",
                color: "Hitam, Biru Navy",
                features: "Penyesuaian Bentuk Otomatis, Pemanas, Pijat, Kontrol Aplikasi",
                warranty: "2 Tahun"
            },
            {
                id: 4,
                name: "Lemari Modular Futura",
                price: "Rp 9.250.000",
                description: "Lemari modular dengan sistem yang dapat diatur sesuai kebutuhan. Dilengkapi dengan pengatur suhu otomatis untuk penyimpanan barang sensitif terhadap suhu.",
                image: "/api/placeholder/500/400",
                dimensions: "180cm x 60cm x 200cm",
                material: "Metal, Kaca, Komposit Premium",
                color: "Putih, Silver",
                features: "Pengatur Suhu, Modul Fleksibel, Pencahayaan LED",
                warranty: "5 Tahun"
            },
            {
                id: 5,
                name: "Lampu Gantung Neon Flex",
                price: "Rp 3.490.000",
                description: "Lampu gantung modern dengan teknologi penyesuaian warna dan intensitas melalui aplikasi smartphone. Desain geometris yang unik memberikan aksen futuristik pada ruangan.",
                image: "/api/placeholder/500/400",
                dimensions: "60cm x 60cm x 100cm",
                material: "Aluminium, Akrilik, LED",
                color: "Multi-warna (dapat disesuaikan)",
                features: "16 juta pilihan warna, Kontrol Aplikasi, Pengaturan Waktu",
                warranty: "2 Tahun"
            },
            {
                id: 6,
                name: "Rak Levitasi Magnetik",
                price: "Rp 7.750.000",
                description: "Rak dengan teknologi levitasi magnetik yang memberikan kesan melayang dan futuristik. Setiap tingkat rak dapat diatur posisinya dan dapat menahan beban hingga 2kg per tingkat.",
                image: "/api/placeholder/500/400",
                dimensions: "120cm x 30cm x 120cm",
                material: "Kayu Oak, Komponen Magnetik, Metal",
                color: "Coklat Natural, Hitam",
                features: "Levitasi Magnetik, Pencahayaan LED, Posisi Adjustable",
                warranty: "3 Tahun"
            }
        ];

        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('furnitureModal');
            const closeModalBtn = document.getElementById('closeModal');
            const detailBtns = document.querySelectorAll('.detail-btn');
            const backToTopBtn = document.getElementById('backToTop');

            // Detail button click handlers
            detailBtns.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const furnitureId = parseInt(this.getAttribute('data-id'));
                    const furniture = furnitureData.find(item => item.id === furnitureId);

                    if (furniture) {
                        document.getElementById('modalTitle').textContent = 'Detail Furniture';
                        document.getElementById('modalName').textContent = furniture.name;
                        document.getElementById('modalPrice').textContent = furniture.price;
                        document.getElementById('modalDescription').textContent = furniture.description;
                        document.getElementById('modalImage').src = furniture.image;
                        document.getElementById('modalImage').alt = furniture.name;
                        document.getElementById('modalDimensions').textContent = furniture.dimensions;
                        document.getElementById('modalMaterial').textContent = furniture.material;
                        document.getElementById('modalColor').textContent = furniture.color;
                        document.getElementById('modalFeatures').textContent = furniture.features;
                        document.getElementById('modalWarranty').textContent = furniture.warranty;
                        document.getElementById('modalWhatsapp').href = `https://wa.me/6281358807954?text=Halo, saya tertarik dengan ${furniture.name}. Bisakah Anda memberikan informasi lebih lanjut?`;

                        modal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    }
                });
            });

            // Close modal
            closeModalBtn.addEventListener('click', function () {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside
            window.addEventListener('click', function (e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });

            // Back to top button
            window.addEventListener('scroll', function () {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'invisible');
                    backToTopBtn.classList.add('opacity-100', 'visible');
                } else {
                    backToTopBtn.classList.remove('opacity-100', 'visible');
                    backToTopBtn.classList.add('opacity-0', 'invisible');
                }
            });

            backToTopBtn.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
        const feedbackForm = document.getElementById('feedbackForm');
        const submitButton = document.getElementById('submitFeedback');
        const loginModal = document.getElementById('loginModal');
        const closeLoginModal = document.getElementById('closeLoginModal');
        const messageInput = document.getElementById('message');
        const messageError = document.getElementById('messageError');
        
        submitButton.addEventListener('click', function() {
            // Validasi form
            if (!messageInput.value.trim()) {
                messageError.classList.remove('hidden');
                return;
            }
            messageError.classList.add('hidden');
            
            // Cek apakah user sudah login
            @auth
                // Submit form jika sudah login
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("feedback.store") }}';
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const messageField = document.createElement('input');
                messageField.type = 'hidden';
                messageField.name = 'message';
                messageField.value = messageInput.value;
                
                form.appendChild(csrfToken);
                form.appendChild(messageField);
                document.body.appendChild(form);
                form.submit();
            @else
                // Tampilkan modal login jika belum login
                loginModal.classList.remove('hidden');
            @endauth
        });
        
        // Tutup modal saat tombol close diklik
        closeLoginModal.addEventListener('click', function() {
            loginModal.classList.add('hidden');
        });
        
        // Tutup modal saat klik di luar modal
        loginModal.addEventListener('click', function(e) {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
            }
        });
    });




        
    </script>
</body>

</html>