@extends('layouts.app')

@section('content')
<div class="profile-container">
    <h2>プロフィール設定</h2>

    <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="image-upload">
            <img src="{{ Auth::user()->profile->image ?? '/images/default-profile.png' }}" class="profile-image">
            <label class="upload-button">
                画像を選択する
                <input type="file" name="image" hidden>
            </label>
        </div>

        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->profile->name ?? Auth::user()->name) }}">
        </div>

        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="postcode" value="{{ old('postcode', optional(Auth::user()->profile)->postcode) }}">
        </div>

        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" value="{{ old('address', optional(Auth::user()->profile)->address) }}">
        </div>

        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building', optional(Auth::user()->profile)->building) }}">
        </div>

        <button type="submit" class="btn-submit">更新する</button>
    </form>
</div>
@endsection