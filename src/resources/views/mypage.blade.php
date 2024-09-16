@extends('layouts.app')

@section('page-title')
マイページ
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
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
<div class="index-part">
    <div class="user">
        <div class="user-info">
            <img src="{{ $info->image }}" alt="ユーザー画像">
            <div class="user-name">{{ $info->name }}</div>
        </div>
        <a href="">プロフィールを編集</a>
    </div>
    <div class="items">
        <div class="sell-items">
            <a href="">出品した商品</a>
        </div>
        <div class="buy-items">
            <a href="">購入した商品</a>
        </div>
    </div>

</div>
<div class="item-board">
    @foreach ($sells as $sell)
    <div class="item-card">
        <div class="image">
            <a href="{{ route('detail', ['id' => $sell->id]) }}"><img src="{{ $sell->image }}" alt="item"></a>
        </div>
        <div class="product-detail">
            <a href="{{ route('detail', ['id' => $sell->id]) }}">
                <div class="name">{{ $sell->name }}</div>
            </a>
            <div class="price">￥{{ number_format($sell->price) }}</div>
        </div>
    </div>
    @endforeach
</div>
@endsection