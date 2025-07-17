<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShippingAddress;
use App\Http\Requests\AddressRequest;

class ShippingAddressController extends Controller
{
    public function edit($item_id)
    {
        $user = Auth::user();
        $address = $user->shippingAddress;
        if(!$address){
            $address = $user->shippingAddress()->create([
                'user_id' => $user->id,
                'postcode' => null,
                'address' => null,
                'building' => null,
            ]);
        }
        return view('shipping.address',compact('address','item_id'));
    }
    public function update(AddressRequest $request,$item_id)
    {
        $user = Auth::user();
        $validated = $request->validated();
        $user->shippingAddress()->updateOrCreate(
            ['user_id'=>$user->id],
            $validated
        );
        return redirect()->route('purchase.show',['item_id'=>$item_id])->with('success','配送先住所を更新しました');
    }
}
