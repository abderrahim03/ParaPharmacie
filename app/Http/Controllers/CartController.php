<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('user', 'product')->get();

        return view('admin.carts.index', compact('carts'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'product_id' => 'required',
                'qty' => 'required',
            ]);
    
            Cart::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'qty' => $request->qty,
            ]);

            return back()->with('success', 'cart added successfully');

        } catch (\Throwable $th) {
            return back()->with('warning', $th->getMessage());
        }
        
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'cart deleted successfully');
    }
}
