<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header style="background: black; padding: 10px;">
        <img src="{{ asset('storage/images/logo.svg') }}" alt="COACHTECHロゴ" style="height: 40px;">
    </header>

    @yield('content')
</body>
</html>
