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
            'deadline' => 'required|date_format:Y-m-d\TH:i', 'after:now',
            'jumlah_halaman' => 'required|string|min:1',
            'payment_method' => 'required|string|max:50',
        ]);

        // no admin
        $wa_admin = '6285829226247';

        $message = trim("
        Halo Adminn!,
        Saya Mau JOKI TUGAS:

        - Nama : {$validated['name']}
        - Judul Tugas : {$validated['judul']}
        - Deskripsi Tugas : {$validated['deskripsi_tugas']}
        - Deadline Tugas : ". date('Y-m-d H:i', strtotime($validated['deadline'])) ."
        - Jumlah Halaman : {$validated['jumlah_halaman']}
        - Metode Pembayaran : {$validated['payment_method']}

        Mohon Diproses secepatnya ya min! Terimakasih 😊❤️
        ");

        $encodedMessage = rawurlencode($message);

        $url = "https://wa.me/{$wa_admin}?text={$encodedMessage}";

        return redirect($url);
    }
}
