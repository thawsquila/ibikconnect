@extends('layouts.app')

@section('title', 'Info Lowongan Kerja & Magang - CDC IBI')

@section('content')
<div class="space-y-12 py-8">
    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
            </svg>
            Career Opportunities
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Info Lowongan Kerja & Magang</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan peluang karier terbaik dari berbagai perusahaan partner kami</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
            <div class="text-3xl font-bold text-purple-600">{{ $jobs->total() }}</div>
            <div class="text-sm text-gray-600 mt-1">Total Lowongan</div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
            <div class="text-3xl font-bold text-blue-600">50+</div>
            <div class="text-sm text-gray-600 mt-1">Perusahaan Partner</div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
            <div class="text-3xl font-bold text-green-600">2K+</div>
            <div class="text-sm text-gray-600 mt-1">Alumni Terserap</div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
            <div class="text-3xl font-bold text-orange-600">98%</div>
            <div class="text-sm text-gray-600 mt-1">Success Rate</div>
        </div>
    </div>

    <!-- Job Listings -->
    @if($jobs->count() > 0)
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($jobs as $job)
        <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg hover:border-purple-200 transition-all group">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-linear-to-br from-purple-500 to-blue-500 rounded-lg flex items-center justify-center text-white font-bold text-lg shadow-md">
                    {{ substr($job->company_name, 0, 1) }}
                </div>
                <span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-medium rounded-full">
                    {{ ucfirst($job->job_type) }}
                </span>
            </div>
            
            <h3 class="font-bold text-lg text-gray-900 mb-2 group-hover:text-purple-600 transition-colors line-clamp-2">
                {{ $job->title }}
            </h3>
            <p class="text-sm text-gray-600 mb-4">{{ $job->company_name }}</p>
            
            <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500 mb-4 pb-4 border-b border-gray-100">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    {{ $job->location }}
                </span>
                @if($job->salary_range)
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $job->salary_range }}
                </span>
                @endif
            </div>
            
            <a href="{{ route('cdc.jobs.detail', $job) }}" class="inline-flex items-center text-sm font-medium text-purple-600 hover:text-purple-700 group-hover:gap-2 transition-all">
                Lihat Detail
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $jobs->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Lowongan</h3>
        <p class="text-gray-600">Lowongan kerja akan segera ditambahkan. Pantau terus halaman ini!</p>
    </div>
    @endif
</div>
@endsection
