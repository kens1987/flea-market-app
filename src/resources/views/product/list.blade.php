@extends('layouts.app')

@section('content')
<div class="mylist-container">

    <div class="tabs">
        <a href="{{ route('product.list',['tab'=>'recommend']) }}" class="tab">おすすめ</a>
        <a href="{{ route('product.list',['tab'=>'mylist']) }}" class="tab active">マイリスト</a>
    </div>

    <div class="product-list">
        @foreach ($products as $product)
            @php
                $isSold = in_array($product->id,$soldProductIds);
            @endphp
                <a href="{{ route('product.show',['item_id' => $product->id]) }}">
                    <div class="product-item">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
                        @if($isSold)
                            <div class="sold-badge">SOLD</div>
                        @endif
                        <p class="product-name">{{ $product->product_name }}</p>
                    </div>
                </a>
        @endforeach
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('payment_method'))
        <div class="alert alert-info">
            支払い方法：
            <span>
                @if(session('payment_method') === 'convenience')
                    コンビニ払い
                @elseif(session('payment_method') === 'card')
                    クレジットカード
                @endif
            </span>
        </div>
    @endif
</div>
@endsection
