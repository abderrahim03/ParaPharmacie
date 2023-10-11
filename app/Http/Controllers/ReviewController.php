<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   
    public function index()
    {
        $reviews = Review::with('user', 'product')->get();
        
        return view('admin.reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'product_id' => 'required',
                'review' => 'required',
                'rating' => 'required',
            ]);
    
            Review::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'review' => $request->review,
                'rating' => $request->product_id,
            ]);

            return back()->with('success', 'review added successfully');

        } catch (\Throwable $th) {
            
            return back()->with('warning', $th->getMessage());
        }
        
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'review deleted successfully');
    }
}
