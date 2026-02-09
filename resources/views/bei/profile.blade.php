@extends('layouts.app')

@section('title', 'Profil Gallery BEI - IBI Kesatuan')

@section('content')
<div class="space-y-16 py-8">
    <!-- Hero -->
    <div class="text-center space-y-6">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
            </svg>
            Tentang Kami
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-gray-900">Gallery BEI IBI Kesatuan</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Pusat edukasi pasar modal yang berkomitmen untuk meningkatkan literasi keuangan mahasiswa dan masyarakat umum
        </p>
    </div>

    <!-- Visi & Misi -->
    <div class="grid lg:grid-cols-2 gap-12">
        <div class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-lg transition-all">
            <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Visi</h2>
            <p class="text-gray-700 leading-relaxed">
                Menjadi pusat literasi pasar modal terdepan di Jawa Barat yang menghasilkan investor cerdas dan bertanggung jawab, serta menjembatani dunia pendidikan dengan industri pasar modal secara profesional.
            </p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-lg transition-all">
            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Misi</h2>
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Memberikan edukasi pasar modal yang komprehensif dan mudah dipahami
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Membangun kolaborasi dengan pelaku industri pasar modal
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Menciptakan ekosistem investasi yang sehat di kalangan mahasiswa
                </li>
            </ul>
        </div>
    </div>

    <!-- Program Unggulan -->
    <div>
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Program Unggulan</h2>
            <p class="text-gray-600">Berbagai program edukasi yang kami tawarkan</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl border border-gray-200 p-8 hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-linear-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Sekolah Pasar Modal</h3>
                <p class="text-gray-600 leading-relaxed">Program edukasi dasar tentang investasi saham, obligasi, dan instrumen pasar modal lainnya</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8 hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-linear-to-br from-green-500 to-blue-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Trading Floor</h3>
                <p class="text-gray-600 leading-relaxed">Fasilitas trading real-time dengan data pasar langsung dari Bursa Efek Indonesia</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8 hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-linear-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Seminar & Workshop</h3>
                <p class="text-gray-600 leading-relaxed">Kegiatan rutin dengan menghadirkan praktisi dan ahli pasar modal</p>
            </div>
        </div>
    </div>

    <!-- Partners -->
    <div class="bg-linear-to-br from-purple-50 to-blue-50 rounded-2xl p-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Partner Resmi</h2>
            <p class="text-gray-600">Bekerja sama dengan institusi terpercaya</p>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-12 opacity-60">
            <span class="text-2xl font-black text-blue-900">IDX</span>
            <span class="text-2xl font-black text-red-700">OJK</span>
            <span class="text-2xl font-black text-red-600">MNC Sekuritas</span>
            <span class="text-2xl font-black text-blue-600">IndoPremier</span>
            <span class="text-2xl font-black text-indigo-900">PhillipCapital</span>
        </div>
    </div>

    <!-- CTA -->
    <div class="bg-linear-to-br from-purple-600 to-blue-600 rounded-2xl p-12 text-center text-white">
        <h2 class="text-3xl font-bold mb-4">Siap Memulai Perjalanan Investasi?</h2>
        <p class="text-purple-100 text-lg mb-8 max-w-2xl mx-auto">
            Bergabunglah dengan ribuan mahasiswa yang telah memulai perjalanan investasi mereka bersama Gallery BEI IBI
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('bei.events') }}" class="px-8 py-4 bg-white text-purple-600 font-bold rounded-xl hover:bg-purple-50 transition-colors">
                Lihat Event
            </a>
            <a href="{{ route('bei.registration') }}" class="px-8 py-4 bg-purple-700 text-white font-bold rounded-xl hover:bg-purple-800 transition-colors border-2 border-white/20">
                Daftar Sekarang
            </a>
        </div>
    </div>
</div>
@endsection
