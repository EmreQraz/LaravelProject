<?php

namespace App\Http\Controllers;

use App\Models\Order;

class MyOrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()
            ->orders()
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}
