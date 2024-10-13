@extends('layouts.app')

@section('page-title')
商品詳細
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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

@if (Auth::check())
@section('link')
<div class="link-list">
    <li><a href="{{ route('logout') }}">ログアウト</a></li>
    <li><a href="{{ route('mypage') }}">マイページ</a></li>
    <li><a href="{{ route('sell') }}" class="put-up">出品</a></li>
</div>
@endsection

@section('content')
<div class="main-board">
    <div class="image-board">
        <img src="{{ asset($item->image) }}" alt="item">
    </div>
    <div class="description-board">
        <div class="item">
            <div class="item-name">{{ $item->name }}</div>
            <div class="brand">ブランド名：{{ $item->company->name }}</div>
            <div class="price">¥{{ number_format($item->price) }}</div>
        </div>
        <div class="rating">
            @if (is_null($favorite))
            <form action="{{ route('like', ['item_id'=> $item->id]) }}" method="post">
                @csrf
                <div class="favorite">
                    <button><i class="fa-regular fa-star star"></i></button><br>
                    {{ count($item->favorites) }}
                </div>
            </form>
            @else
            <form action="{{ route('unlike', ['item_id'=> $item->id]) }}" method="post">
                @csrf
                <div class="favorite">
                    <button><i class="fa-regular fa-star star"></i></button><br>
                    {{ count($item->favorites) }}
                </div>
            </form>
            @endif

            <div class="review">
                <a href="{{ route('comment', ['item_id'=> $item->id]) }}"><i class="fa-regular fa-comment comment"></i></a><br>
                {{ count($item->comments) }}
            </div>
        </div>
        <div class="purchase">
            <form action="{{ route('confirm', ['item_id' => $item->id]) }}" method="get">
                @csrf
                <button type="submit">購入する</button>
            </form>
        </div>

        <div class="description">
            <h2>商品説明</h2>
            {{ $item->description }}
        </div>
        <div class="title">
            <h2>商品の情報</h2>
        </div>
        <div class="category">
            <h4>カテゴリー</h4>
            @foreach ($item->categories as $category)
            <div class="category-tag">{{ $category->category }}</div>
            @endforeach
        </div>
        <div class="condition">
            <h4>商品の状態</h4>
            <div class="condition-tag">
                {{ $item->condition->condition }}
            </div>
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
    <li><a href="{{ route('login') }}" class="put-up">出品</a></li>
</div>
@endsection
@section('content')
<div class="main-board">
    <div class="image-board">
        <img src="{{ asset($item->image) }}" alt="item">
    </div>
    <div class="description-board">
        <div class="item">
            <div class="item-name">{{ $item->name }}</div>
            <div class="brand">ブランド名：{{ $item->company->name }}</div>
            <div class="price">¥{{ number_format($item->price) }}</div>
        </div>
        <div class="rating">
            <div class="favorite">
                <button><i class="fa-regular fa-star star"></i></button><br>
                {{ count($item->favorites) }}
            </div>
            <div class="review">
                <a href=""><i class="fa-regular fa-comment comment"></i></a><br>
                {{ count($item->comments) }}
            </div>
        </div>
        <div class="purchase">
            <button type="submit" disabled>購入する</button>
        </div>


        <div class="description">
            <h2>商品説明</h2>
            {{ $item->description }}
        </div>
        <div class="title">
            <h2>商品の情報</h2>
        </div>
        <div class="category">
            <h4>カテゴリー</h4>
            @foreach ($item->categories as $category)
            <div class="category-tag">
                {{ $category->category }}
            </div>
            @endforeach
        </div>
        <div class="condition">
            <h4>商品の状態</h4>
            <div class="condition-tag">
                {{ $item->condition->condition }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@endif