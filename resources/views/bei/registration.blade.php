@extends('layouts.app')

@section('title', 'Daftar Event - Gallery BEI')

@section('content')
<div class="space-y-12 py-8">
    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
            Pendaftaran Event
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Daftar Event Gallery BEI</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Daftarkan dirimu untuk mengikuti berbagai kegiatan pasar modal dan literasi keuangan</p>
    </div>

    @if(session('success'))
    <div class="max-w-3xl mx-auto p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-3xl mx-auto p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ session('error') }}
    </div>
    @endif

    @if($events->isEmpty())
    <div class="max-w-3xl mx-auto text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Event Tersedia</h3>
        <p class="text-gray-600">Saat ini belum ada event yang membuka pendaftaran. Pantau terus halaman ini!</p>
    </div>
    @else

    <!-- Form -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 p-8 shadow-sm">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Form Pendaftaran Kegiatan</h2>
            <p class="text-gray-600 mb-8">Daftarkan dirimu untuk mengikuti berbagai kegiatan pengembangan karier</p>

            <form action="{{ route('bei.registration.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama lengkap">
                        @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('email') border-red-500 @enderror"
                            placeholder="email@contoh.com">
                        @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                            placeholder="08xxxxxxxxxx">
                        @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NIM <span class="text-red-500">*</span></label>
                        <input type="text" name="nim" value="{{ old('nim') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('nim') border-red-500 @enderror"
                            placeholder="Nomor Induk Mahasiswa">
                        @error('nim')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Pilih Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Kegiatan <span class="text-red-500">*</span></label>
                    <select name="event_id" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('event_id') border-red-500 @enderror">
                        <option value="">-- Pilih Kegiatan --</option>
                        @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                            @if($event->starts_at) — {{ $event->starts_at->format('d M Y') }} @endif
                            @if($event->max_participants)
                                (Sisa: {{ max(0, $event->max_participants - $event->registered_count) }} slot)
                            @endif
                        </option>
                        @endforeach
                    </select>
                    @error('event_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pesan / Catatan (Opsional)</label>
                    <textarea name="message" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        placeholder="Tulis pesan atau pertanyaan Anda di sini...">{{ old('message') }}</textarea>
                </div>

                <div class="flex items-start">
                    <input type="checkbox" id="terms" required
                        class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 mt-1">
                    <label for="terms" class="ml-3 text-sm text-gray-600">
                        Saya menyetujui <a href="#" class="text-purple-600 hover:text-purple-700 font-medium">syarat dan ketentuan</a> yang berlaku
                    </label>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit"
                        class="flex-1 bg-purple-600 text-white font-bold py-4 rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Kirim Pendaftaran
                    </button>
                    <button type="reset"
                        class="px-8 py-4 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                        Reset Form
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection
