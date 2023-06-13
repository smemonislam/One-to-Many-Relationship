<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function index(Request $request) {

        $search = $request->search;
        if($search != NULL){
            $categories = Category::where( function($query) use($search){
                $query->where('name', 'like', '%'.$search.'%');
            } )
            ->orWhereHas('products', function($query) use($search){
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->get();
        }else{
            $categories = Category::get();
        }       
        return view('frontend', compact('categories'));
    }


    public function category($category_slug){
        $category = Category::where('slug', $category_slug)->first();
        return view('category', compact('category'));
    }

    public function products($product_slug){
        $product = Product::where('slug', $product_slug)->first();
        return view('product', compact('product'));
    }
}
