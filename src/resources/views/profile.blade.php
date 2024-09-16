@extends('layouts.app')

@section('page-title')
プロフィール編集ページ
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('logo')
<div class="logo-link">
    <a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
</div>
@endsection

@section('search')
<form action="/search" method="post" class="search-form">
    @csrf
    <input type="text" name="keyword" placeholder="なにをお探しですか？">
    <button type="submit">検索</button>
</form>
@endsection

@section('link')
<div class="link-list">
    <li><a href="{{ route('logout') }}">ログアウト</a></li>
    <li><a href="{{ route('mypage') }}">マイページ</a></li>
    <li><a href="{{ route('sell') }}" class="put-up">出品</a></li>
</div>
@endsection

@section('content')
<main class="main-board">
    <div class="title">
        <p>プロフィール設定</p>
    </div>
    <div class="user-image">
        <img src="" alt="ユーザー画像">
        <a href="">画像を選択する</a>
    </div>
    <form action="" method="post" class="input-form">
        <div class="user-name">
            ユーザー名<br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="postcode">
            郵便番号<br>
            <input type="text" name="postcode" value="{{ old('postcode') }}">
        </div>
        <div class="address">
            住所<br>
            <input type="text" name="address" value="{{ old('address') }}">
        </div>
        <div class="building">
            建物名<br>
            <input type="text" name="building" value="{{ old('building') }}">
        </div>
        <div class="submit">
            <button type="submit">更新する</button>
        </div>
    </form>
</main>
@endsection