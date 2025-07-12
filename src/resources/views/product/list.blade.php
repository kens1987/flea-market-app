@extends('layouts.app')

@section('content')
<div class="mylist-container">
    <!-- <div class="header">
        <img src="{{ asset('storage/images/logo.svg') }}" alt="COACHTECHロゴ" class="logo">
        <form class="search-form">
            <input type="text" placeholder="なにをお探しですか？" class="search-input">
        </form>
        <div class="header-buttons">
            <a href="{{ route('logout') }}">ログアウト</a>
            <a href="{{ route('profile.edit') }}">マイページ</a>
            <a href="{{ route('product.create') }}">出品</a>
        </div>
    </div> -->

    <div class="tabs">
        <a href="{{ route('product.list',['tab'=>'recommend']) }}" class="tab">おすすめ</a>
        <a href="{{ route('product.list',['tab'=>'mylist']) }}" class="tab active">マイリスト</a>
    </div>

    <div class="product-list">
        @foreach ($products as $product)
        <div class="product-item">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
            <p class="product-name">{{ $product->product_name }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection