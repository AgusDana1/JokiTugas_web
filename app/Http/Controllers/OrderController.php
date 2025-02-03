<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'subject' => $request->mapel,
            'description' => $request->deskripsi_tugas,
            'page_count' => $request->jumlah_halaman,
            'deadline' => $request->deadline,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

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
        return redirect()->route('payment.page', ['order' => $order->id]);
    }

    // Proses pembayaran dan admin menerima notifikasi dari user
    public function processPayment(Request $request, Order $order)
    {
        $order->update(['status' => 'paid']);

        $admin = User::where('role', 'admin')->get();
        foreach ($admin as $a)
        {
            $a->notify(new NewOrderNotification($order));
        }

        return redirect()->route('order.success');
    }
}
