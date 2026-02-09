@extends('layouts.admin')

@section('title', 'Kelola Galeri BEI')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Galeri Foto</h1>
            <p class="text-gray-600 mt-1">Kelola foto kegiatan Gallery BEI</p>
        </div>
        <a href="{{ route('admin.bei.galleries.create') }}" 
            class="px-4 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Upload Foto
        </a>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($galleries as $gallery)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
            <div class="aspect-square relative overflow-hidden bg-gray-100">
                @if($gallery->image_path)
                    <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="p-4">
                @if($gallery->title)
                    <p class="text-sm font-medium text-gray-900 mb-2">{{ $gallery->title }}</p>
                @endif
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.bei.galleries.edit', $gallery) }}" 
                        class="flex-1 text-center px-3 py-1.5 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition-colors">
                        Edit
                    </a>
                    <form action="{{ route('admin.bei.galleries.destroy', $gallery) }}" method="POST" 
                        onsubmit="return confirm('Yakin ingin menghapus foto ini?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="w-full px-3 py-1.5 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100 transition-colors">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-lg font-medium text-gray-900">Belum ada foto</p>
                <p class="text-gray-600 mt-1">Mulai dengan mengupload foto kegiatan</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($galleries->hasPages())
    <div class="flex justify-center">
        {{ $galleries->links() }}
    </div>
    @endif
</div>
@endsection
