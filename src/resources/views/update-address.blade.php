@extends('layouts.app')

@section('page-title')
住所登録
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/update-address.css') }}">
@endsection

@section('content')
<main class="main-board">
    <div class="title">
        <p>住所の変更</p>
    </div>
    <form action="/purchase/address/update" method="post" class="input-form">
        @csrf
        <div class="input-postcode">
            郵便番号<br>
            <input type="text" name="postcode" value="{{ old('postcode') }}">
        </div>
        <div class="input-address">
            住所<br>
            <input type="text" name="address" value="{{ old('address') }}">
        </div>
        <div class="input-building">
            建物名<br>
            <input type="text" name="building" value="{{ old('building') }}">
        </div>
        <div class="submit">
            <button type="submit">更新する</button>
        </div>
    </form>
</main>
@endsection