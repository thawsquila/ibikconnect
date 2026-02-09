@extends('layouts.admin')

@section('title', 'Edit Lowongan Kerja')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 mb-2">
            <a href="{{ route('admin.cdc.jobs.index') }}" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Edit Lowongan Kerja</h1>
        </div>
        <p class="text-gray-600">Update informasi lowongan kerja</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.cdc.jobs.update', $job) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Judul Posisi <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    placeholder="e.g. Frontend Developer">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Company Name & Logo -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Perusahaan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $job->company_name) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company_name') border-red-500 @enderror"
                        placeholder="e.g. PT Teknologi Indonesia">
                    @error('company_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="company_logo" class="block text-sm font-medium text-gray-700 mb-2">
                        Logo Perusahaan
                    </label>
                    @if($job->company_logo)
                        <div class="mb-2">
                            <img src="{{ Storage::url($job->company_logo) }}" alt="Current Logo" class="h-16 w-16 object-contain border rounded">
                            <p class="text-xs text-gray-500 mt-1">Logo saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="company_logo" id="company_logo" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company_logo') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500">Max 2MB (JPG, PNG, WEBP). Kosongkan jika tidak ingin mengubah.</p>
                    @error('company_logo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Location & Type -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="location" id="location" value="{{ old('location', $job->location) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('location') border-red-500 @enderror"
                        placeholder="e.g. Jakarta, Indonesia">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                        Tipe Pekerjaan <span class="text-red-500">*</span>
                    </label>
                    <select name="type" id="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('type') border-red-500 @enderror">
                        <option value="">Pilih Tipe</option>
                        <option value="full-time" {{ old('type', $job->type) == 'full-time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part-time" {{ old('type', $job->type) == 'part-time' ? 'selected' : '' }}>Part Time</option>
                        <option value="internship" {{ old('type', $job->type) == 'internship' ? 'selected' : '' }}>Internship</option>
                        <option value="freelance" {{ old('type', $job->type) == 'freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="contract" {{ old('type', $job->type) == 'contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Salary Range & Deadline -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="salary_range" class="block text-sm font-medium text-gray-700 mb-2">
                        Range Gaji
                    </label>
                    <input type="text" name="salary_range" id="salary_range" value="{{ old('salary_range', $job->salary_range) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('salary_range') border-red-500 @enderror"
                        placeholder="e.g. Rp 5.000.000 - Rp 8.000.000">
                    @error('salary_range')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">
                        Batas Waktu
                    </label>
                    <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $job->deadline?->format('Y-m-d')) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('deadline') border-red-500 @enderror">
                    @error('deadline')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Application URL -->
            <div>
                <label for="application_url" class="block text-sm font-medium text-gray-700 mb-2">
                    Link Pendaftaran
                </label>
                <input type="url" name="application_url" id="application_url" value="{{ old('application_url', $job->application_url) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('application_url') border-red-500 @enderror"
                    placeholder="https://example.com/apply">
                @error('application_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi Pekerjaan
                </label>
                <textarea name="description" id="description" rows="5"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                    placeholder="Jelaskan tentang posisi ini...">{{ old('description', $job->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">
                    Persyaratan
                </label>
                <textarea name="requirements" id="requirements" rows="5"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirements') border-red-500 @enderror"
                    placeholder="Tuliskan persyaratan yang dibutuhkan...">{{ old('requirements', $job->requirements) }}</textarea>
                @error('requirements')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Benefits -->
            <div>
                <label for="benefits" class="block text-sm font-medium text-gray-700 mb-2">
                    Benefit
                </label>
                <textarea name="benefits" id="benefits" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('benefits') border-red-500 @enderror"
                    placeholder="Tuliskan benefit yang ditawarkan...">{{ old('benefits', $job->benefits) }}</textarea>
                @error('benefits')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="is_active" class="ml-2 text-sm text-gray-700">
                    Aktifkan lowongan ini
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 pt-4 border-t">
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-colors">
                    Update Lowongan
                </button>
                <a href="{{ route('admin.cdc.jobs.index') }}"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
