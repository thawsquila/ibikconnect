<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IBI Connect</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">
    <header class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b border-gray-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="/" class="font-semibold text-lg">IBI Connect</a>
            <nav class="hidden md:flex gap-6 text-sm">
                @if (request()->is('bei*'))
                    <a href="/bei#profil" class="hover:text-blue-600">Profil</a>
                    <a href="/bei#edukasi" class="hover:text-blue-600">Edukasi</a>
                    <a href="/bei#event" class="hover:text-blue-600">Event</a>
                    <a href="/bei#galeri" class="hover:text-blue-600">Galeri</a>
                    <a href="/bei#daftar" class="hover:text-blue-600">Pendaftaran</a>
                @else
                    <a href="/" class="hover:text-blue-600">CDC & Humas</a>
                    <a href="#lowongan" class="hover:text-blue-600">Lowongan</a>
                    <a href="#agenda" class="hover:text-blue-600">Agenda</a>
                    <a href="#berita" class="hover:text-blue-600">Berita</a>
                    <a href="#daftar" class="hover:text-blue-600">Form Pendaftaran</a>
                    <a href="#kontak" class="hover:text-blue-600">Kontak</a>
                @endif
            </nav>
            @if (request()->is('bei*'))
                <a href="/" class="inline-flex items-center rounded-md bg-blue-600 text-white px-3 py-2 text-sm font-medium hover:bg-blue-700">CDC & Humas</a>
            @else
                <a href="/bei" class="inline-flex items-center rounded-md bg-blue-600 text-white px-3 py-2 text-sm font-medium hover:bg-blue-700">Gallery BEI</a>
            @endif
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10">
        @yield('content')
    </main>

    <footer class="border-t border-gray-200 py-6 text-sm text-gray-600">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <p>© {{ date('Y') }} IBI Connect</p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-blue-600">Instagram</a>
                <a href="#" class="hover:text-blue-600">YouTube</a>
                <a href="#" class="hover:text-blue-600">Email</a>
            </div>
        </div>
    </footer>
</body>
</html>
