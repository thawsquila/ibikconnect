@extends('layouts.app')

@section('title', 'CDC & Humas IBI - Career Development Center')

@section('content')
<div class="space-y-20">
    <!-- Hero Section -->
    <section class="relative py-20 lg:py-32 overflow-hidden w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
        <!-- Background Pattern -->
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-[#F1E9FB]"></div>
            <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-blue-200 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-8 max-w-4xl mx-auto">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#D7C2F5] text-[#8A4BE2] rounded-full text-sm font-medium">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                    </svg>
                    Career Development Center IBI Kesatuan
                </div>

                <!-- Main Heading -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight">
                    Temukan Karier Terbaik<br/>
                    untuk <span class="text-[#8A4BE2]">Masa Depanmu</span>
                </h1>

                <!-- Description -->
                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    Platform lengkap untuk akses lowongan kerja, magang, agenda kampus, dan program pengembangan karier mahasiswa IBI Kesatuan Bogor.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="#lowongan" class="group inline-flex items-center justify-center px-8 py-4 bg-[#8A4BE2] text-white font-semibold rounded-xl hover:bg-[#7A3BD6] transition-all shadow-lg hover:shadow-xl hover:-translate-y-1">
                        Lihat Lowongan Kerja
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <a href="#daftar" class="inline-flex items-center justify-center px-8 py-4 bg-white text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all border-2 border-gray-300 hover:border-gray-400">
                        Daftar Kegiatan
                    </a>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pt-16 max-w-3xl mx-auto">
                    <div class="space-y-2">
                        <div class="text-4xl font-bold text-[#8A4BE2]">500+</div>
                        <div class="text-sm text-gray-600 font-medium">Lowongan Kerja</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-4xl font-bold text-[#8A4BE2]">2K+</div>
                        <div class="text-sm text-gray-600 font-medium">Alumni Sukses</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-4xl font-bold text-[#8A4BE2]">50+</div>
                        <div class="text-sm text-gray-600 font-medium">Partner Perusahaan</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-4xl font-bold text-[#8A4BE2]">98%</div>
                        <div class="text-sm text-gray-600 font-medium">Kepuasan User</div>
                    </div>
                </div>

                <!-- Company Logos -->
                <div class="pt-12">
                    <p class="text-sm text-gray-500 mb-6 font-medium">Mitra Afiliasi</p>
                    <div class="relative overflow-hidden rounded-3xl bg-white/50 border border-white/60 px-6 py-10">
                        <div class="pointer-events-none absolute -top-10 -left-10 w-48 h-48 rounded-full bg-[#F1E9FB] blur-2xl opacity-80"></div>
                        <div class="pointer-events-none absolute -bottom-16 -right-16 w-72 h-72 rounded-full bg-[#D7C2F5] blur-3xl opacity-70"></div>
                        <div class="pointer-events-none absolute top-1/2 -right-10 w-40 h-40 rounded-full bg-[#A67CE6]/30 blur-2xl opacity-70"></div>

                        <div class="relative z-10 flex flex-wrap items-center justify-center gap-8">
                        <div class="w-24 h-16 grayscale hover:grayscale-0 transition-all opacity-70 hover:opacity-100">
                            <img src="{{ asset('mitra/Jobstreet.png') }}" alt="JobStreetbySeek" class="w-full h-full object-contain">
                        </div>
                        <div class="w-24 h-16 grayscale hover:grayscale-0 transition-all opacity-70 hover:opacity-100">
                            <img src="{{ asset('mitra/stiuniv.png') }}" alt="Set West Negros University Inc In, The Philippines" class="w-full h-full object-contain">
                        </div>
                        <div class="w-24 h-16 grayscale hover:grayscale-0 transition-all opacity-70 hover:opacity-100">
                            <img src="{{ asset('mitra/langham.png') }}" alt="The Langham Jakarta" class="w-full h-full object-contain">
                        </div>
                        <div class="w-24 h-16 grayscale hover:grayscale-0 transition-all opacity-70 hover:opacity-100">
                            <img src="{{ asset('mitra/songklauniv.png') }}" alt="Prince of Songkla University Thailand" class="w-full h-full object-contain">
                        </div>
                        <div class="w-24 h-16 grayscale hover:grayscale-0 transition-all opacity-70 hover:opacity-100">
                            <img src="{{ asset('mitra/kai.png') }}" alt="PT. Kereta Commuter Indonesia" class="w-full h-full object-contain">
                        </div>
                        <div class="w-24 h-16 grayscale hover:grayscale-0 transition-all opacity-70 hover:opacity-100">
                            <img src="{{ asset('mitra/mutualplus.png') }}" alt="PT. Mutualplus Global Resources" class="w-full h-full object-contain">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="lowongan" class="scroll-mt-20">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Info Lowongan Kerja & Magang</h2>
                <p class="text-gray-600 mt-2">Temukan peluang karier terbaik untuk masa depanmu</p>
            </div>
            <a href="{{ route('cdc.jobs') }}" class="hidden sm:inline-flex items-center text-sm font-medium text-[#8A4BE2] hover:text-[#7A3BD6] transition-colors">
                Lihat Semua
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($jobs as $job)
            <article class="card p-6 hover:scale-[1.02] transition-transform group">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-linear-to-br from-purple-500 to-blue-500 rounded-lg flex items-center justify-center text-white font-bold text-lg shadow-md">
                        {{ substr($job->company_name, 0, 1) }}
                    </div>
                    <span class="px-3 py-1 bg-blue-50 text-[#8A4BE2] text-xs font-medium rounded-full">{{ ucfirst($job->type) }}</span>
                </div>
                <h3 class="font-semibold text-lg text-gray-900 mb-2 group-hover:text-[#8A4BE2] transition-colors">{{ $job->title }}</h3>
                <p class="text-sm text-gray-600 mb-4">{{ $job->company_name }}</p>
                <div class="flex items-center gap-4 text-xs text-gray-500 mb-4">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $job->location }}
                    </span>
                    @if($job->salary_range)
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $job->salary_range }}
                    </span>
                    @endif
                </div>
                <a href="{{ route('cdc.jobs.detail', $job) }}" class="inline-flex items-center text-sm font-medium text-[#8A4BE2] hover:text-[#8A4BE2] group-hover:gap-2 transition-all">
                    Lihat Detail
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </article>
            @empty
            <div class="col-span-3 text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <p class="mt-2 text-sm text-gray-500">Belum ada lowongan tersedia</p>
            </div>
            @endforelse
        </div>
    </section>

    <section id="agenda" class="scroll-mt-20">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Agenda Kegiatan</h2>
                <p class="text-gray-600 mt-2">Ikuti berbagai kegiatan pengembangan diri dan networking</p>
            </div>
            <a href="{{ route('cdc.events') }}" class="hidden sm:inline-flex items-center text-sm font-medium text-[#8A4BE2] hover:text-[#7A3BD6] transition-colors">
                Lihat Semua
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="card divide-y divide-gray-200">
            @forelse($events as $event)
            <div class="p-6 hover:bg-gray-50 transition-colors group">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex gap-4">
                        <div class="shrink-0 w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-lg text-gray-900 mb-2 group-hover:text-[#8A4BE2] transition-colors">{{ $event->title }}</h3>
                            <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                @if($event->starts_at)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $event->starts_at->format('d F Y') }}
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $event->starts_at->format('H:i') }} WIB
                                </span>
                                @endif
                                @if($event->location)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    {{ $event->location }}
                                </span>
                                @endif
                            </div>
                            @if($event->max_participants)
                            <p class="text-xs text-green-600 font-medium mt-2">
                                {{ $event->max_participants - $event->registered_count }} kursi tersisa
                            </p>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('cdc.events.detail', $event) }}" class="inline-flex items-center justify-center text-white bg-[#8A4BE2] hover:bg-[#7A3BD6] whitespace-nowrap self-start sm:self-center px-4 py-2 rounded-lg transition-all shadow-sm hover:shadow-md">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
            @empty
            <div class="p-12 text-center text-gray-500">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="mt-2 text-sm">Belum ada event mendatang</p>
            </div>
            @endforelse
        </div>
    </section>

    <section id="berita" class="scroll-mt-20">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Berita & Dokumentasi</h2>
                <p class="text-gray-600 mt-2">Update terbaru seputar kegiatan dan prestasi mahasiswa</p>
            </div>
            <a href="{{ route('cdc.news') }}" class="hidden sm:inline-flex items-center text-sm font-medium text-[#8A4BE2] hover:text-[#7A3BD6] transition-colors">
                Lihat Semua
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($news as $article)
            <article class="card overflow-hidden group hover:scale-[1.02] transition-transform">
                <div class="aspect-video bg-linear-to-br from-purple-400 to-blue-600 relative overflow-hidden">
                    @if($article->featured_image)
                        <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-gray-900 text-xs font-medium rounded-full">Berita</span>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 group-hover:text-[#8A4BE2] transition-colors">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-600 line-clamp-2 mb-4">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                    <a href="{{ route('cdc.news.detail', $article) }}" class="inline-flex items-center text-sm font-medium text-[#8A4BE2] hover:text-[#8A4BE2]">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <p class="mt-2 text-sm text-gray-500">Belum ada berita tersedia</p>
            </div>
            @endforelse
        </div>
    </section>

    <section id="daftar" class="scroll-mt-20">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Form Pendaftaran Kegiatan</h2>
                <p class="text-gray-600">Daftarkan dirimu untuk mengikuti berbagai kegiatan pengembangan karier</p>
            </div>
            
            @if (session('status'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm text-green-700 font-medium">{{ session('status') }}</p>
                </div>
            @endif

            <div class="card p-8">
                <form method="POST" action="{{ url('/cdc/register') }}" class="space-y-6">
                    @csrf
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" class="input-field" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" class="input-field" placeholder="email@contoh.com" required>
                        </div>
                    </div>
                    
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                No. Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="phone" class="input-field" placeholder="08xxxxxxxxxx" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                NIM <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nim" class="input-field" placeholder="Nomor Induk Mahasiswa" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Pilih Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <select name="event" class="input-field" required>
                            <option value="">-- Pilih Kegiatan --</option>
                            <option value="Benchmarking ke Perusahaan Startup">Benchmarking ke Perusahaan Startup</option>
                            <option value="Seminar Karier: Membangun Personal Branding">Seminar Karier: Membangun Personal Branding</option>
                            <option value="Workshop: Teknik Membuat CV yang Menarik">Workshop: Teknik Membuat CV yang Menarik</option>
                            <option value="Job Fair IBI 2026">Job Fair IBI 2026</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Pesan / Catatan (Opsional)
                        </label>
                        <textarea name="message" rows="4" class="input-field" placeholder="Tulis pesan atau pertanyaan Anda di sini..."></textarea>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" id="terms" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-1" required>
                        <label for="terms" class="ml-3 text-sm text-gray-600">
                            Saya menyetujui <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">syarat dan ketentuan</a> yang berlaku
                        </label>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit" class="inline-flex items-center justify-center text-white bg-[#8A4BE2] hover:bg-[#7A3BD6] px-6 py-3 text-sm font-medium rounded-lg transition-all shadow-sm hover:shadow-md flex-1 sm:flex-initial">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Kirim Pendaftaran
                        </button>
                        <button type="reset" class="btn-secondary flex-1 sm:flex-initial">
                            Reset Form
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section id="kontak" class="scroll-mt-20">
        <div class="card p-8 border-blue-200" style="background-color:#F1E9FB;">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
                <p class="text-gray-600 mb-8">Punya pertanyaan? Tim CDC & Humas IBI siap membantu Anda</p>
                
                <div class="grid gap-6 md:grid-cols-3 mb-8">
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-[#D7C2F5] rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#8A4BE2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Email</h3>
                        <a href="mailto:cdc@ibi.ac.id" class="text-sm text-[#8A4BE2] hover:text-[#8A4BE2]">cdc@ibi.ac.id</a>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-[#D7C2F5] rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#8A4BE2]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Instagram</h3>
                        <a href="https://instagram.com/cdc_ibi" target="_blank" class="text-sm text-[#8A4BE2] hover:text-[#8A4BE2]">@cdc_ibi</a>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-[#D7C2F5] rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#8A4BE2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Telepon</h3>
                        <a href="tel:+622518240774" class="text-sm text-[#8A4BE2] hover:text-[#8A4BE2]">(0251) 824-0774</a>
                    </div>
                </div>

                <p class="text-sm text-gray-600">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Institut Bisnis dan Informatika Kesatuan, Jl. Ranggagading No.1, Bogor
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
