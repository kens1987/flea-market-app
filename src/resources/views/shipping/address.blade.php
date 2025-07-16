@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>住所の変更</h2>
    <form action="{{ route('shipping_addresses.update') }}" method="POST">
        @csrf
        <label>郵便番号</label>
        <input type="text" name="postcode" value="{{ old('postcode',$address->postcode ?? '' ) }}">
        @error('')

        <label>住所</label>
        <input type="text" name="address" value="{{ old('address',$address->address ?? '' ) }}">

        <label>建物名</label>
        <input type="text" name="building" value="{{ old('building',$address->building ?? '' ) }}">

        <button type="submit" class="btn-primary">更新する</button>
    </form>
</div>
@endsection