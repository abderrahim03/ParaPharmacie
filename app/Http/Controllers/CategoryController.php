<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware(['Role: super admin']);
    //     $this->middleware('can:permission create category', ['except' => ['store']]);
    //     $this->middleware('can:permission edit category', ['except' => ['edit', 'update']]);
    //     $this->middleware('can:permission show category|show categories', ['except' => ['index']]);
    //     $this->middleware('can:permission delete category', ['except' => ['destroy']]);
    // }
    
    public function index()
    {
        $categories = Category::all();
        
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            Category::create($request->all());

            return back()->with('success','Category created successfully!');
        } 
        catch (\Throwable $th) {
            return back()->with('warning',$th->getMessage());
        }
       
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $category->update($request->all());

            return back()->with('success','Category updated successfully!');
        } 
        catch (\Throwable $th) {
            return back()->with('warning',$th->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Category deleted successfully!');
    }
}
