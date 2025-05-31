@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Feedback Client</h2>
            <p class="text-gray-600 mt-1">Kelola feedback dan kritik saran dari client</p>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($feedbacks as $feedback)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $feedback->user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $feedback->user->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 truncate max-w-xs">{{ Str::limit($feedback->message, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $feedback->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($feedback->is_responded)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Sudah Direspons
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Belum Direspons
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.feedbacks.show', $feedback) }}" 
                                    class="text-blue-600 hover:text-blue-900 transition duration-150"
                                    title="Lihat Detail">
                                    <i class="fas fa-eye text-lg"></i>
                                </a>
                                
                                @if($feedback->is_responded)
                                <a href="{{ route('admin.feedbacks.edit', $feedback) }}" 
                                    class="text-yellow-600 hover:text-yellow-900 transition duration-150"
                                    title="Edit Respons">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                                @endif
                                
                                <form action="{{ route('admin.feedbacks.destroy', $feedback) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus feedback ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150" title="Hapus Feedback">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-6">
        {{ $feedbacks->links() }}
    </div>
</div>
@endsection