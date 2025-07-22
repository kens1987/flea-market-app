<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Payment;

class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($item_id);
        $address = $user->shippingAddress ?? $user->profile;
        $shippingAddress = $user->shippingAddress;
        return view('product.purchase',compact('product','user','address'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:convenience,card',
            'product_id' => 'required|exists:products,id',
        ]);
        $user = auth()->user();
        $product = Product::findOrFail($request->input('product_id'));
        $payment =Payment::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'amount' => $product->price,
            'payment_method' => $request->input('payment_method'),
            'paid_at' => now(),
        ]);
        return redirect()->route('product.list',['tab' => 'mylist'])
        ->with('success','購入が完了しました！')->with('payment_method', $request->input('payment_method'));
    }
}
