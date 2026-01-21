@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <header class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Admin Gallery BEI</h1>
            <p class="text-sm text-gray-600">Kelola edukasi, event, galeri, dan pendaftar.</p>
        </div>
        @if (session('status'))
            <div class="rounded-md border border-green-200 bg-green-50 text-green-700 p-2 text-sm">{{ session('status') }}</div>
        @endif
    </header>

    <section class="grid gap-6 md:grid-cols-2">
        <div class="rounded-lg border bg-white p-4 space-y-3">
            <h2 class="font-semibold">Buat Event Baru</h2>
            <form method="POST" action="{{ url('/admin/bei/events') }}" class="space-y-3">
                @csrf
                <label class="block text-sm">Judul
                    <input name="title" class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
                </label>
                <label class="block text-sm">Deskripsi
                    <textarea name="description" rows="3" class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
                </label>
                <div class="grid gap-3 md:grid-cols-2">
                    <label class="block text-sm">Tanggal Mulai
                        <input name="starts_at" type="datetime-local" class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </label>
                    <label class="block text-sm">Lokasi
                        <input name="location" class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </label>
                </div>
                <button class="inline-flex items-center rounded-md bg-blue-600 text-white px-4 py-2 text-sm font-medium hover:bg-blue-700">Simpan</button>
            </form>
        </div>

        <div class="rounded-lg border bg-white p-4 space-y-3">
            <h2 class="font-semibold">Daftar Event</h2>
            <div class="divide-y">
                @forelse ($events as $event)
                <div class="py-3 flex items-center justify-between">
                    <div>
                        <p class="font-medium">{{ $event->title }}</p>
                        <p class="text-sm text-gray-600">{{ $event->starts_at?->format('d M Y H:i') }} · {{ $event->location }}</p>
                    </div>
                    <form method="POST" action="{{ url('/admin/bei/events/'.$event->id.'/delete') }}">
                        @csrf
                        <button class="text-sm text-red-600 hover:underline" onclick="return confirm('Hapus event ini?')">Hapus</button>
                    </form>
                </div>
                @empty
                <p class="text-sm text-gray-600">Belum ada event.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="rounded-lg border bg-white p-4 space-y-3">
        <h2 class="font-semibold">Pendaftar Event</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="text-left border-b">
                        <th class="py-2 pr-4">Nama</th>
                        <th class="py-2 pr-4">Email</th>
                        <th class="py-2 pr-4">Event</th>
                        <th class="py-2 pr-4">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registrations as $r)
                    <tr class="border-b last:border-0">
                        <td class="py-2 pr-4">{{ $r->name }}</td>
                        <td class="py-2 pr-4">{{ $r->email }}</td>
                        <td class="py-2 pr-4">{{ $r->event_title }}</td>
                        <td class="py-2 pr-4">{{ $r->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="py-3 text-gray-600">Belum ada pendaftar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
