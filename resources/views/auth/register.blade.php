@extends('layout.app')

@section('title', 'Register')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-xl rounded-2xl flex w-full max-w-4xl">
        <!-- ni page kiri -->
        <div class="bg-gradient-to-b from-blue-500 to-blue-400 text-white p-8 rounded-l-2xl flex flex-col justify-start items-center w-1/2 pt-8">
            <img src="{{ asset('img/SHEETS LOGO1.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full mb-3 shadow-lg object-contain">
            <h2 class="text-2xl font-bold">SELAMAT DATANG</h2>
            <p class="text-lg text-center">Di Sheet si teman tugasmu</p>
        </div>

        <!-- ni page kanan -->
        <div class="p-10 w-1/2 flex flex-col justify-center">
            <h2 class="text-2xl font-bold mb-2">Registerr</h2>
            <p class="text-gray-600 mb-6">Halo selamat datang</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="text-red-500 text-sm mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif
                <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:border-blue-500 focus:ring focus:ring-blue-300 transition" placeholder="Username" required>
                <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:border-blue-500 focus:ring focus:ring-blue-300 transition" placeholder="Email" required>
                <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:border-blue-500 focus:ring focus:ring-blue-300 transition" placeholder="Password" required>
                <input type="password" name="password_confirmation" class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:border-blue-500 focus:ring focus:ring-blue-300 transition" placeholder="Confirm Password" required>
                <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold shadow-md hover:bg-blue-600 transition">
                    REGISTER
                </button>
            </form>
            <p class="mt-4 text-sm text-center">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></p>
        </div>
    </div>
</div>
@endsection