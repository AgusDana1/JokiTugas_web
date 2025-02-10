@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-xl rounded-2xl flex w-full max-w-4xl">
        <!-- ni page kiri -->
        <div class="bg-gradient-to-b from-blue-500 to-blue-400 text-white p-8 rounded-l-2xl flex flex-col justify-start items-center w-1/2 pt-12">
            <img src="{{ asset('img/SHEETS LOGO1.jpg') }}" 
                alt="Logo" 
                class="w-10 h-10 md:w-12 md:h-12 max-w-[48px] max-h-[48px] rounded-full mb-3 shadow-lg object-contain">
            <div class="w-20 border-b-2 border-white mb-3"></div>
            <h2 class="text-xl font-bold">SELAMAT DATANG</h2>
            <p class="text-base">Di Sheets si teman tugasmu</p>
        </div>

        <!-- ni page kanan -->
        <div class="p-10 w-1/2">
            <h2 class="text-2xl font-bold mb-2">Login User</h2>
            <p class="text-gray-600 text-base mb-6">Halo, selamat datang kembali. Silakan login.</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="text-red-500 text-sm mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif
                <input type="email" name="email" class="w-full p-3 border border-blue-400 rounded-lg mb-4 focus:border-blue-500 focus:ring focus:ring-blue-300 transition text-base" placeholder="Email" required>
                <input type="password" name="password" class="w-full p-3 border border-blue-400 rounded-lg mb-4 focus:border-blue-500 focus:ring focus:ring-blue-300 transition text-base" placeholder="Password" required>

                <div class="flex justify-between items-center mb-4 text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2"> Remember me
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">Forgot Password?</a>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold shadow-md hover:bg-blue-600 transition text-base">
                    LOGIN
                </button>
            </form>

            <div class="text-center mt-6">
                <p class="text-gray-500 text-sm">atau dengan</p>
                <!-- Tombol Google -->
                <a href="{{ route('auth.google') }}">
                    <button class="bg-gray-200 px-4 py-3 rounded-lg w-full mt-2 flex justify-center items-center shadow-md hover:bg-gray-300 transition gap-3 text-base">
                        <img src="{{ asset('img/ggl.png') }}" alt="Google" 
                             class="w-3 h-3 md:w-4 md:h-4 max-w-[16px] max-h-[16px] object-contain flex-shrink-0"> 
                        <span class="text-gray-700 font-medium text-sm md:text-base">Login dengan Google</span>
                    </button>
                </a>
                <p class="mt-4 text-sm">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a></p>
            </div>
        </div>
    </div>
</div>
@endsection