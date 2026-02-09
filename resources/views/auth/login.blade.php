@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto w-full">
    <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-900">Login Admin</h1>
            <p class="text-sm text-gray-500 mt-1">Masuk untuk mengelola Gallery BEI</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 text-red-700 p-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                    class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600" />
            </div>
            <label class="inline-flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-600" />
                Ingat saya
            </label>
            <button type="submit" class="w-full inline-flex justify-center items-center bg-[#8A4BE2] hover:bg-[#7A3BD6] text-white font-semibold px-4 py-2 rounded-lg">
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection
