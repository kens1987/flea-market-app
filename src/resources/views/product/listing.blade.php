@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>商品の出品</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
        @csrf
        <label>商品画像</label>
        <input type="file" name="image">

        <h3>商品の詳細</h3>
        <div class="tags">
            <label>カテゴリー</label>
            <div class="category-tags">
                @foreach($categories as $category)
                <label class="tag">
                    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}">
                    <span>{{ $category->name }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <label>商品の状態</label>
        <select name="condition">
            <option value="">選択してください</option>
            <option value="良好">良好</option>
            <option value="目立った傷や汚れな">目立った傷や汚れなし</option>
            <option value="やや傷や汚れあり">やや傷や汚れあり</option>
            <option value="状態が悪い">状態が悪い</option>
        </select>

        <label>商品名</label>
        <input type="text" name="product_name">

        <label>ブランド名</label>
        <input type="text" name="brand_name">

        <label>商品の説明</label>
        <textarea name="product_description"></textarea>

        <label>販売価格</label>
        <input type="number" name="price" placeholder="¥">

        <button type="submit" class="btn-primary">出品する</button>
    </form>
</div>
@endsection

