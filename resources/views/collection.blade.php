<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Furniture - ModernFurn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 z-50 w-full bg-white shadow-md">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('landing') }}" class="text-3xl font-bold text-blue-600">ModernFurn</a>
            </div>
            <div class="hidden md:flex space-x-10">
                <a href="{{ route('landing') }}"
                    class="text-gray-800 hover:text-blue-500 transition duration-300">Beranda</a>
                <a href="{{ route('collection') }}" class="text-blue-600 font-semibold">Koleksi</a>
                @auth
                    <span class="text-gray-800">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-gray-800 hover:text-blue-500 transition duration-300">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-800 hover:text-blue-500 transition duration-300">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-gray-800 hover:text-blue-500 transition duration-300">Register</a>
                @endauth
            </div>
            <div class="md:hidden">
                <button class="text-gray-800">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Collection Content -->
    <div class="container mx-auto px-6 pt-24 pb-16">
        <h1 class="text-4xl font-bold text-center mb-2">Koleksi Furniture</h1>
        <p class="text-gray-600 text-center mb-12">Temukan furniture modern dan futuristik untuk rumah Anda</p>

        <!-- Filter dan Pencarian (Opsional) -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="w-full md:w-64">
                    <input type="text" placeholder="Cari furniture..."
                        class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex gap-4">
                    <select class="px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Kategori</option>
                        <option value="sofa">Sofa</option>
                        <option value="meja">Meja</option>
                        <option value="kursi">Kursi</option>
                    </select>
                    <select class="px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="terbaru">Terbaru</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 hover:shadow-xl hover:-translate-y-1">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 truncate">{{ $product->name }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $product->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</span>
                            <button onclick="showProductDetail({{ json_encode($product) }})"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                                Detail
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Modal Detail Produk -->
        <div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-6">
                        <h2 class="text-2xl font-bold text-gray-800" id="modalTitle"></h2>
                        <button onclick="closeProductModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <div class="space-y-6">
                        <img id="modalImage" src="" alt="" class="w-full h-80 object-cover rounded-lg">

                        <div>
                            <h3 class="text-lg font-semibold mb-2">Deskripsi</h3>
                            <p id="modalDescription" class="text-gray-600"></p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-tag w-5 text-blue-500"></i>
                                    <span class="font-semibold">Harga</span>
                                </div>
                                <p id="modalPrice" class="text-xl font-bold text-blue-600"></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-ruler-combined w-5 text-blue-500"></i>
                                    <span class="font-semibold">Dimensi</span>
                                </div>
                                <p id="modalDimensions" class="text-gray-700"></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-cube w-5 text-blue-500"></i>
                                    <span class="font-semibold">Material</span>
                                </div>
                                <p id="modalMaterial" class="text-gray-700"></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-palette w-5 text-blue-500"></i>
                                    <span class="font-semibold">Warna</span>
                                </div>
                                <p id="modalColor" class="text-gray-700"></p>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-list-ul w-5 text-blue-500"></i>
                                <span class="font-semibold">Fitur</span>
                            </div>
                            <p id="modalFeatures" class="text-gray-700"></p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-shield-alt w-5 text-blue-500"></i>
                                <span class="font-semibold">Garansi</span>
                            </div>
                            <p id="modalWarranty" class="text-gray-700"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4">ModernFurn</h4>
                    <p class="text-gray-400">Furniture modern dan futuristik untuk rumah impian Anda.</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Kontak</h4>
                    <p class="text-gray-400">Email: info@modernfurn.com</p>
                    <p class="text-gray-400">Telp: (021) 1234-5678</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 ModernFurn. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
<script>
    function showProductDetail(product) {
        document.getElementById('modalTitle').textContent = product.name;
        document.getElementById('modalImage').src = '/storage/' + product.image;
        document.getElementById('modalImage').alt = product.name;
        document.getElementById('modalDescription').textContent = product.description;
        document.getElementById('modalPrice').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(product.price);
        document.getElementById('modalDimensions').textContent = product.dimensions || '-';
        document.getElementById('modalMaterial').textContent = product.material || '-';
        document.getElementById('modalColor').textContent = product.color || '-';
        document.getElementById('modalFeatures').textContent = product.features || '-';
        document.getElementById('modalWarranty').textContent = product.warranty || '-';

        document.getElementById('productModal').classList.remove('hidden');
        document.getElementById('productModal').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeProductModal() {
        document.getElementById('productModal').classList.add('hidden');
        document.getElementById('productModal').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Menutup modal ketika mengklik di luar modal
    document.getElementById('productModal').addEventListener('click', function (e) {
        if (e.target === this) {
            closeProductModal();
        }
    });
</script>

</html>