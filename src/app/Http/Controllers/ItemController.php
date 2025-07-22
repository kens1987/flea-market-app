<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Like;

class ItemController extends Controller
{
    public function index(Request $request) {
        $tab = $request->query('tab');
        $userId = auth()->id();
        if($tab === 'mylist') {
            $likedProductIds = Like::where('user_id',$userId)->pluck('product_id');
            $products = Product::whereIn('id',$likedProductIds)->get();
        }else{
            $products = Product::all();
        }
        $soldProductIds = Payment::pluck('product_id')->toArray();
        return view('product.list',compact('products','tab','soldProductIds'));
    }
}
