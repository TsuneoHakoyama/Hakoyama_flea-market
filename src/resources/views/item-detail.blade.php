@extends('layouts.app')

@section('page-title')
商品詳細
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
<div class="main-board">
    <div class="image-board">
        <img src="{{ $item->image }}" alt="item">
    </div>
    <div class="description-board">
        <form action="" method="post">
            <div class="item">
                <div class="name">{{ $item->name }}</div>
                <div class="brand">ブランド名</div>
                <div class="price">¥{{ number_format($item->price) }}</div>
            </div>
            <div class="rating">
                <div class="favorite">
                    <button><i class="fa-regular fa-star star"></i></button>
                </div>
                <div class="review">
                    <a href=""><i class="fa-regular fa-comment comment"></i></a>
                </div>
            </div>
            <div class="submit">
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button type="submit">購入する</button>
            </div>
        </form>
        <div class="description">
            <p>商品説明</p>
            {{ $item->description }}
        </div>
        <div>
            <div class="tag-title">商品の情報</div>
            <div class="category-tag">
                <p>カテゴリー</p>
                @foreach ($item->categories as $category)
                <div class="category">{{ $category->category }}</div>
                @endforeach
            </div>
        </div>
        <div class="condition">
            <p>商品の状態</p>
            <div class="condition-tag">{{ $item->condition->condition }}</div>
        </div>
    </div>
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
<div class="main-board">
    <div class="image-board">
        <img src="{{ $item->image }}" alt="item">
    </div>
    <div class="description-board">
        <form action="" method="post">
            <div class="item">
                <div class="name">{{ $item->name }}</div>
                <div class="brand">ブランド名</div>
                <div class="price">¥{{ number_format($item->price) }}</div>
            </div>
            <div class="rating">
                <div class="favorite">
                    <button><i class="fa-regular fa-star star"></i></button>
                </div>
                <div class="review">
                    <a href=""><i class="fa-regular fa-comment comment"></i></a>
                </div>
            </div>
            <div class="submit">
                <button type="submit" disabled>購入する</button>
            </div>
        </form>
        <div class="description">
            <p>商品説明</p>
            {{ $item->description }}
        </div>
        <div>
            <div class="tag-title">商品の情報</div>
            <div class="category-tag">
                <p>カテゴリー</p>
                @foreach ($item->categories as $category)
                <div class="category">{{ $category->category }}</div>
                @endforeach
            </div>
        </div>
        <div class="condition">
            <p>商品の状態</p>
            <div class="condition-tag">{{ $item->condition->condition }}</div>
        </div>
    </div>
</div>
</div>
@endsection
@endif