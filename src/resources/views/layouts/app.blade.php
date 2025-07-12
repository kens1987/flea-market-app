<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
</head>
<body>
    <header class="app-header">
    <div class="logo-area">
        <img src="{{ asset('storage/images/logo.svg') }}" alt="COACHTECHロゴ" class="logo">
    </div>
    @auth
    <form class="search-form">
        <input type="text" placeholder="なにをお探しですか？" class="search-input">
    </form>

    <div class="header-buttons">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-button" type="submit">ログアウト</button>
        </form>
        <a href="{{ route('profile.edit') }}">マイページ</a>
        <!-- <a href="{{ route('product.create') }}">出品</a> -->
    </div>
    @endauth
</header>

    @yield('content')
</body>
</html>
