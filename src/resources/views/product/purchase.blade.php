@extends('layouts.app')

@section('content')
<div class="purchase-container">
    <form action="{{ route('purchase.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="left">
            <div class="product-summary">
                <!-- <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像"> -->
                <!-- <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像"> -->
                 <img src="{{ asset(Str::startsWith($product->image, 'images/') ? 'storage/' . $product->image : 'storage/images/' . $product->image) }}" alt="商品画像">
                <p class="product-name">{{ $product->product_name }}</p>
                <p class="product-price">¥{{ number_format($product->price) }}</p>
            </div>

            <div class="select-payment">
                <label>支払い方法</label>
                <select name="payment_method" id="payment_method" onchange="updatePaymentMethod()">
                    <option value="">選択してください</option>
                    <option value="convenience">コンビニ払い</option>
                    <option value="card">クレジットカード</option>
                </select>
            </div>

            <div class="shipping-address">
                <label>配送先</label>
                @if($address)
                    <p>〒{{ $user->shippingAddress->postcode ?? '未登録' }}</p>
                    <p>{{ $user->shippingAddress->address ?? '未登録' }} {{ $user->shippingAddress->building ?? '未登録' }}</p>
                @endif
                <a href="{{ route('shipping.address.edit',['item_id' => $product->id]) }}" class="edit-link">変更する</a>
            </div>
        </div>

        <div class="right">
            <div class="summary-box">
                <p>商品代金：<span>¥{{ number_format($product->price) }}</span></p>
                <p>支払い方法：<span id="payment-method-display">未選択</span></p>
            </div>

            <button type="submit" class="btn-primary">購入する</button>
        </div>
    </form>
</div>

<script>
    function updatePaymentMethod() {
        const select = document.getElementById('payment_method');
        const display = document.getElementById('payment-method-display');
        const value = select.value;

        if (value === 'convenience') {
            display.textContent = 'コンビニ払い';
        } else if (value === 'card') {
            display.textContent = 'クレジットカード';
        } else {
            display.textContent = '未選択';
        }
    }
</script>
@endsection