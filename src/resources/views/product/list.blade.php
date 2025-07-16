@extends('layouts.app')

@section('content')
<div class="mylist-container">

    <div class="tabs">
        <a href="{{ route('product.list',['tab'=>'recommend']) }}" class="tab">おすすめ</a>
        <a href="{{ route('product.list',['tab'=>'mylist']) }}" class="tab active">マイリスト</a>
    </div>

    <div class="product-list">
        @foreach ($products as $product)
        <a href="{{ route('product.show',['item_id' => $product->id]) }}">
            <div class="product-item">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
                <p class="product-name">{{ $product->product_name }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection