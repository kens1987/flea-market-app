<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Like;
use App\Models\Category;

class ProductController extends Controller
{
    public function create() {
        $products = Product::all();
        $categories = Category::all();
        return view('product.listing',compact('products','categories'));
    }

    public function show(Request $request,$item_id) {
        $product = Product::with(['category','comments.user'])->findOrFail($item_id);
        $tab = $request->query('tab');
        $userId = Auth::id();
        if($tab === 'mylist'){
            $likedProductIds = Like::where('user_id',$userId)->pluck('product_id');
            $products = Product::whereIn('id',$likedProductIds)->get();
        }else{
            $products = Product::all();
        }
        $soldProductIds = Payment::pluck('product_id')->toArray();
        return view('product.details',compact('product','tab','soldProductIds'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_name' => 'required|string',
            'product_description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png',
            'brand_name' => 'required|string|max:255',
            // 'category_id' => 'required|exists:categories,id',
            'category_ids.*' => 'exists:categories,id',
            'condition' => 'required|string',
            'price' => 'required|integer|min:0',
        ]);
        $imagePath = null;
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');
        }
        $product = Product::create([
            'user_id' => auth()->id(),
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'image' => $imagePath,
            'condition' => $request->condition,
            'price' => $request->price,
            'brand_name' => $request->brand_name,
            'category_id' =>$request->category_id,
        ]);
        $product->categories()->attach($request->category_ids);
        return redirect('/')->with('success','商品を出品しました！');
    }
}
