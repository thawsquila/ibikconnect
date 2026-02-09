@extends('layouts.app')

@section('title', 'Pendaftaran Member - Gallery BEI')

@section('content')
<div class="space-y-12 py-8">
    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
            </svg>
            Member Registration
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Pendaftaran Member Gallery BEI</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Bergabunglah dengan komunitas investor muda dan dapatkan akses ke berbagai program edukasi pasar modal</p>
    </div>

    <!-- Registration Form -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Form Pendaftaran</h2>
                
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('bei.registration.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">NIM (Opsional)</label>
                            <input type="text" name="nim" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Nomor Induk Mahasiswa">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="email@example.com">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                            <input type="tel" name="phone" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="08xxxxxxxxxx">
                        </div>
                    </div>



                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pesan / Motivasi</label>
                        <textarea name="message" rows="4" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="Ceritakan motivasi Anda bergabung dengan Gallery BEI..."></textarea>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" id="terms" required 
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 mt-1">
                        <label for="terms" class="ml-3 text-sm text-gray-600">
                            Saya menyetujui <a href="#" class="text-purple-600 hover:text-purple-700 font-medium">syarat dan ketentuan</a> yang berlaku dan bersedia mengikuti program edukasi Gallery BEI IBI Kesatuan
                        </label>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" 
                            class="flex-1 bg-purple-600 text-white font-bold py-4 rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Kirim Pendaftaran
                        </button>
                        <button type="reset" 
                            class="px-8 py-4 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection
