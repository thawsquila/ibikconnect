<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IBI Connect - Career Development Center & Gallery BEI')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-linear-to-br from-gray-50 via-blue-50/30 to-gray-50 text-gray-900 antialiased">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2 group">
                    <img src="{{ asset('LOGO_IBIK.png') }}" alt="IBI Kesatuan" class="w-10 h-10 object-contain transition-transform group-hover:scale-105">
                    <span class="font-semibold text-lg text-gray-900 hidden sm:block">IBI Connect</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-1">
                    @if (request()->is('bei*'))
                        <a href="{{ route('bei.profile') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Profil</a>
                        <a href="{{ route('bei.educations') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Edukasi</a>
                        <a href="{{ route('bei.events') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Event</a>
                        <a href="{{ route('bei.gallery') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Galeri</a>
                        <a href="{{ route('bei.registration') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Pendaftaran</a>
                    @else
                        <a href="{{ route('cdc.jobs') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Lowongan</a>
                        <a href="{{ route('cdc.events') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Agenda</a>
                        <a href="{{ route('cdc.news') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Berita</a>
                        <a href="{{ route('cdc.contact') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all">Kontak</a>
                    @endif
                </nav>

                <!-- CTA Button -->
                <div class="flex items-center gap-3">
                    @if (request()->is('bei*'))
                        <a href="/" class="inline-flex items-center justify-center text-white bg-[#8A4BE2] hover:bg-[#7A3BD6] text-xs sm:text-sm px-4 py-2 rounded-lg transition-all shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            CDC & Humas
                        </a>
                    @else
                        <a href="/bei" class="inline-flex items-center justify-center text-white bg-[#8A4BE2] hover:bg-[#7A3BD6] text-xs sm:text-sm px-4 py-2 rounded-lg transition-all shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Gallery BEI
                        </a>
                    @endif
                    
                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 bg-white">
            <nav class="px-4 py-3 space-y-1">
                @if (request()->is('bei*'))
                    <a href="{{ route('bei.profile') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Profil</a>
                    <a href="{{ route('bei.educations') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Edukasi</a>
                    <a href="{{ route('bei.events') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Event</a>
                    <a href="{{ route('bei.gallery') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Galeri</a>
                    <a href="{{ route('bei.registration') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Pendaftaran</a>
                @else
                    <a href="{{ route('cdc.jobs') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Lowongan</a>
                    <a href="{{ route('cdc.events') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Agenda</a>
                    <a href="{{ route('cdc.news') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Berita</a>
                    <a href="{{ route('cdc.contact') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg">Kontak</a>
                @endif
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-0 sm:pt-2 pb-8 sm:pb-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <img src="{{ asset('LOGO_IBIK.png') }}" alt="IBI Kesatuan" class="w-10 h-10 object-contain">
                        <span class="font-semibold text-lg text-gray-900">IBI Connect</span>
                    </div>
                    <p class="text-sm text-gray-600 max-w-md">
                        Platform terpadu untuk Career Development Center dan Gallery BEI Institut Bisnis dan Informatika Kesatuan Bogor.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-purple-600 transition-colors">CDC & Humas</a></li>
                        <li><a href="{{ route('bei.home') }}" class="text-gray-600 hover:text-purple-600 transition-colors">Gallery BEI</a></li>
                        <li><a href="{{ route('cdc.jobs') }}" class="text-gray-600 hover:text-purple-600 transition-colors">Info Lowongan</a></li>
                        <li><a href="{{ route('bei.events') }}" class="text-gray-600 hover:text-purple-600 transition-colors">Event Pasar Modal</a></li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Ikuti Kami</h3>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-purple-600 text-gray-600 hover:text-white rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-purple-600 text-gray-600 hover:text-white rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-purple-600 text-gray-600 hover:text-white rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-8 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-600">© {{ date('Y') }} IBI Connect. All rights reserved.</p>
                <div class="flex gap-6 text-sm text-gray-600">
                    <a href="#" class="hover:text-purple-600 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-purple-600 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href !== '') {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        const header = document.querySelector('header');
                        const offset = header ? header.offsetHeight + 8 : 0; // extra padding
                        const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
                        const scrollTo = Math.max(elementPosition - offset, 0);
                        window.scrollTo({ top: scrollTo, behavior: 'smooth' });
                        // Close mobile menu if open
                        document.getElementById('mobile-menu')?.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>
</html>
