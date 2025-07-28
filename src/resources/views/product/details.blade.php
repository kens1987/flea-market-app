@extends('layouts.app')

@section('content')
<div class="product-detail-container">
    <div class="product-image">
        <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
    </div>

    <div class="product-info">
        <h2>{{ $product->product_name }}</h2>
        <p class="brand-name">{{ $product->brand_name}}</p>
        <p class="price">¥{{ number_format($product->price) }}<span>（税込）</span></p>
        <div class="actions">
            @auth
            <form action="{{ route('product.like',$product->id) }}" method="post">
                @csrf
                <button type="submit">
                    <span>
                        @if($product->isLikedBy(Auth::user()))
                            ⭐{{ $product->likes->count() }}
                        @else
                            ☆{{ $product->likes->count() }}
                        @endif
                    </span>
                </button>
            </form>
            @else
                <a href="{{ route('login') }}">
                    <span>☆{{ $product->likes->count() }}</span>
                </a>
            @endauth
                <span>💬{{ $product->comments->count() }}（ログインでいいね可能）</span>
        </div>
        @auth
        <form action="{{ route('purchase.show',$product->id) }}" method="get">
            <button type="submit" class="btn-primary">購入手続きへ</button>
        </form>
        @else
            <a href="{{ route('login') }}" >ログインして購入手続きへ</a>
        @endauth

        <h3>商品説明</h3>
        <p>カラー：{{ $product->color ?? '未設定' }}</p>
        <!-- <p>カラー：グレー</p> -->
        <p>{{ $product->product_description ?? '（説明なし）' }}</p>
        <!-- <p>新品<br>商品の状態は良好です。傷もありません。</p>
        <p>購入後、即発送いたします。</p> -->

        <h3>商品の情報</h3>
        <p>カテゴリー：
            <span class="tag">{{ optional($product->category)->name ?? '未設定' }}</span>
        </p>
        <p>商品の状態：{{ $product->condition }}</p>

        <h3>({{ $product->comments->count() }})</h3>
        @forelse($product->comments as $comment)
            <div class="comment">
                <p><strong>{{ optional($comment->user)->name ?? '匿名ユーザー' }}</strong></p>
                <div class="comment-box">{{ $comment->comment }}</div>
            </div>
        @empty
            <p>コメントはまだありません。</p>
        @endforelse

        <h3>商品へのコメント</h3>
        @auth
        <form action="{{ route('product.comment',$product->id) }}" method="post">
            @csrf
            <textarea name="comment" placeholder="こちらにコメントを入力"></textarea>
            @error('comment')
                <div class="error">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn-primary">コメントを送信する</button>
        </form>
        @else
        <p>コメント投稿には <a href="{{ route('login') }}">ログイン</a> が必要です。</p>
        @endauth
    </div>
</div>
@endsection
