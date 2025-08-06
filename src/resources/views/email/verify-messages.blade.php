@extends('layouts.guest')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md text-center max-w-md w-full">

        <h1 class="text-xl font-bold mb-4">メール認証のお願い</h1>

        <p class="mb-6 text-gray-700">
            ご登録ありがとうございます！<br>
            ご登録のメールアドレス宛に認証メールをお送りしました。<br>
            認証を完了するには、以下のボタンをクリックしてください。
        </p>

        <a href="{{ route('verification.notice') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
            メール認証画面へ
        </a>

        <p class="text-sm text-gray-500 mt-4">
            メールが届いていない場合は、迷惑メールフォルダもご確認ください。
        </p>
    </div>
</div>
@endsection
