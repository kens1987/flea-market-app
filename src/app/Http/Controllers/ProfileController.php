<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Product;
use App\Models\Payment;

class ProfileController extends Controller
{
    public function index() {
        \Log::info('ProfileController@index accessed by user:'.optional(auth()->user())->id);
        return view ('profile.edit');
    }

    public function __construct() {
        $this->middleware('auth');
    }

    public function update(ProfileRequest $request) {
        $user = auth()->user();
        $validated = $request->validated();
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images','public');
            $validated['image'] = $imagePath;
        }
        if($user->profile) {
            $user->profile->update($validated);
        }else {
            $user->profile()->create($validated);
        }
        $user->shippingAddress()->updateOrCreate(
            ['user_id'=>$user->id],
            [
                'postcode'=>$validated['postcode']??'',
                'address'=>$validated['address']??'',
                'building'=>$validated['building']??'',
            ]
        );
        return redirect()->route('product.list',['tab' => 'mylist'])->with('success','プロフィールを更新しました');
    }

    public function show(Request $request)
    {
        $user = auth()->user();
        $products = $user->products;
        $purchased = $user->purchaseProducts;
        $page = $request->query('page','sell');
        $purchasedProducts = Product::whereIn('id',Payment::where('user_id',$user->id)->pluck('product_id'))->get();
        if($page === 'buy'){
            $products = Product::whereIn('id',Payment::where('user_id',$user->id)->pluck('product_id'))->get();
        }else{
            $products = $user->products;
        }
        return view('profile.show',compact('user','products','purchased','page','purchasedProducts'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit',compact('user'));
    }
}
