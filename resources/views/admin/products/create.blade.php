@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tambah Produk Baru</h2>
            <a href="{{ route('admin.products.index') }}"
                class="flex items-center text-gray-600 hover:text-blue-600 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>Kembali</span>
            </a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Informasi Dasar -->
                <div class="bg-gray-50 p-6 rounded-xl space-y-6">
                    <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Informasi Dasar</h3>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            value="{{ old('name', $product->name ?? '') }}" placeholder="Masukkan nama produk" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="number" name="price" id="price"
                                class="w-full pl-12 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                value="{{ old('price', $product->price ?? '') }}" placeholder="0" required>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="Deskripsikan produk Anda">{{ old('description', $product->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Spesifikasi Produk -->
                <div class="bg-gray-50 p-6 rounded-xl space-y-6">
                    <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Spesifikasi Produk</h3>

                    <div>
                        <label for="dimensions" class="block text-sm font-medium text-gray-700 mb-2">Dimensi (P x L x
                            T)</label>
                        <input type="text" name="dimensions" id="dimensions"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            value="{{ old('dimensions', $product->dimensions ?? '') }}"
                            placeholder="Contoh: 200 x 90 x 75 cm">
                    </div>

                    <div>
                        <label for="material" class="block text-sm font-medium text-gray-700 mb-2">Material</label>
                        <input type="text" name="material" id="material"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            value="{{ old('material', $product->material ?? '') }}"
                            placeholder="Contoh: Kayu Jati, Stainless Steel">
                    </div>

                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Warna</label>
                        <input type="text" name="color" id="color"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            value="{{ old('color', $product->color ?? '') }}" placeholder="Contoh: Natural, Hitam">
                    </div>
                </div>
            </div>

            <!-- Fitur dan Garansi -->
            <div class="bg-gray-50 p-6 rounded-xl space-y-6 mt-8">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Fitur & Garansi</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="features" class="block text-sm font-medium text-gray-700 mb-2">Fitur-fitur</label>
                        <textarea name="features" id="features" rows="3"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="Masukkan fitur-fitur produk">{{ old('features', $product->features ?? '') }}</textarea>
                    </div>

                    <div>
                        <label for="warranty" class="block text-sm font-medium text-gray-700 mb-2">Garansi</label>
                        <input type="text" name="warranty" id="warranty"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            value="{{ old('warranty', $product->warranty ?? '') }}" placeholder="Contoh: 1 Tahun">
                    </div>
                </div>
            </div>

            <!-- Upload Gambar -->
            <div class="bg-gray-50 p-6 rounded-xl space-y-6 mt-8">
                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Upload Gambar</h3>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full" accept="image/*">
                </div>

            </div>


            <div class="flex justify-end mt-8">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
@endsection