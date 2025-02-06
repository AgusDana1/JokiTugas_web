<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => Auth::user(),
            'name' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'deskripsi_tugas' => 'required|string',
            'deadline' => 'required|date|after:now',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'jumlah_halaman' => 'required|integer|min:1',
            'payment_method' => 'required|string|max:50',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'mapel' => $request->mapel,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'jumlah_halaman' => $request->jumlah_halaman,
            'deadline' => $request->deadline,
            'image' => $request->image,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('task_images', 'public');
            $validated['image'] = $path;
        }

        // Kirim event untuk notifikasi yang didapat oleh admin sama penjoki
        event(new OrderPlaced($order));

        $admin = User::where('role', 'admin')->get();
        $penjoki = User::where('role', 'penjoki')->get();

        foreach ($admin as $a) 
        {
            $a->notify(new NewOrderNotification($order));
        }

        foreach ($penjoki as $p)
        {
            $p->notify(new NewOrderNotification($order));
        }

        // Redirect ke halaman pembayaran sesuai pilihan user
        if ($request->payment_method === 'e_wallet') {
            return redirect()->route('payment.ewallet', ['order_id' => $order->id, 'ewallet' => $request->e_wallet]);
        } else {
            return redirect()->route('payment.bank_transfer', ['order_id' => $order->id]);
        }

        return redirect()->route('payment.page', ['order' => $order->id]);
    }

    // Proses pembayaran dan admin menerima notifikasi dari user
    public function PaymentProcess(Request $request, Order $order)
    {
        $order->update(['status' => 'paid']);

        $admin = User::where('role', 'admin')->get();
        foreach ($admin as $a)
        {
            $a->notify(new NewOrderNotification($order));
        }

        return redirect()->route('order.success');
    }

    // updateStatus
    public function updateStatus(Request $request, Order $order)
    {
        // Validasi
        $request->validate([
            'status' => 'required|in:pending,paid,completed',
        ]);

        // Update status order
        $order->status = $request->status;
        $order->save();

        $admin = User::where('role', 'admin')->get();
        $penjoki = User::where('role', 'penjoki')->get();

        foreach ($admin as $a) {
            $a->notify(new NewOrderNotification($order));
        }

        foreach ($penjoki as $p) {
            $p->notify(new NewOrderNotification($order));
        }

        return redirect()->route('order.show', $order->id)->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
