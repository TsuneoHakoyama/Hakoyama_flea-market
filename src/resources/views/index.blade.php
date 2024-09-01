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
<form action="" method="post" class="search-form">
    <input type="text" name="keyword" placeholder="なにをお探しですか？">
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
        <a href="">おすすめ</a>
    </div>
    <div class="my-list">
        <a href="">マイリスト</a>
    </div>
</div>
<div class="item-board">
    <div class="item-card">
        <a href=""><img src="" alt="item"></a>
    </div>
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
        <a href="">おすすめ</a>
    </div>
    <div class="my-list">
        <a href="{{ asset('login') }}">マイリスト</a>
    </div>
</div>
<div class="item-board">
    <div class="item-card">
        <a href=""><img src="" alt="item"></a>
    </div>
</div>
@endsection
@endif