@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <img class="profile-icon" src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="プロフィール画像">
        <h2>{{ $user->name }}</h2>
        <a href="{{ route('profile.edit') }}" class="edit-btn">プロフィールを編集</a>
    </div>

    <div class="tabs">
        <a href="#" class="tab active">出品した商品</a>
        <a href="#">購入した商品</a>
    </div>

    <div class="product-grid">
        @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
            <p>{{ $product->product_name }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection