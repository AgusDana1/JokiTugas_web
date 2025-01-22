<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form JOKI TUGAS</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-blue-600 text-center">SHEETS Si Joki Tugas</h1>
        <p class="text-gray-500 text-center mb-8">Silakan lengkapi form di bawah ini</p>

        <form action="{{ route('payment.process') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" 
                       class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                       required>
            </div>

            <!-- Pilih Produk -->
            <div>
                <label for="product" class="block text-sm font-medium text-gray-700 mb-1">Pilih Jasa Joki</label>
                <select id="product" name="product" 
                    class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    required>
                    <option value="Tugas Sekolah umum">Tugas Sekolah umum</option>
                    <option value="Buatin Tugas Matematika saya">Buatin Tugas Matematika saya</option>
                    <option value="Buatin Tugas Excel saya">Buatin Tugas Excel saya</option>
                    <option value="Buatin PowerPoint">Buatin PowerPoint</option>
                </select>
            </div>

            {{-- Tingkatan sekolah --}}
            <div>
                <label for="schoolLevel" class="block text-sm font-medium text-gray-700 mb-1">Pilih Tingkatan Sekolah</label>
                <select id="schoolLevel" name="schoolLevel" 
                    class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    required>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                </select>
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                <select id="payment_method" name="payment_method" 
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                        required>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet (Dana, Gopay, OVO)</option>
                    <option value="PayPal">PayPal</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200">
                    Kirim ke WhatsApp Admin
                </button>
            </div>
        </form>
    </div>
</body>
</html>
