@extends('layouts.app')

@section('title', 'Berita & Dokumentasi - CDC IBI')

@section('content')
<div class="space-y-12 py-8">
    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/>
            </svg>
            News & Updates
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Berita & Dokumentasi</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Update terbaru seputar kegiatan dan prestasi mahasiswa</p>
    </div>

    <!-- News Grid -->
    @if($news->count() > 0)
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($news as $item)
        <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-all group">
            @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
            @else
            <div class="w-full h-48 bg-gradient-to-br from-green-400 to-blue-500"></div>
            @endif
            
            <div class="p-6">
                <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $item->published_at->format('d M Y') }}
                    </span>
                    @if($item->category)
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full font-medium">
                        {{ $item->category }}
                    </span>
                    @endif
                </div>
                
                <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-600 transition-colors">
                    {{ $item->title }}
                </h3>
                
                <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                    {{ Str::limit(strip_tags($item->content), 120) }}
                </p>
                
                <a href="{{ route('cdc.news.detail', $item) }}" class="inline-flex items-center text-sm font-medium text-purple-600 hover:text-purple-700 group-hover:gap-2 transition-all">
                    Baca Selengkapnya
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $news->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Berita</h3>
        <p class="text-gray-600">Berita akan segera ditambahkan. Pantau terus halaman ini!</p>
    </div>
    @endif
</div>
@endsection
