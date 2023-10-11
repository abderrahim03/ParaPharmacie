<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->get();
        
        return view('admin.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'payment' => 'required',
                'adresse' => 'required',
                'number' => 'required',
                'email' => 'required'
            ]);
    
            Order::create([
                'user_id' => $request->user_id,
                'payment' => $request->payment,
                'adresse' => $request->adresse,
                'number' => $request->number,
                'email' => $request->email,
            ]);
            return back()->with('success', 'you order has being created');

        } catch (\Throwable $th) {
            return back()->with('success', $th->getMessage());
        }
        
    }

    public function update(Request $request, Order $order)
    {
        
        $request->validate([
            'status' => 'required'
        ]);

        if ($request->status == 0) {
            $order->update([
                'status' => 1
            ]);
            return back()->with('success', 'status updated');
        }

        return back()->with('warning', 'status already livred');

    }

}
