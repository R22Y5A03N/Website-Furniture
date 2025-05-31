@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Edit Respons Feedback</h2>
        <a href="{{ route('admin.feedbacks.show', $feedback) }}"
            class="flex items-center text-gray-600 hover:text-blue-600 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="bg-gray-50 p-6 rounded-xl space-y-6 mb-8">
        <div class="flex items-start">
            <div class="flex-shrink-0 bg-blue-100 rounded-full p-3">
                <i class="fas fa-user text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold">{{ $feedback->user->name }}</h3>
                <p class="text-gray-500 text-sm">{{ $feedback->user->email }}</p>
                <p class="text-gray-500 text-sm">{{ $feedback->created_at->format('d M Y H:i') }}</p>
                <div class="mt-4 bg-white p-4 rounded-lg shadow-sm">
                    <p class="text-gray-800">{{ $feedback->message }}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.feedbacks.update', $feedback) }}" method="POST" class="bg-gray-50 p-6 rounded-xl">
        @csrf
        @method('PUT')
        <h3 class="text-lg font-semibold mb-4">Edit Respons</h3>
        
        <div class="mb-4">
            <label for="admin_response" class="block text-sm font-medium text-gray-700 mb-2">Respons Anda</label>
            <textarea name="admin_response" id="admin_response" rows="5" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="Tulis respons Anda di sini...">{{ $feedback->admin_response }}</textarea>
            @error('admin_response')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
                <i class="fas fa-save mr-2"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection