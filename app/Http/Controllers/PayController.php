<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;

class PayController extends Controller
{
    public function showForm()
    {
        return view('payment.form');
    }

    public function processPay(Request $request)
    {

        $validated = $request->validate([
            'user_id' => Auth::user(),
            'name' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'deskripsi_tugas' => 'required|string|max:1000',
            'deadline' => 'required|date|after:now',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'jumlah_halaman' => 'required|integer|min:1',
            'payment_method' => 'required|string|max:50',
            'e_wallet' => 'required|string|in:dana,gopay,ovo'
        ]);

        // Simpan order terbaru
        $order = Order::create([
            'user_id' => Auth::id(),
            'mapel' => $request->mapel,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'jumlah_halaman' => $request->jumlah_halaman,
            'deadline' => $request->deadline,
            'image' => $request->image,
            'payment_method' => $request->payment_method,
            'e_wallet' => $request->e_wallet,
            'status' => 'pending',
        ]);

        if ($order->payment_method === 'e-wallet') {
            if (!$order->e_wallet) {
                return redirect()->back()->withErrors(['e_wallet' => 'Metode e-wallet harus dipilih!']);
            }
            return redirect()->route('payment.ewallet', ['order_id' => $order->id, 'ewallet' => $order->e_wallet]);
        } else {
            return redirect()->route('payment.bank_transfer', ['order_id' => $order->id]);
        }

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('task_images', 'public');
            $validated['image'] = $path;
        }

        // Simpan data ke database
        $validated['user_id'] = Auth::id();
        $order = Order::create($validated);

        $admin = User::where('role', 'admin')->get();
        $admin = User::where('role', 'penjoki')->get();

        // Kirim notifikasi ke admin dan penjoki
        Notification::send($admin, new NewOrderNotification($order));
        Notification::send($admin, new NewOrderNotification($order));

        return redirect()->route('payment.page', ['order' => $order->id])->with('success', 'Pesanan berhasil diajukan!');
    }
}
