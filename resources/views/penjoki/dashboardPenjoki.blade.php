@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('navbar')
    <x-navbar></x-navbar>
@endsection

@section('content')
<div class="container mx-auto mt-28">
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-6 text-blue-600">Penjoki Dashboard</h1>
        <i class="bi bi-bell text-2xl px-4 py-2"></i>
    </div>

    <!-- Notifikasi -->
    <div class="mb-6">
        <ul class="bg-white shadow-md rounded-lg p-2">
            @foreach(auth()->user()->notifications as $notification)
                <li class="border-b p-2">
                    {{ $notification->data['message'] }} 
                    <a href="{{ route('order.show', $notification->data['order_id']) }}" class="text-blue-500">Lihat</a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Daftar Pesanan -->
    <div>
        <h2 class="text-xl flex justify-center font-semibold text-gray-700 mb-4">Daftar Pesanan</h2>
        <table class="w-full border-collapse border border-gray-300 bg-white shadow-md">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="border p-3">ID</th>
                    <th class="border p-3">Nama</th>
                    <th class="border p-3">Mata Pelajaran</th>
                    <th class="border p-3">Deadline</th>
                    <th class="border p-3">Status</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="text-center border-b">
                    <td class="border p-3">{{ $order->id }}</td>
                    <td class="border p-3">{{ $order->user->name }}</td>
                    <td class="border p-3">{{ $order->mapel }}</td>
                    <td class="border p-3">{{ date('d M Y H:i', strtotime($order->deadline)) }}</td>
                    <td class="border p-3">
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

    <!-- Pagination -->
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
