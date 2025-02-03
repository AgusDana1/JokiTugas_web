<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NewOrderNotification;

class PayController extends Controller
{
    public function showForm()
    {
        return view('payment.form');
    }

    public function processPay(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'deskripsi_tugas' => 'required|string|max:1000',
            'deadline' => 'required|date_format:Y-m-d\TH:i|after:now',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'jumlah_halaman' => 'required|integer|min:1',
            'payment_method' => 'required|string|max:50',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('task_images', 'public');
            $validated['image'] = $path;
        }

        // Simpan data ke database
        $order = Order::create($validated);

        // Kirim notifikasi ke admin dan penjoki
        event(new NewOrderNotification($order));

        return redirect()->route('payment.page', ['order' => $order->id])->with('success', 'Pesanan berhasil diajukan!');
    }
}
