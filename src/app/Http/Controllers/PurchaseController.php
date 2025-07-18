<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($item_id);
        $address = $user->shippingAddress ?? $user->profile;
        // session(['current_product_id' => $item_id]);
        return view('product.purchase',compact('product','user','address'));
    }
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $user = Auth::user();
        return redirect()->route('product.list')->with('success','購入が完了しました！');
    }
}
