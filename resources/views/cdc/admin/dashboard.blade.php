@extends('layouts.admin')

@section('title', 'CDC Dashboard')
@section('page-title', 'CDC Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Jobs -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Lowongan</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['total_jobs'] }}</p>
                    <p class="mt-1 text-sm text-green-600">{{ $stats['active_jobs'] }} aktif</p>
                </div>
                <div class="p-3 bg-blue-50 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Events -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Event</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['total_events'] }}</p>
                    <p class="mt-1 text-sm text-green-600">{{ $stats['upcoming_events'] }} mendatang</p>
                </div>
                <div class="p-3 bg-purple-50 rounded-lg">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total News -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Berita</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['total_news'] }}</p>
                    <p class="mt-1 text-sm text-green-600">{{ $stats['published_news'] }} published</p>
                </div>
                <div class="p-3 bg-green-50 rounded-lg">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Registrations -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pendaftaran</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['total_registrations'] }}</p>
                    <p class="mt-1 text-sm text-orange-600">{{ $stats['pending_registrations'] }} pending</p>
                </div>
                <div class="p-3 bg-orange-50 rounded-lg">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Recent Registrations -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Pendaftaran Terbaru</h3>
            </div>
            <div class="divide-y divide-gray-200">
                @forelse($recentRegistrations as $registration)
                <div class="px-6 py-4 hover:bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ $registration->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $registration->event->title ?? 'Event dihapus' }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $registration->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($registration->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($registration->status) }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">{{ $registration->registered_at->diffForHumans() }}</p>
                </div>
                @empty
                <div class="px-6 py-8 text-center text-gray-500">
                    <p class="text-sm">Belum ada pendaftaran</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Events -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Event Mendatang</h3>
            </div>
            <div class="divide-y divide-gray-200">
                @forelse($recentEvents as $event)
                <div class="px-6 py-4 hover:bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ $event->title }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $event->start_date->format('d M Y, H:i') }}
                            </p>
                        </div>
                        <span class="text-xs font-medium text-gray-600">
                            {{ $event->registered_count }}/{{ $event->max_participants ?? '∞' }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="px-6 py-8 text-center text-gray-500">
                    <p class="text-sm">Belum ada event</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.cdc.jobs.create') }}" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-[#8A4BE2] hover:bg-purple-50 transition-colors">
                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="text-sm font-medium text-gray-700">Tambah Lowongan</span>
            </a>
            <a href="{{ route('admin.cdc.events.create') }}" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-[#8A4BE2] hover:bg-purple-50 transition-colors">
                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="text-sm font-medium text-gray-700">Tambah Event</span>
            </a>
            <a href="{{ route('admin.cdc.news.create') }}" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-[#8A4BE2] hover:bg-purple-50 transition-colors">
                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="text-sm font-medium text-gray-700">Tambah Berita</span>
            </a>
            <a href="{{ route('home') }}" target="_blank" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-[#8A4BE2] hover:bg-purple-50 transition-colors">
                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span class="text-sm font-medium text-gray-700">Lihat Website</span>
            </a>
        </div>
    </div>
</div>
@endsection
