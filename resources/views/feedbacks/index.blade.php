<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Anda - ModernFurn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .gradient-text {
            background: linear-gradient(90deg, #3B82F6, #8B5CF6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 z-50 w-full glassmorphism">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('landing') }}" class="text-3xl font-bold gradient-text">ModernFurn</a>
            </div>
            <div class="hidden md:flex space-x-10">
                <a href="{{ route('landing') }}#hero" class="text-gray-800 hover:text-blue-500 transition duration-300">Beranda</a>
                <a href="{{ route('collection') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Koleksi</a>
                <a href="{{ route('landing') }}#features" class="text-gray-800 hover:text-blue-500 transition duration-300">Fitur</a>
                <a href="{{ route('landing') }}#testimonials" class="text-gray-800 hover:text-blue-500 transition duration-300">Testimonial</a>
                <a href="{{ route('landing') }}#contact" class="text-gray-800 hover:text-blue-500 transition duration-300">Kontak</a>
                @auth
                    <!-- Ikon notifikasi dengan badge -->
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
                <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white w-full py-4 px-6 mt-1 shadow-lg">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('landing') }}#hero" class="text-gray-800 hover:text-blue-500 transition duration-300">Beranda</a>
                <a href="{{ route('collection') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">Koleksi</a>
                <a href="{{ route('landing') }}#features" class="text-gray-800 hover:text-blue-500 transition duration-300">Fitur</a>
                <a href="{{ route('landing') }}#testimonials" class="text-gray-800 hover:text-blue-500 transition duration-300">Testimonial</a>
                <a href="{{ route('landing') }}#contact" class="text-gray-800 hover:text-blue-500 transition duration-300">Kontak</a>
                @auth
                    <a href="{{ route('notifications.index') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">
                        Notifikasi
                        @if(Auth::user()->unreadNotificationsCount() > 0)
                            <span class="ml-2 bg-red-500 text-white text-xs rounded-full px-2 py-1">
                                {{ Auth::user()->unreadNotificationsCount() }}
                            </span>
                        @endif
                    </a>
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
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-12">
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold mb-6">Feedback Anda</h1>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($feedbacks->count() > 0)
                    <div class="space-y-6">
                        @foreach($feedbacks as $feedback)
                            <div class="border rounded-lg p-4 {{ $feedback->is_responded ? 'bg-blue-50' : 'bg-gray-50' }}">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-gray-800 mb-2">{{ $feedback->message }}</p>
                                        <p class="text-sm text-gray-500">Dikirim pada: {{ $feedback->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs rounded-full {{ $feedback->is_responded ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $feedback->is_responded ? 'Direspon' : 'Menunggu Respon' }}
                                    </span>
                                </div>
                                
                                @if($feedback->is_responded)
                                    <div class="mt-4 bg-white p-3 rounded border border-blue-100">
                                        <h3 class="font-semibold text-blue-800 mb-1">Respon Admin:</h3>
                                        <p class="text-gray-700">{{ $feedback->admin_response }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Direspon pada: {{ $feedback->updated_at->format('d M Y, H:i') }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">Anda belum mengirimkan feedback.</p>
                    </div>
                @endif
                
                <div class="mt-6">
                    <a href="{{ route('landing') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">ModernFurn</h3>
                    <p class="text-gray-400">Furniture modern dan futuristik untuk rumah impian Anda.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('landing') }}#hero" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="{{ route('collection') }}" class="text-gray-400 hover:text-white transition duration-300">Koleksi</a></li>
                        <li><a href="{{ route('landing') }}#features" class="text-gray-400 hover:text-white transition duration-300">Fitur</a></li>
                        <li><a href="{{ route('landing') }}#testimonials" class="text-gray-400 hover:text-white transition duration-300">Testimonial</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center"><i class="fas fa-map-marker-alt mr-2"></i> Jl. Furniture No. 123, Jakarta</li>
                        <li class="flex items-center"><i class="fas fa-phone mr-2"></i> +62 123 4567 890</li>
                        <li class="flex items-center"><i class="fas fa-envelope mr-2"></i> info@modernfurn.com</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-10 pt-6 text-center text-gray-400">
                <p>&copy; 2023 ModernFurn. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-md');
                navbar.classList.remove('glassmorphism');
            } else {
                navbar.classList.add('glassmorphism');
                navbar.classList.remove('bg-white', 'shadow-md');
            }
        });
    </script>
</body>

</html>