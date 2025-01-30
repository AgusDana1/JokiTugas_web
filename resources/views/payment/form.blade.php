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

            {{-- Judul Tugas --}}
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan Judul dari Tugas Anda" 
                class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                required>
            </div>

            {{-- Deskripsi Tugas --}}
            <div>
                <label for="deskripsi_tugas" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                <textarea id="deskripsi_tugas" name="deskripsi_tugas" placeholder="Masukkan deskripsi tugas Anda" 
                class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-left" 
                    rows="5" required></textarea>
            </div>

            {{-- Deadline Tugas --}}
            <div>
                <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Deadline Tugas</label>
                <input type="datetime-local" id="deadline" name="deadline" class="w-full mt-1 border rounded px-4 py-2" required>
            </div>

            {{-- Jumlah halaman Tugas --}}
            <div>
                <label for="jumlah_halaman" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Halaman</label>
                <input type="text" id="jumlah_halaman" name="jumlah_halaman" placeholder="Masukkan Jumlah halaman Tugas Anda" 
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
                    <option value="E-Wallet">E-Wallet (Dana, Gopay, OVO)</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>
