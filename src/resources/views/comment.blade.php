@extends('layouts.app')

@section('page-title')
コメントページ
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
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
            @if (count($item->favorites) == 0)
            <form action="{{ route('like', ['item_id'=> $item->id]) }}" method="post">
                @csrf
                <div class="favorite">
                    <button><i class="fa-regular fa-star star-icon"></i></button><br>
                    {{ count($item->favorites) }}
                </div>
            </form>
            @else
            <form action="{{ route('unlike', ['item_id' => $item->id]) }}" method="post">
                @csrf
                <div class="favorite">
                    <button><i class="fa-regular fa-star star-icon"></i></button><br>
                    {{ count($item->favorites) }}
                </div>
            </form>
            @endif
            <div class="review">
                <a href="#"><i class="fa-regular fa-comment comment-icon"></i></a><br>
                {{ count($item->comments) }}
            </div>
        </div>
        <div class="comment-board">
            @foreach ($comments as $comment)
            @if ($comment->user_id === Auth::id())
            <div class="seller">
                <img src="{{ optional($comment->user->profile)->image }}" alt="ユーザー画像">
                <div class="user-name">{{ optional($comment->user->profile)->name }}</div>
            </div>
            <div class="seller-comment">
                <div class="comment">{{ $comment->comment }}</div>
                <form action="/delete" method="post">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <button type="submit">削除</button>
                </form>
            </div>
            @else
            <div class="buyer">
                <img src="{{ optional($comment->user->profile)->image }}" alt="ユーザー画像">
                <div class="user-name">{{ optional($comment->user->profile)->name }}</div>
            </div>
            <div class="comment">{{ $comment->comment }}</div>
            @endif
            @endforeach



        </div>
        <form action="{{ route('create', ['item_id' => $item->id]) }}" method="post" class="input-board">
            @csrf
            商品へのコメント
            <textarea name="comment" id="" row="5" col="50"></textarea><br>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <button type="submit">コメントを送信する</button>
        </form>
    </div>
    @endsection