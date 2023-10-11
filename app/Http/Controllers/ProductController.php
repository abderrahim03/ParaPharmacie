<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }


    public function store(Request $request)
    {
        
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'stock' => 'required',
                'category_id' => 'required',
            ]);

            if ($request->has('image')) {
                // $imageName = time() . '.' . $request->image->extension() Or / 

                $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();

                $request->file('image')->storeAs('public/products', $imageName, );
            }
            else {
                $imageName = null;
            }
            
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'prix' => $request->prix,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'image' => $imageName,
                'details' => $request->details,
            ]);

            return back()->with('success', 'product created successfully !!');

        } catch (\Throwable $th) {
            return back()->with('warning', $th->getMessage());
        }
        
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    
    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'stock' => 'required',
                'category_id' => 'required',
            ]);

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'prix' => $request->prix,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'image' => $product->image || null,
                'details' => $request->details || null,
            ]);

            return back()->with('success', 'product updated successfully !!');

        } catch (\Throwable $th) {
            return back()->with('warning', $th->getMessage());
        }
    }

    
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'product deleted!!');
    }
}
