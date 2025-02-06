@extends('layout.app')

@section('title', 'Penjoki Dashboard')

@section('navbar')
    <x-navbar></x-navbar>
@endsection

@section('content')
<div class="container mx-auto mt-28 px-4">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold mb-6 text-blue-600">Dashboard</h1>
        <i class="bi bi-bell text-2xl cursor-pointer"></i>
    </div>

    <!-- Daftar Pesanan -->
    <div>
        <h2 class="text-xl flex justify-center font-semibold text-gray-700 mb-4">Daftar Pesanan</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 bg-white shadow-md hidden md:table">
                <thead>
                    <tr class="text-black">
                        <th class="border p-3 font-poppins">ID</th>
                        <th class="border p-3 font-poppins">Nama</th>
                        <th class="border p-3 font-poppins">Mata Pelajaran</th>
                        <th class="border p-3 font-poppins">Deadline</th>
                        <th class="border p-3 font-poppins">Status</th>
                        <th class="border p-3 font-poppins">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="text-center border-b">
                        <td class="border p-3 text-sm">{{ $order->id }}</td>
                        <td class="border p-3 text-sm">{{ $order->user->name }}</td>
                        <td class="border p-3 text-sm">{{ $order->mapel }}</td>
                        <td class="border p-3 text-sm">{{ date('d M Y H:i', strtotime($order->deadline)) }}</td>
                        <td class="border p-3 text-sm">
                            <span class="px-3 py-1 rounded-full text-white 
                                {{ $order->status == 'pending' ? 'bg-yellow-500' : ($order->status == 'paid' ? 'bg-green-500' : 'bg-gray-500') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="border p-3">
                            <a href="{{ route('order.show', $order->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile Version -->
        <div class="md:hidden space-y-4">
            @foreach($orders as $order)
            <div class="bg-white shadow-md rounded-lg p-4 border">
                <p class="text-sm p-2 font-semibold">ID: {{ $order->id }}</p>
                <p class="text-sm p-2">Nama: {{ $order->user->name }}</p>
                <p class="text-sm p-2">Mata Pelajaran: {{ $order->mapel }}</p>
                <p class="text-sm p-2">Deadline: {{ date('d M Y H:i', strtotime($order->deadline)) }}</p>
                <p class="text-sm p-2">
                    Status: <span class="px-3 py-1 rounded-full text-white 
                        {{ $order->status == 'pending' ? 'bg-yellow-500' : ($order->status == 'paid' ? 'bg-green-500' : 'bg-gray-500') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
                <div class="mt-2">
                    <a href="{{ route('order.show', $order->id) }}" class="bg-blue-500 w-1/3 text-white px-4 py-2 rounded-md block text-center">Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
