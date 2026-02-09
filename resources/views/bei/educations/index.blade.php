@extends('layouts.app')

@section('title', 'Materi Edukasi Pasar Modal - Gallery BEI')

@section('content')
<div class="space-y-12 py-8">
    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
            </svg>
            Investment Academy
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Materi Edukasi Pasar Modal</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pelajari dasar-dasar investasi hingga strategi trading yang efektif</p>
    </div>

    <!-- Education Grid -->
    @if($educations->count() > 0)
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($educations as $education)
        <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg hover:border-purple-200 transition-all group">
            <div class="h-48 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 relative overflow-hidden">
                <div class="absolute inset-0 bg-black/20"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
            
            <div class="p-6">
                <h3 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2 group-hover:text-purple-600 transition-colors">
                    {{ $education->title }}
                </h3>
                
                <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                    {{ Str::limit(strip_tags($education->content), 120) }}
                </p>
                
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-xs text-gray-500">
                        {{ $education->created_at->diffForHumans() }}
                    </span>
                    <a href="{{ route('bei.educations.detail', $education) }}" class="inline-flex items-center text-sm font-medium text-purple-600 hover:text-purple-700 group-hover:gap-2 transition-all">
                        Pelajari
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $educations->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Materi</h3>
        <p class="text-gray-600">Materi edukasi akan segera ditambahkan. Pantau terus halaman ini!</p>
    </div>
    @endif

    <!-- CTA -->
    <div class="bg-gradient-to-br from-purple-600 to-blue-600 rounded-2xl p-8 text-center text-white">
        <h2 class="text-2xl font-bold mb-3">Ingin Belajar Langsung dari Ahli?</h2>
        <p class="text-purple-100 mb-6">Ikuti seminar dan workshop kami untuk mendapatkan insight langsung dari praktisi pasar modal</p>
        <a href="{{ route('bei.events') }}" class="inline-flex items-center px-6 py-3 bg-white text-purple-600 font-bold rounded-lg hover:bg-purple-50 transition-colors">
            Lihat Event Mendatang
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</div>
@endsection
