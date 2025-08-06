@extends('layouts.guest')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md text-center max-w-md w-full">
        <!-- <img src="/your-logo.png" alt="COACHTECH" class="mx-auto mb-6"> -->

        <!-- <h1 class="text-xl font-bold mb-4">メール認証誘導画面</h1> -->

        <p class="mb-6 text-gray-700">
            登録していただいたメールアドレスに認証メールを送付しました。<br>
            メール認証を完了してください。
        </p>

        <a href="{{ route('verification.notice') }}" class="inline-block mb-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-black rounded">
            認証はこちらから
        </a>

        @if (session('status') == 'verification-link-sent')
            <p class="mb-4 text-green-600">
                新しい認証リンクを送信しました！
            </p>
        @endif

        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button type="submit" class="text-sm text-blue-500 hover:underline">
                認証メールを再送する
            </button>
        </form>
    </div>
</div>
@endsection
