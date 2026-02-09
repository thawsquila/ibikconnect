@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Gallery BEI')

@section('content')
<div class="space-y-12 py-8">
    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-pink-100 text-pink-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
            </svg>
            Photo Gallery
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Galeri Kegiatan</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Dokumentasi perjalanan literasi keuangan mahasiswa IBI Kesatuan</p>
    </div>

    <!-- Gallery Grid -->
    @if($galleries->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($galleries as $gallery)
        <div class="group relative aspect-square rounded-xl overflow-hidden bg-gray-200 hover:shadow-xl transition-all cursor-pointer">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                 alt="{{ $gallery->title ?? 'Gallery BEI' }}" 
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            
            @if($gallery->title)
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/0 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <p class="text-white font-semibold text-sm line-clamp-2">{{ $gallery->title }}</p>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Foto</h3>
        <p class="text-gray-600">Galeri foto akan segera ditambahkan. Pantau terus halaman ini!</p>
    </div>
    @endif
</div>
@endsection
