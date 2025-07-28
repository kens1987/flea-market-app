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
        $keyword = $request->query('keyword');
        $userId = auth()->id();

        if($tab === 'mylist') {
            $likedProductIds = Like::where('user_id',$userId)->pluck('product_id');
            // $products = Product::whereIn('id',$likedProductIds)->get();
            $query = Product::whereIn('id',$likedProductIds);
        }else{
            // $products = Product::all();
            $query = Product::query();
        }

        if($keyword) {
            // $products->where(function($query) use ($keyword) {
            //     $query->where('product_name','like',"%{$keyword}%")->orWhere('brand_name','like',"%{$keyword}%");
            $query->where(function($q) use ($keyword) {
                $q->where('product_name','like',"%{$keyword}%")->orWhere('brand_name','like',"%{$keyword}%");
            });
        }
        $products = $query->get();
        $soldProductIds = Payment::pluck('product_id')->toArray();
        return view('product.list',compact('products','tab','soldProductIds'));
    }
}
