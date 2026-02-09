@extends('layouts.app')

@section('title', $education->title . ' - Gallery BEI')

@section('content')
<div class="space-y-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('bei.home') }}" class="hover:text-purple-600">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('bei.educations') }}" class="hover:text-purple-600">Edukasi</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-900 font-medium">{{ Str::limit($education->title, 50) }}</span>
    </nav>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <article class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="h-64 bg-linear-to-br from-blue-500 via-purple-500 to-pink-500 relative">
                    <div class="absolute inset-0 bg-black/20"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
                
                <div class="p-8">
                    <div class="flex items-center gap-3 text-sm text-gray-600 mb-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $education->created_at->format('d F Y') }}
                        </span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full font-medium text-xs">
                            Materi Edukasi
                        </span>
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{ $education->title }}</h1>
                    
                    <div class="prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($education->content)) !!}
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Related Education -->
            @if($relatedEducations->count() > 0)
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="font-bold text-gray-900 mb-4">Materi Lainnya</h3>
                <div class="space-y-4">
                    @foreach($relatedEducations as $related)
                    <a href="{{ route('bei.educations.detail', $related) }}" class="block group">
                        <h4 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors line-clamp-2 mb-1">
                            {{ $related->title }}
                        </h4>
                        <p class="text-xs text-gray-500">{{ $related->created_at->diffForHumans() }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- CTA Card -->
            <div class="bg-linear-to-br from-purple-600 to-blue-600 rounded-xl p-6 text-white sticky top-24">
                <h3 class="text-xl font-bold mb-3">Siap Praktik?</h3>
                <p class="text-purple-100 text-sm mb-6">Daftar event kami untuk belajar langsung dengan praktisi pasar modal</p>
                <a href="{{ route('bei.events') }}" class="block w-full bg-white text-purple-600 font-bold py-3 px-4 rounded-lg hover:bg-purple-50 transition-colors text-center">
                    Lihat Event
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
