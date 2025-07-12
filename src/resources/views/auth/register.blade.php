@extends('layouts.guest')

@section('content')
<div class="register-container">
    <h2 class="title">会員登録</h2>

    <form action="{{ route('register') }}" class="form-box" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">確認用パスワード</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn-register">登録する</button>
    </form>

    <div class="link-to-login">
        <a href="{{ route('login') }}">ログインはこちら</a>
    </div>
</div>
@endsection
