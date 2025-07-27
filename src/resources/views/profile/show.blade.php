@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <img class="profile-icon" src="{{ asset('storage/' . $user->profile_image) }}" alt="プロフィール画像">
        <h2>{{ $user->name }}</h2>
        <a href="{{ route('profile.edit') }}" class="edit-btn">プロフィールを編集</a>
    </div>

    <div class="tabs">
        <a href="{{ route('mypage',['page'=>'sell']) }}" class="tab active">出品した商品</a>
        <a href="{{ route('mypage',['page'=>'buy']) }}">購入した商品</a>
    </div>

    <div class="product-grid">
        @forelse ($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
            <p>{{ $product->product_name }}</p>
        </div>
        @empty
            <p>
                @if($page === 'buy')
                    購入した商品がありません。
                @else
                    出品した商品がありません。
                @endif
            </p>
        @endforelse
    </div>
</div>
@endsection
