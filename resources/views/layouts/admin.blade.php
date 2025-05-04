<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ModernFurn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       <style>
    .sidebar-transition {
        transition: all 0.3s ease-in-out;
    }
    
    #sidebar {
        transform: translateX(-100%);
    }
    
    #sidebar.sidebar-active {
        transform: translateX(0);
    }
    
    @media (min-width: 1024px) {
        #sidebar {
            transform: translateX(0);
        }
    }
</style>
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-blue-800 text-white w-64 flex-shrink-0 fixed h-full z-20 sidebar-transition lg:relative lg:translate-x-0 -translate-x-full">
            <div class="p-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold">ModernFurn</h2>
                    <p class="text-sm">Admin Dashboard</p>
                </div>
                <button id="closeSidebar" class="lg:hidden text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-100 hover:bg-blue-700">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-6 py-3 text-gray-100 hover:bg-blue-700">
                    <i class="fas fa-couch mr-3"></i>
                    Produk
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center px-6 py-3 text-gray-100 hover:bg-blue-700">
                    <i class="fas fa-users mr-3"></i>
                    Pengguna
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button id="toggleSidebar" class="text-gray-500 hover:text-gray-600">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button id="userDropdown" class="flex items-center text-gray-700 hover:text-gray-900">
                                <span class="mr-2">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
    
        function toggleSidebarVisibility() {
            sidebar.classList.toggle('sidebar-active');
        }
    
        // Tambahkan event listener untuk toggle sidebar
        if (toggleSidebar) {
            toggleSidebar.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebarVisibility();
            });
        }
    
        // Tambahkan event listener untuk close sidebar
        if (closeSidebar) {
            closeSidebar.addEventListener('click', () => {
                toggleSidebarVisibility();
            });
        }
    
        // Close sidebar when clicking outside
        document.addEventListener('click', (e) => {
            const isClickInsideSidebar = sidebar.contains(e.target);
            const isClickInsideToggle = toggleSidebar.contains(e.target);
            
            if (!isClickInsideSidebar && !isClickInsideToggle && window.innerWidth < 1024) {
                sidebar.classList.remove('sidebar-active');
            }
        });
    
        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('sidebar-active');
            } else {
                sidebar.classList.remove('sidebar-active');
            }
        });
    
        // Toggle dropdown (tetap sama seperti sebelumnya)
        const userDropdown = document.getElementById('userDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');
    
        userDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });
    
        document.addEventListener('click', () => {
            if (!dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>