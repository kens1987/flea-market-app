<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ItemController extends Controller
{
    public function index(Request $request) {
        $tab = $request->query('tab');
        if($tab === 'mylist') {
            $products = Product::where('user_id',auth()->id())->get();
        }else{
            $products = Product::all();
        }
        return view('product.list',compact('products','tab'));
    }
}
