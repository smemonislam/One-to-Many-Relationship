<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->latest()->paginate(10);
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('name', 'id');
        return view('product.created', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Category::findOrFail($request->category_id);
        $product->products()->create([
            'name'  => $request->name,
            'price' => $request->price,
        ]);


        // $product = new Product;
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $category->products()->save($product);

        return redirect()->route('product.index')->with(['message' => 'Added Successfully.', 'type'   => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::pluck('name', 'id');
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {     
        $category = Category::findOrFail($request->category_id);
        if( $category ){
            $product->update([
                'category_id'  => $request->category_id,
                'name'  => $request->name,
                'price' => $request->price,
            ]);
        }
        
        // $category = Category::findOrFail($request->category_id)->products()->where('id', $product->id)->first();       
        // $category->name = $request->name;
        // $category->price = $request->price;
        // $category->update(); 
        
        return redirect()->route('product.index')->with(['message' => 'Update Successfully.', 'type'   => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with(['message' => 'Delete Successfully.', 'type'   => 'success']);
    }
}
