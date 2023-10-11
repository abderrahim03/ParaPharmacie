<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    
    public function index()
    {
        $items = OrderItem::with('order', 'product', 'user')->get();
        
        return view('admin.orderItems.index', compact('items'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'product_id' => 'required',
                'order_id' => 'required',
                'qty' => 'required',
                'subtotal' => 'required',
            ]);
    
            OrderItem::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'order_id' => $request->order_id,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
            ]);
    
            return back()->with('success', 'item added successfully');

        } catch (\Throwable $th) {
            return back()->with('success', $th->getMessage());
        }
        
    }

}
