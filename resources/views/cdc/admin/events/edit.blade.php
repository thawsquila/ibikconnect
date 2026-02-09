@extends('layouts.admin')

@section('title', 'Edit Event CDC')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 mb-2">
            <a href="{{ route('admin.cdc.events.index') }}" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Edit Event CDC</h1>
        </div>
        <p class="text-gray-600">Update informasi event</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.cdc.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Judul Event <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') @enderror
                    placeholder="e.g. Workshop Digital Marketing">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Event Type & Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="event_type" class="block text-sm font-medium text-gray-700 mb-2">
                        Tipe Event
                    </label>
                    <input type="text" name="event_type" id="event_type" value="{{ old('event_type', $event->event_type) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('event_type') border-red-500 @enderror"
                        placeholder="e.g. Workshop, Seminar, Training">
                    @error('event_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('location') border-red-500 @else border-gray-300 @enderror"
                        placeholder="e.g. Auditorium IBI Kosgoro">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Start Date & End Date -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="datetime-local" name="start_date" id="start_date" 
                        value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('start_date') border-red-500 @else border-gray-300 @enderror">
                    @error('start_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai
                    </label>
                    <input type="datetime-local" name="end_date" id="end_date" 
                        value="{{ old('end_date', $event->end_date?->format('Y-m-d\TH:i')) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('end_date') border-red-500 @enderror">
                    @error('end_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Max Participants & Banner -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="max_participants" class="block text-sm font-medium text-gray-700 mb-2">
                        Kapasitas Maksimal
                    </label>
                    <input type="number" name="max_participants" id="max_participants" 
                        value="{{ old('max_participants', $event->max_participants) }}" min="1"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('max_participants') border-red-500 @enderror"
                        placeholder="Kosongkan untuk unlimited">
                    <p class="mt-1 text-xs text-gray-500">Terdaftar saat ini: {{ $event->registered_count }}</p>
                    @error('max_participants')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="banner_image" class="block text-sm font-medium text-gray-700 mb-2">
                        Banner Event
                    </label>
                    @if($event->banner_image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($event->banner_image) }}" alt="Current Banner" class="h-24 w-auto object-cover border rounded">
                            <p class="text-xs text-gray-500 mt-1">Banner saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="banner_image" id="banner_image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('banner_image') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500">Max 3MB (JPG, PNG, WEBP). Kosongkan jika tidak ingin mengubah.</p>
                    @error('banner_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi Event
                </label>
                <textarea name="description" id="description" rows="5"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                    placeholder="Jelaskan tentang event ini...">{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">
                    Persyaratan
                </label>
                <textarea name="requirements" id="requirements" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirements') border-red-500 @enderror"
                    placeholder="Tuliskan persyaratan untuk mengikuti event...">{{ old('requirements', $event->requirements) }}</textarea>
                @error('requirements')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Checkboxes -->
            <div class="space-y-3">
                <div class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" 
                        {{ old('is_published', $event->is_published) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="is_published" class="ml-2 text-sm text-gray-700">
                        Publikasikan event ini
                    </label>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_registration_open" id="is_registration_open" value="1" 
                        {{ old('is_registration_open', $event->is_registration_open) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="is_registration_open" class="ml-2 text-sm text-gray-700">
                        Buka pendaftaran
                    </label>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 pt-4 border-t">
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-colors">
                    Update Event
                </button>
                <a href="{{ route('admin.cdc.events.index') }}"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
