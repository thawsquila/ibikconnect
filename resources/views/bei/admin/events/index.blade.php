@extends('layouts.admin')

@section('title', 'Kelola Event BEI')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Event BEI</h1>
            <p class="text-gray-600 mt-1">Kelola event dan workshop pasar modal</p>
        </div>
        <a href="{{ route('admin.bei.events.create') }}" 
            class="px-4 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Event
        </a>
    </div>

    <!-- Events Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peserta</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $event->title }}</div>
                            @if($event->description)
                                <div class="text-sm text-gray-500 mt-1">{{ Str::limit($event->description, 60) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $event->starts_at ? $event->starts_at->format('d M Y H:i') : '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $event->location ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="font-medium text-gray-900">{{ $event->registered_count ?? 0 }}</div>
                            @if($event->max_participants)
                                <div class="text-gray-500">/ {{ $event->max_participants }} max</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.bei.events.registrations', $event) }}" 
                                    class="text-purple-600 hover:text-purple-900" title="Lihat Pendaftar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.bei.events.edit', $event) }}" 
                                    class="text-blue-600 hover:text-blue-900" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.bei.events.destroy', $event) }}" method="POST" 
                                    onsubmit="return confirm('Yakin ingin menghapus event ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-lg font-medium">Belum ada event</p>
                            <p class="mt-1">Mulai dengan menambahkan event baru</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($events->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $events->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
