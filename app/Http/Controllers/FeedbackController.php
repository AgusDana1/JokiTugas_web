<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function sendFeedback(Request $request)
    {
        // validasi kiriman user
        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        // memasukan ke data dari kiriman user
        $data = [
            'name' => $request->name,
            'user_message' => $request->message,
        ];

        // mengirimkan ke email admin hasil dari inputan user yang telah dimasukan ke variable data
        Mail::send('emails.feedback', $data, function ($mail) {
            $mail->to('galverzxxy@gmail.com')
                ->subject('Feedback Baru dari Pengguna');
        });

        // memberikan return berhasil bahwa feedback berhasil dikirim
        return back()->with('success', 'Feedback berhasil dikirim!');
    }
}
