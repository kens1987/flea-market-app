@extends('layouts.app')

@section('content')
<div class="purchase-container">
    <div class="left">
        <div class="product-summary">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
            <p class="product-name">{{ $product->product_name }}</p>
            <p class="product-price">¥{{ number_format($product->price) }}</p>
        </div>

        <div class="select-payment">
            <label>支払い方法</label>
            <select name="payment_method">
                <option>選択してください</option>
                <option value="convenience_store">コンビニ払い</option>
                <option value="credit_card">クレジットカード</option>
            </select>
        </div>

        <div class="shipping-address">
            <label>配送先</label>
            @if($address)
            <p>〒{{ $address->postcode }}</p>
            <p>{{ $address->address }} {{ $address->building }}</p>
            @endif
            <a href="{{ route('shipping.address.edit',['item_id' => $product->id]) }}" class="edit-link">変更する</a>
        </div>
    </div>

    <div class="right">
        <div class="summary-box">
            <p>商品代金：<span>¥{{ number_format($product->price) }}</span></p>
            <p>支払い方法：<span>コンビニ払い</span></p>
        </div>
        <form action="{{ route('purchase.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn-primary">購入する</button>
        </form>
    </div>
</div>
@endsection
