@extends('layouts.app')

<!-- @dd($user->profile) -->

@section('content')
<div class="profile-container">
    <h2>プロフィール設定</h2>

    <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="image-upload">
            <!-- <img src="{{ Auth::user()->profile->image ?? '/images/default-profile.png' }}" class="profile-image"> -->
            <img src="{{ $user->profile->image ?? '/images/default-profile.png' }}" class="profile-image">
            <label class="upload-button">
                画像を選択する
                <input type="file" name="image" hidden>
                @error('image')
                <div class="error">{{ $message }}</div>
                @enderror
            </label>
        </div>

        <div class="form-group">
            <label>ユーザー名</label>
            <!-- <input type="text" name="name" value="{{ old('name', $user->profile->name ?? Auth::user()->name) }}"> -->
            <input type="text" name="name" value="{{ old('name', $user->profile->name ?? $user->name) }}">
            @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
        </div>

        <div class="form-group">
            <label>郵便番号</label>
            <!-- <input type="text" name="postcode" value="{{ old('postcode', optional(Auth::user()->profile)->postcode) }}"> -->
            <input type="text" name="postcode" value="{{ old('postcode', optional($user->profile)->postcode) }}">
            @error('postcode')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>住所</label>
            <!-- <input type="text" name="address" value="{{ old('address', optional(Auth::user()->profile)->address) }}"> -->
            <input type="text" name="address" value="{{ old('address', optional($user->profile)->address) }}">
            @error('address')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>建物名</label>
            <!-- <input type="text" name="building" value="{{ old('building', optional(Auth::user()->profile)->building) }}"> -->
            <input type="text" name="building" value="{{ old('building', optional($user->profile)->building) }}">
        </div>

        <button type="submit" class="btn-submit">更新する</button>
    </form>
</div>
@endsection
