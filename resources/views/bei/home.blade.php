@extends('layouts.app')

@section('content')
<div class="space-y-16">
    <section class="grid gap-6 md:grid-cols-2 items-center">
        <div class="space-y-4">
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight">Gallery BEI IBI Bogor</h1>
            <p class="text-gray-600">Pusat edukasi pasar modal di IBI Bogor: literasi saham, event investasi, dan kolaborasi dengan BEI.</p>
            <div class="flex gap-3">
                <a href="#edukasi" class="inline-flex items-center rounded-md bg-blue-600 text-white px-4 py-2 text-sm font-medium hover:bg-blue-700">Mulai Belajar</a>
                <a href="#daftar" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium hover:bg-gray-50">Daftar Event</a>
            </div>
        </div>
        <div class="aspect-video rounded-lg bg-gradient-to-br from-blue-100 to-indigo-100 border border-blue-200"></div>
    </section>

    <section id="profil" class="space-y-4">
        <h2 class="text-xl font-semibold">Profil Gallery BEI</h2>
        <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-lg border bg-white p-4 space-y-3">
                <h3 class="font-medium">Sejarah</h3>
                <p class="text-sm text-gray-700">Gallery BEI IBI Bogor didirikan untuk meningkatkan literasi dan inklusi pasar modal di lingkungan kampus.</p>
                <h3 class="font-medium">Visi & Misi</h3>
                <ul class="list-disc pl-5 text-sm text-gray-700">
                    <li>Meningkatkan literasi investasi bagi sivitas akademika.</li>
                    <li>Memfasilitasi kegiatan edukasi dan pengembangan komunitas investor muda.</li>
                </ul>
            </div>
            <div class="rounded-lg border bg-white p-4 space-y-3">
                <h3 class="font-medium">Struktur Pengelola (opsional)</h3>
                <ul class="list-disc pl-5 text-sm text-gray-700">
                    <li>Pembina, Koordinator, Tim Edukasi, Tim Event</li>
                </ul>
                <div class="aspect-video rounded-md bg-gray-100 border"></div>
                <p class="text-xs text-gray-500">Logo & foto ruangan Gallery BEI</p>
            </div>
        </div>
    </section>

    <section id="edukasi" class="space-y-4">
        <h2 class="text-xl font-semibold">Edukasi Pasar Modal</h2>
        <div class="grid gap-4 md:grid-cols-2">
            <article class="rounded-lg border bg-white p-4">
                <h3 class="font-medium">Apa itu Pasar Modal</h3>
                <p class="text-sm text-gray-600">Tempat bertemunya pihak yang membutuhkan modal dan pihak yang memiliki dana untuk berinvestasi.</p>
            </article>
            <article class="rounded-lg border bg-white p-4">
                <h3 class="font-medium">Instrumen: Saham, Obligasi, Reksadana</h3>
                <p class="text-sm text-gray-600">Instrumen utama yang diperdagangkan di pasar modal Indonesia.</p>
            </article>
            <article class="rounded-lg border bg-white p-4">
                <h3 class="font-medium">Cara Membuka Rekening Saham</h3>
                <p class="text-sm text-gray-600">Pilih sekuritas, siapkan KTP/NPWP, isi formulir, lakukan verifikasi, dan mulai investasi.</p>
            </article>
            <article class="rounded-lg border bg-white p-4">
                <h3 class="font-medium">Istilah Dasar</h3>
                <p class="text-sm text-gray-600">IHSG, Lot, Bid/Ask, Dividen, Capital Gain, dan lainnya.</p>
            </article>
        </div>
    </section>

    <section id="event" class="space-y-4">
        <h2 class="text-xl font-semibold">Event Pasar Modal</h2>
        <div class="grid gap-4 md:grid-cols-3">
            @foreach (['Sekolah Pasar Modal','Seminar Investasi','Webinar BEI'] as $event)
            <article class="rounded-lg border bg-white p-4">
                <h3 class="font-medium">{{ $event }}</h3>
                <p class="text-sm text-gray-600">Tanggal & lokasi contoh</p>
                <a href="#daftar" class="mt-2 inline-flex text-sm text-blue-600 hover:underline">Daftar</a>
            </article>
            @endforeach
        </div>
    </section>

    <section id="galeri" class="space-y-4">
        <h2 class="text-xl font-semibold">Galeri Kegiatan Gallery BEI</h2>
        <div class="grid gap-4 md:grid-cols-3">
            @foreach (['Foto Seminar','Foto Edukasi','Foto Kunjungan'] as $i)
            <figure class="rounded-lg overflow-hidden border bg-white">
                <div class="aspect-video bg-gray-100"></div>
                <figcaption class="p-3 text-sm text-gray-600">{{ $i }}</figcaption>
            </figure>
            @endforeach
        </div>
    </section>

    <section id="daftar" class="space-y-4">
        <h2 class="text-xl font-semibold">Pendaftaran Event Online</h2>
        @if (session('status'))
            <div class="rounded-md border border-green-200 bg-green-50 text-green-700 p-3 text-sm">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ url('/bei/register') }}" class="space-y-4 rounded-lg border bg-white p-4">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">
                <label class="block text-sm">Nama
                    <input name="name" class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" type="text" placeholder="Nama lengkap" required>
                </label>
                <label class="block text-sm">Email
                    <input name="email" class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" type="email" placeholder="email@contoh.com" required>
                </label>
            </div>
            <label class="block text-sm">Pilih Event
                <select name="event" class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
                    <option value="Sekolah Pasar Modal">Sekolah Pasar Modal</option>
                    <option value="Seminar Investasi">Seminar Investasi</option>
                    <option value="Webinar BEI">Webinar BEI</option>
                </select>
            </label>
            <button type="submit" class="inline-flex items-center rounded-md bg-blue-600 text-white px-4 py-2 text-sm font-medium hover:bg-blue-700">Kirim</button>
        </form>
    </section>
</div>
@endsection
