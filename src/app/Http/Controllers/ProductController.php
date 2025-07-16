<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() {
        $products = Product::all();
        return view('product.create',compact('products'));
    }

    public function show($item_id) {
        $product = Product::with(['category','comments.user'])->findOrFail($item_id);
        return view('product.details',compact('product'));
    }
}
