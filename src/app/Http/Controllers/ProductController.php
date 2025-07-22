<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Like;

class ProductController extends Controller
{
    public function create() {
        $products = Product::all();
        return view('product.create',compact('products'));
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
}
