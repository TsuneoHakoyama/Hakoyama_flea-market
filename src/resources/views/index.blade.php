@extends('layouts.app')

@section('page-title')
商品一覧
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('logo')
<a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
@endsection

@section('search')
<form action="/search" method="post" class="search-form">
    @csrf
    <input type="text" name="keyword" placeholder="なにをお探しですか？">
    <button type="submit">検索</button>
</form>
@endsection

@if (Auth::check())
@section('link')
<div class="link-list">
    <li><a href="{{ route('logout') }}">ログアウト</a></li>
    <li><a href="">マイページ</a></li>
    <li><a href="" class="put-up">出品</a></li>
</div>
@endsection
@section('content')
<div class="index-part">
    <div class="recommend">
        <a href="{{ route('home') }}">おすすめ</a>
    </div>
    <div class="my-list">
        <a href="">マイリスト</a>
    </div>
</div>
<div class="item-board">
    @foreach ($items as $item)
    <div class="item-card">
        <div class="image">
            <a href="{{ route('detail', ['id' => $item->id]) }}"><img src="{{ $item->image }}" alt="item"></a>
        </div>
        <div class="product-detail">
            <div class="name">{{ $item->name }}</div>
            <div class="price">{{ number_format($item->price) }}</div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@else
@section('link')
<div class="link-list">
    <li><a href="{{ route('login') }}">ログイン</a></li>
    <li><a href="{{ route('register') }}">会員登録</a></li>
    <li><a href="" class="put-up">出品</a></li>
</div>
@endsection
@section('content')
<div class="index-part">
    <div class="recommend">
        <a href="{{ route('home') }}">おすすめ</a>
    </div>
    <div class="my-list">
        <a href="{{ asset('login') }}">マイリスト</a>
    </div>
</div>
<div class="item-board">
    @foreach ($items as $item)
    <div class="item-card">
        <div class="image">
            <a href="{{ route('detail', ['id' => $item->id]) }}"><img src="{{ $item->image }}" alt="item"></a>
        </div>
        <div class="product-detail">
            <a href="{{ route('detail', ['id' => $item->id]) }}">
                <div class="name">{{ $item->name }}</div>
            </a>
            <div class="price">￥{{ number_format($item->price) }}</div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@endif