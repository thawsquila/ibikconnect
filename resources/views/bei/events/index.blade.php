@extends('layouts.app')

@section('title', 'Event Pasar Modal - Gallery BEI')

@section('content')
<div class="space-y-12 py-8">
    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
            Capital Market Events
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Event Pasar Modal</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Ikuti seminar, workshop, dan kegiatan edukasi pasar modal bersama praktisi profesional</p>
    </div>

    <!-- Events List -->
    @if($events->count() > 0)
    <div class="space-y-6">
        @foreach($events as $event)
        <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-all group">
            <div class="md:flex">
                <!-- Event Image/Date -->
                @if($event->banner_image)
                <div class="md:w-64 h-48 md:h-auto shrink-0">
                    <img src="{{ asset('storage/' . $event->banner_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="md:w-48 bg-linear-to-br from-purple-500 to-blue-500 p-8 flex flex-col items-center justify-center text-white shrink-0">
                    <div class="text-5xl font-bold">{{ $event->starts_at ? $event->starts_at->format('d') : '-' }}</div>
                    <div class="text-lg font-semibold">{{ $event->starts_at ? $event->starts_at->format('M Y') : '-' }}</div>
                    @if($event->is_registration_open)
                    <span class="mt-4 px-3 py-1 bg-white/20 backdrop-blur-sm text-xs font-bold rounded-full">OPEN</span>
                    @endif
                </div>
                @endif

                <!-- Event Content -->
                <div class="flex-1 p-6 md:p-8">
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">
                                {{ $event->title }}
                            </h3>
                            <p class="text-gray-600 line-clamp-2">{{ $event->description }}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-6">
                        @if($event->starts_at)
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $event->starts_at->format('d M Y, H:i') }} WIB
                        </span>
                        @endif
                        @if($event->location)
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            {{ $event->location }}
                        </span>
                        @endif
                        @if($event->max_participants)
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            {{ $event->registered_count ?? 0 }}/{{ $event->max_participants }} peserta
                        </span>
                        @endif
                    </div>

                    <a href="{{ route('bei.events.detail', $event) }}" class="inline-flex items-center px-6 py-2.5 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors">
                        Lihat Detail & Daftar
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        {{ $events->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Event</h3>
        <p class="text-gray-600">Event akan segera ditambahkan. Pantau terus halaman ini!</p>
    </div>
    @endif
</div>
@endsection
