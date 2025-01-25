<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    public function showForm()
    {
        return view('payment.form');
    }

    // controlling wa admin
    public function processPay(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi_tugas' => 'required|string|max:1000',
            'deadline' => 'required|date',
            'jumlah_halaman' => 'required|integer|min:1',
            'schoolLevel' => 'required|string|max:50',
            'payment_method' => 'required|string|max:50',
        ]);

        // no admin
        $wa_admin = '6281905390617';

        $message = trim("
        Halo Adminn!,
        Saya Mau JOKI TUGAS:

        - Nama : {$validated['name']}
        - Judul : {$validated['judul']}
        - Deskripsi Tugas : {$validated['deskripsi_tugas']}
        - Deadline : {$validated['deadline']}
        - Jumlah Halaman : {$validated['jumlah_halaman']}
        - Tingkat Sekolah : {$validated['schoolLevel']}
        - Metode Pembayaran : {$validated['payment_method']}

        Mohon Diproses secepatnya ya min! Terimakasih 😊❤️
        ");

        $encodedMessage = rawurlencode($message);

        $url = "https://wa.me/{$wa_admin}?text={$encodedMessage}";

        return redirect($url);
    }
}
