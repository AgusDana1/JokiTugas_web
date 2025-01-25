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
            'product' => 'required|string',
            'schoolLevel' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // no admin
        $wa_admin = '6281238478677';

        $message = "
        Halo Adminn!,
        Saya Mau JOKI TUGAS:

        - Nama : {$validated['name']}
        - Product : {$validated['product']}
        - Tingkat Sekolah : {$validated['schoolLevel']}
        - Metode Pembayaran : {$validated['payment_method']}

        Mohon Diproses secepatnya ya min! Terimakasih 😊❤️
        ";

        $encodedMessage = urlencode($message);

        $url = "https://wa.me/{$wa_admin}?text={$encodedMessage}";

        return redirect($url);
    }
}
