@extends('layout.app')

@section('content')
<div class="flex justify-center mt-10">
    <div class="w-full max-w-md p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold text-center text-blue-600">Login</h2>
        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="email">Email:</label>
                <input type="email" name="email" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label for="password">Password:</label>
                <input type="password" name="password" required class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Login</button>
            <h1 class="text-md text-blue-500 flex justify-center font-bold m-2 font-poppins gap-2">
                Don't Haven't Account? 
                <a href="{{ route('register') }}" class="hover:text-black">Sign Up</a>
            </h1>
        </form>
    </div>
</div>
@endsection
