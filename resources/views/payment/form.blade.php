@extends('layout.app')

@section('title', "Order Sheets si Teman Tugasmu")

@section('navbar')
<x-navbar></x-navbar>
@endsection

@section('content')
<body>
    <div class="flex justify-center mt-28">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <a href="{{ route('home') }}">
                <i class="bi bi-arrow-left p-2 px-3 w-23"></i>
            </a>
            <h1 class="text-3xl font-bold mb-6 text-blue-600 text-center">Sheets Si Teman Tugasmu</h1>
            <p class="text-gray-500 text-center mb-8">Silakan lengkapi form Pembayaran di bawah ini</p>
    
            <form action="{{ route('payment.page') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" 
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                        required>
                </div>
    
                {{-- Mata Pelajaran --}}
                <div>
                    <label for="mapel" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                    <input type="text" id="mapel" name="mapel" placeholder="Masukkan Mata Pelajaran dari Tugas Anda" 
                    class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    required>
                </div>
    
                {{-- Deskripsi Tugas --}}
                <div>
                    <label for="deskripsi_tugas" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                    <textarea id="deskripsi_tugas" name="deskripsi_tugas" placeholder="Masukkan Kesulitan apa yang ada pada Mata Pelajaran yang Anda pilih" 
                    class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-left" 
                        rows="5" required></textarea>
                </div>

                {{-- Upload Foto Tugas --}}
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Foto Tugas</label>
                    <input type="file" id="image" name="image" accept="image/*"
                    class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
    
                {{-- Deadline Tugas --}}
                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Deadline Tugas</label>
                    <input type="datetime-local" id="deadline" name="deadline" class="w-full mt-1 border rounded px-4 py-2" required>
                </div>
    
                {{-- Jumlah halaman Tugas --}}
                <div>
                    <label for="jumlah_halaman" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Halaman</label>
                    <input type="number" id="jumlah_halaman" name="jumlah_halaman" placeholder="Masukkan Jumlah Halaman Tugas Anda" 
                    class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    required>
                </div>
    
                <!-- Metode Pembayaran -->
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method" 
                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                            required>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="e-wallet">E-Wallet</option>
                    </select>
                </div>

                <!-- Form opsi jika memilih E-wallet -->
                <div id="e_wallet_options" class="hidden mt-3">
                    <label for="e_wallet" class="block text-sm font-medium text-gray-700 mb-1">Pilih E-Wallet:</label>
                    <select name="e_wallet" id="e_wallet" 
                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih E-Wallet --</option>
                        <option value="dana">Dana</option>
                        <option value="gopay">GoPay</option>
                        <option value="ovo">OVO</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200">
                        Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>

{{-- Script --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let paymentMethod = document.getElementById('payment_method');
        let eWalletOption = document.getElementById('e_wallet_options');
        let form = document.getElementById('order-form');

        // Tampilkan/hilangkan dropdown E-Wallet sesuai pilihan user
        paymentMethod.addEventListener('change', function() {
            if (this.value === 'e-wallet') {
                eWalletOption.classList.remove('hidden');
            } else {
                eWalletOption.classList.add('hidden');
            }
        });

        // Redirect ke halaman pembayaran yang sesuai saat submit
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            let selectedPayment = paymentMethod.value;
            let selectedEwallet = document.getElementById('e_wallet').value;

            if (selectedPayment === 'e-wallet' && !selectedEwallet) {
                alert('Silakan pilih E-Wallet sebelum melanjutkan!');
                return;
            }

            let paymentUrl = selectedPayment === 'e-wallet' ? `/payment/${selectedEwallet}` : '/payment/bank';

            window.location.href = paymentUrl;
        });
    });
    </script>
</body>
@endsection
