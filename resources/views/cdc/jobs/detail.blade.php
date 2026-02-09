@extends('layouts.app')

@section('title', $job->title . ' - ' . $job->company_name)

@section('content')
<div class="space-y-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('home') }}" class="hover:text-purple-600">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('cdc.jobs') }}" class="hover:text-purple-600">Lowongan</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-900 font-medium">{{ $job->title }}</span>
    </nav>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Job Header -->
            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <div class="flex items-start gap-6 mb-6">
                    <div class="w-16 h-16 bg-linear-to-br from-purple-500 to-blue-500 rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shrink-0">
                        {{ substr($job->company_name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
                        <p class="text-lg text-gray-600 mb-3">{{ $job->company_name }}</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-sm font-medium rounded-full">
                                {{ ucfirst($job->job_type) }}
                            </span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm font-medium rounded-full flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                {{ $job->location }}
                            </span>
                            @if($job->salary_range)
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-sm font-medium rounded-full flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $job->salary_range }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                @if($job->deadline)
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 flex items-center gap-3">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-yellow-900">Batas Pendaftaran</p>
                        <p class="text-sm text-yellow-700">{{ $job->deadline->format('d F Y') }}</p>
                    </div>
                </div>
                @endif
            </div>

            <!-- Job Description -->
            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Deskripsi Pekerjaan</h2>
                <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($job->description)) !!}
                </div>
            </div>

            <!-- Requirements -->
            @if($job->requirements)
            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Kualifikasi</h2>
                <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($job->requirements)) !!}
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Apply Card -->
            <div class="bg-linear-to-br from-purple-600 to-blue-600 rounded-xl p-6 text-white sticky top-24">
                <h3 class="text-xl font-bold mb-4">Tertarik dengan posihref="mailto:{{ $job->contact_email }}" class="block w-full bg-white text-purple-600 font-bold py-3 px-4 rounded-lg hover:bg-purple-50 transition-colors text-center">
                    Kirim Email
                </a>
                @else
                <a href="{{ route('cdc.contact') }}" class="block w-full bg-white text-purple-600 font-bold py-3 px-4 rounded-lg hover:bg-purple-50 transition-colors text-center">
                    Hubungi CDC
                </a>
                @endif
                
                <p class="text-xs text-purple-200 mt-4 text-center">
                    Posted {{ $job->created_at->diffForHumans() }}
                </p>
            </div>

            <!-- Related Jobs -->
            @if($relatedJobs->count() > 0)
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="font-bold text-gray-900 mb-4">Lowongan Lainnya</h3>
                <div class="space-y-4">
                    @foreach($relatedJobs as $related)
                    <a href="{{ route('cdc.jobs.detail', $related) }}" class="block group">
                        <h4 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors line-clamp-2 mb-1">
                            {{ $related->title }}
                        </h4>
                        <p class="text-sm text-gray-600">{{ $related->company_name }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $related->location }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
