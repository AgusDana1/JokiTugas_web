<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjokiController extends Controller
{
    public function dashboard() {
        $notifications = Auth::user()->notifications;

        $orders = Order::latest()->paginate(5);

        return view('penjoki.dashboard', compact('notifications', 'orders'));
    }

    public function TampilkanOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('penjoki.order-detail', compact('order'));
    }
}
