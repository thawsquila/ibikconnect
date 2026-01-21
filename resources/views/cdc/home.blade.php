@extends('layouts.app')

@section('content')
<div class="space-y-16">
    <section class="grid gap-6 md:grid-cols-2 items-center">
        <div class="space-y-4">
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight">CDC & Humas IBI</h1>
            <p class="text-gray-600">Fokus pada karier, informasi kampus, dan publikasi. Terhubung dengan lowongan kerja, agenda, berita, dan pendaftaran kegiatan.</p>
            <div class="flex gap-3">
                <a href="#lowongan" class="inline-flex items-center rounded-md bg-blue-600 text-white px-4 py-2 text-sm font-medium hover:bg-blue-700">Lihat Lowongan</a>
                <a href="#daftar" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium hover:bg-gray-50">Daftar Kegiatan</a>
            </div>
        </div>
        <div class="aspect-video rounded-lg bg-gradient-to-br from-blue-100 to-indigo-100 border border-blue-200"></div>
    </section>

    <section id="lowongan" class="space-y-4">
        <h2 class="text-xl font-semibold">Info Lowongan Kerja & Magang</h2>
        <div class="grid gap-4 md:grid-cols-3">
            @foreach (range(1,3) as $i)
            <article class="rounded-lg border bg-white p-4">
                <h3 class="font-medium">Posisi Contoh {{ $i }}</h3>
                <p class="text-sm text-gray-600">Perusahaan X · Bogor · Full-time</p>
                <a href="#" class="mt-2 inline-flex text-sm text-blue-600 hover:underline">Lihat detail</a>
            </article>
            @endforeach
        </div>
    </section>

    <section id="agenda" class="space-y-4">
        <h2 class="text-xl font-semibold">Agenda Kegiatan</h2>
        <ul class="divide-y rounded-lg border bg-white">
            @foreach (['Benchmarking','Seminar Karier','Pelatihan CV'] as $item)
            <li class="p-4 flex items-center justify-between">
                <div>
                    <p class="font-medium">{{ $item }}</p>
                    <p class="text-sm text-gray-600">Tanggal contoh · Ruang A</p>
                </div>
                <a href="#daftar" class="text-sm text-blue-600 hover:underline">Daftar</a>
            </li>
            @endforeach
        </ul>
    </section>

    <section id="berita" class="space-y-4">
        <h2 class="text-xl font-semibold">Berita & Dokumentasi</h2>
        <div class="grid gap-4 md:grid-cols-3">
            @foreach (range(1,3) as $i)
            <article class="rounded-lg overflow-hidden border bg-white">
                <div class="aspect-video bg-gray-100"></div>
                <div class="p-4">
                    <h3 class="font-medium">Judul Berita {{ $i }}</h3>
                    <p class="text-sm text-gray-600">Ringkasan singkat berita...</p>
                </div>
            </article>
            @endforeach
        </div>
    </section>

    <section id="daftar" class="space-y-4">
        <h2 class="text-xl font-semibold">Form Pendaftaran</h2>
        <form class="space-y-4 rounded-lg border bg-white p-4">
            <div class="grid gap-4 md:grid-cols-2">
                <label class="block text-sm">Nama
                    <input class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" type="text" placeholder="Nama lengkap">
                </label>
                <label class="block text-sm">Email
                    <input class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" type="email" placeholder="email@contoh.com">
                </label>
            </div>
            <label class="block text-sm">Kegiatan
                <select class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    <option>Benchmarking</option>
                    <option>Seminar</option>
                    <option>Magang</option>
                </select>
            </label>
            <button type="submit" class="inline-flex items-center rounded-md bg-blue-600 text-white px-4 py-2 text-sm font-medium hover:bg-blue-700">Kirim</button>
        </form>
    </section>

    <section id="kontak" class="space-y-2">
        <h2 class="text-xl font-semibold">Kontak & Media Sosial Humas</h2>
        <p class="text-gray-600 text-sm">Email: humas@ibi.ac.id · IG: @humas_ibi</p>
    </section>
</div>
@endsection
