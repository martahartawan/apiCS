<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderLayanan(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required'
        ]);

        $order = Order::create([
            'invoice' => 'INV-' . rand(1, 999999999),
            'user_id' => Auth::user()->id,
            'layanan_id' => $request->layanan_id
        ]);

        return response([
            'data' => $order
        ], 201);
    }

    public function getOrder()
    {
        $order = Order::with('user', 'layanan')->get();

        return response([
            'data' => $order
        ], 200);
    }
}
