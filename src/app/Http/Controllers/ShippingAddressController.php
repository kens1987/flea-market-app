<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShippingAddress;
// use App\Requests\AddressRequest;

class ShippingAddressController extends Controller
{
    public function edit($item_id)
    {
        $address = Auth::user()->shippingAddress;
        return view('shipping.address',compact('address','item_id'));
    }
    public function update(AddressRequest $request,$item_id)
    {
        $user = Auth::user();

        $user->shippingAddress()->updateOrCreate(
            ['user_id'=>$user->id],
            $validated
        );
        return redirect()->route('purchase.show',['item_id'=>$item_id])->with('success','配送先住所を更新しました');

        // $validated = $request->validate([
        //     'postcode' => 'required|string|max:8',
        //     'address' => 'required|string',
        // ]);
    }
}
