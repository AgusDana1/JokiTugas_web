<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard() {
        $notifications = Auth::user()->notifications;

        $orders = Order::latest()->paginate(5);

        return view('admin.dashboard', compact('notifications', 'orders'));
    }

    public function showOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order-detail', compact('order'));
    }
}
