@extends('layouts.guest')

@section('content')
<div class="login-container">
    <h2 class="title">ログイン</h2>

    <form method="POST" action="{{ route('login') }}" class="form-box">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn-login">ログイン</button>
    </form>

    <div class="link-to-register">
        <a href="{{ route('register') }}">会員登録はこちら</a>
    </div>
</div>
@endsection
