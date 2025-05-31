<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - ModernFurn</title>
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
                <button id="mobileMenuButton" class="text-gray-800">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white w-full py-4 px-6 shadow-lg">
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
                    <form method="POST" action="{{ route('logout') }}">
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
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Notifikasi</h2>
                    <a href="{{ route('landing') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                
                @if($notifications->count() > 0)
                    <div class="space-y-4">
                        @foreach($notifications as $notification)
                            <div class="bg-gray-50 p-4 rounded-lg {{ $notification->is_read ? '' : 'border-l-4 border-blue-500' }} transition-all duration-300 hover:shadow-md">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        @if($notification->type == 'feedback_response')
                                            <div class="bg-blue-100 rounded-full p-2">
                                                <i class="fas fa-comment-dots text-blue-600"></i>
                                            </div>
                                        @else
                                            <div class="bg-gray-100 rounded-full p-2">
                                                <i class="fas fa-bell text-gray-600"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm text-gray-800">{{ $notification->message }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                                        
                                        <!-- Tambahkan tombol untuk melihat detail feedback jika tipe notifikasi adalah feedback_response -->
                                        @if($notification->type == 'feedback_response')
                                            <a href="{{ route('feedback.index') }}" class="text-xs text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                                <i class="fas fa-eye mr-1"></i> Lihat Detail Feedback
                                            </a>
                                        @endif
                                    </div>
                                    @if(!$notification->is_read)
                                        <form action="{{ route('notifications.read', $notification) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-xs text-blue-600 hover:text-blue-800 transition duration-300">
                                                Tandai sudah dibaca
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-bell-slash text-6xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Tidak Ada Notifikasi</h3>
                        <p class="text-gray-600">Anda belum memiliki notifikasi apapun.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">ModernFurn</h3>
                    <p class="text-gray-400">Furniture modern dan futuristik untuk rumah impian Anda.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('landing') }}" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="{{ route('collection') }}" class="text-gray-400 hover:text-white transition duration-300">Koleksi</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-white transition duration-300">Fitur</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white transition duration-300">Testimonial</a></li>
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
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 ModernFurn. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>

</html>