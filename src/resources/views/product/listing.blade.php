@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>商品の出品</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
        @csrf
        <label>商品画像</label>
        <input type="file" name="image">

        <h3>商品の詳細</h3>
        <div class="tags">
            @foreach(['ファッション','家具','インテリア','レディース','メンズ','コスメ','電化製品','本','スポーツ','ゲーム','ハンドメイド','アクセサリー','おもちゃ','ベビー・キッズ'] as $category)
                <span class="tag">{{ $category }}</span>
            @endforeach
        </div>

        <label>商品の状態</label>
        <select name="condition">
            <option value="">選択してください</option>
            <option value="新品">新品</option>
            <option value="中古">中古</option>
        </select>

        <label>商品名</label>
        <input type="text" name="product_name">

        <label>ブランド名</label>
        <input type="text" name="brand_name">

        <label>商品の説明</label>
        <textarea name="description"></textarea>

        <label>販売価格</label>
        <input type="number" name="price" placeholder="¥">

        <button type="submit" class="btn-primary">出品する</button>
    </form>
</div>
@endsection